<?php

return array(
    // 模板文件路径
    'view_path'=>'views/',
    // 控制器文件路径，controller都会在这个目录下查找
    'controller_path'=>'controllers/',
    // 控制器子目录，如果希望在控制器目录下放子目录可在此设置
    'controller_dirs' => array('test/','api/'),
    // 设置哪些controller为RESTfule形式
    'rest_controllers'=>array('product','api'),
    // 设置路由模式，router_rest为true时，采用Rest风格路由，为false则采用参数形式，router_name参数生效
    'router_rest'     => true,
    'router_name'     =>array(
            'c' => 'c',
            'a' => 'a',
        ),
    // 设置日志等级
    'log_level'       => Logging::ALL,
    // 模板引擎 可选（tenjin smarty php）
    'template_engine'=>array(
        'type'  => 'smarty',
        'debug' => false,
        'cache' => false,
        'cache_lifetime' => 120,
    ),
    // 设置路由规则，详细内容请参考文档中的路由专题
    'route_rules'=>array(
        // 静态路由 和参数
            array(
            "rule" => "read/title/page",
            "controller" => 'book',
            "action" => 'test'
            ),
            array(
            "rule" => "read/:title/:page",
            "controller" => 'book',
            "action" => 'index'
            ),
            array(
            "rule" => "read/(\d{6}$)",
            "controller" => 'book',
            "action" => 'read',
            "reg_map"=>array('bookid')
            ),

        ),
    );

?>
