CatPHP
======

CatPHP is a simple modularity PHP framework
------
CatPHP的理念

- 1、彻底的开源,思想层面上的开源<br>
开源不应该仅仅是代码的共享，更应该是思想的共享。很多很好的开源软件非常的优秀，只可惜阅读他的源代码是非常困难的，并不是因为代码本身写的不好或注释不完整，而是因为不了解整体架构和背景。我认为每一行代码都是有他的背景的，为何这样写而不那样写，这么写的作用是什么，优点是什么，缺点是什么

- 2、非侵入式的PHP框架<br>
多数PHP框架是为了WEB而生，但PHP却不仅仅可以用来做WEB，因此CatPHP希望任何的应用都可以使用本框架，并且希望在项目生命周期的任何阶段都可以引入CatPHP，这就意味着CatPHP是完全解耦与项目的，你可以使用CI、Zend等任何的框架，但需要CatPHP的时候随时可以加进来。


- 3、简单与性能优先<br>
在功能、性能、设计的权衡中，性能与简单优先。

- 编码规范
1.文件命名：小写加下划线
2.类名：首字母大写，驼峰
3.函数名：驼峰
4.缩进：4空格
5.大括号：非换行式，{ 之前要有1空格
样例：
```php
class ExampleClass {
    
    function exampleFunction() {

        if ( isset($a) ) {
            echo 'a';
        }
    }
}


```


- 性能规范：
1.任何函数执行10万次要在1s内完成

- 设计规范：
1.任何类不依赖于框架，可单独使用


----------
nginx设置：
```
if (!-e $request_filename) 
{
    rewrite ^/$ /webtest/index.php last;
}
```
--rewrite ^/(.*)$ /webtest/index.php last;
原理：将url请求解析到index.php，由框架中的路由解析功能，解析请求后加载指定的类


