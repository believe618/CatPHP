<?php

/**
 * 
 */
require 'common.php';


class Web {

    static $rout_rules;

    // function __construct() {
        
    // }

    // public function setRouter($pattern,$controller,$action)
    // {
    //     self::$rout_rules[] = array('p' => $pattern, 'c'=>$controller ,'a'=>$action);
    // }

    // 启动
    public static function start() {

        spl_autoload_register('web_autoload');
        $WEB_CONFIG   = CatConfig::getInstance(APP_PATH.'/config/config.php');
        self::$rout_rules = $WEB_CONFIG->route_regular;

        // 判定路由解析方式,如果是rest风格则
        if ($WEB_CONFIG->router_rest) {
            $rout = self::routeParseReg();
            if ( !is_array($rout) ) {
                $rout = self::routeParseRest();
            }
            // 将url中解析后的内容传给$_GET
            // $_GET = array_merge($_GET, $rout);
            $_GET = $_GET + $rout;
        }
        // 如果不是rest风格
        else {
            $rout = self::routeParse($WEB_CONFIG->router_name['c'], $WEB_CONFIG->router_name['a']);
        }
        $controller_file = APP_PATH.'/'.$WEB_CONFIG->controller_path . $rout['c'] . '.php';
        // 引入controller文件
        if (file_exists($controller_file)) {
            include $controller_file;
        } else {
            foreach ($WEB_CONFIG->controller_dirs as $dir) {
                $controller_file = APP_PATH.'/'.$WEB_CONFIG->controller_path . $dir . $rout['c'] . '.php';
                if (file_exists($controller_file)) {
                    include $controller_file;
                    break;
                }
            }
        }
        // 如果控制器属于rest
        if( in_array($rout['c'], $WEB_CONFIG->rest_controllers) )
        {
            $restVerb  = ucfirst(strtolower($_SERVER['REQUEST_METHOD']));
            $methd     = $restVerb;
            $params = array();
            foreach ($rout as $key => $value) {
                if($key==='c' || $key==='last') 
                    continue;
                elseif ( $key==='a') {
                    if ($value!=='' && $value!=='index') 
                        $params[] = $value;
                }
                else {
                    $params[] = $key;
                    $params[] = $value;
                }
            }
            if (isset($rout['last'])) {
                $params[] = $rout['last'];
            }
            // 解析非GET POST请求
            $ps  =  explode('&', file_get_contents('php://input'));
            foreach ($ps as $param) {
                $param = urldecode($param);
                $eq_pos = strpos($param, "=");
                $pkey   = substr($param, 0,$eq_pos);
                $pvalue = substr($param,$eq_pos+1);
                $params[$pkey] = $pvalue;
            }
        }
        else {
            $methd = $rout['a'];
        }


        $class = $rout['c'] . 'Controller';
        $controller = new $class();
        if (isset($params)) {
            $controller->setRequest($params);
            $controller->setRoute($rout);
        }
        $controller->$methd();
    }



    // 解析正则规则
    private static function routeParseReg()
    {
        if (count(self::$rout_rules)=== 0) {
            return false;
        } else {
            $index = strpos($_SERVER['SCRIPT_NAME'], '/', 1) + 1;
            $url = rtrim( substr($_SERVER['REQUEST_URI'] , $index),"/");
            $rtn = array(
            'c' => 'index',
            'a' => 'index'
            );
            foreach (self::$rout_rules as $rules) {
                if (preg_match('#'.$rules['p'].'#', $url,$matchs))
                {
                    $rtn['c'] = $rules['c'];
                    $rtn['a'] = $rules['a'];
                    $url = str_replace($matchs[0], "", $url);
                    $e   = strpos($url, '?');
                    if ($e) {
                        $url = substr($url, 0, $e);
                    }
                    $r = explode('/', $url);
                    $l = count($r);
                    if ($l % 2 != 0) {
                        $l-=1;
                        $hasLast = true;
                    }
                    for ($i = 0; $i < $l; $i+=2) {
                        if($r[$i]==='c' || $r[$i]==='a')
                            continue;
                        $rtn[$r[$i]] = $r[$i + 1];
                    }
                    if(isset($hasLast))
                        $rtn['last'] = $r[$l];
                    return $rtn;
                }
            }
            return false;
        }
    }



    // 路由解析
    // 测试 10万次执行时间<1s
    private static function routeParseRest() {
        $rtn = array(
            'c' => 'index',
            'a' => 'index'
        );

        $index = strpos($_SERVER['SCRIPT_NAME'], '/', 1) + 1;
        $url = rtrim( substr($_SERVER['REQUEST_URI'] , $index),"/");
        $e = strpos($url, '?');
        if ($e) {
            $url = substr($url, 0, $e);
        }
        if ($url) {
            $r = explode('/', $url);
            $rtn['c'] = $r[0];

            // 如果设置了action
            if (isset($r[1])) {
                $rtn['a'] = $r[1]==''?'index':$r[1];
                $l = count($r);
                if ($l>2 && $l % 2 != 0) {
                    $l-=1;
                    $hasLast = true;
                }
                for ($i = 2; $i < $l; $i+=2) {
                    if($r[$i]==='c' || $r[$i]==='a')
                        continue;
                    $rtn[$r[$i]] = $r[$i + 1];
                }
                if(isset($hasLast))
                    $rtn['last'] = $r[$l];
            }
            return $rtn;
        } else {
            return $rtn;
        }
    }

    private static function routeParse($cName, $aName) {

        $rtn = array(
            'c' => 'index',
            'a' => 'index'
        );
        if (isset($_GET[$cName]) && !empty($_GET[$cName])) {
            $rtn['c'] = $_GET[$cName];
        }
        if (isset($_GET[$aName]) && !empty($_GET[$aName])) {
            $rtn['a'] = $_GET[$aName];
        }

        return $rtn;
    }

}

function web_autoload($class)
{
    $WEB_CONFIG   = CatConfig::getInstance(APP_PATH.'/config/config.php');

    // 判断是controller还是model
    if(stripos($class, "Controller")) {
        $class = str_replace("Controller", "", $class);
        require APP_PATH.'/'.$WEB_CONFIG->controller_path.strtolower($class).'.php';
    } else if(stripos($class, "Model")) {
        $class = str_replace("Model", "", $class);
        $modelFile = APP_PATH.'/'.$WEB_CONFIG->model_path.strtolower($class).'.php';
        if(file_exists($modelFile))
        {
            require $modelFile;

        }else{
            foreach ($WEB_CONFIG->model_dirs as $dir) {
                $modelFile = APP_PATH.'/'.$WEB_CONFIG->model_path. $dir .strtolower($class).'.php';
                if (file_exists($modelFile)) {
                    include $modelFile;
                    break;
                }
            }
        }

    }
}

?>