<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInita17908cfe998440f5846c86cf5a32b68
{
    public static $files = array (
        'ad155f8f1cf0d418fe49e248db8c661b' => __DIR__ . '/..' . '/react/promise/src/functions_include.php',
        'f5ca4fd427b6b0d498d39ee677869565' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/Audience.php',
        'c02e26d7db303f84653ea5b06411dbc6' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/Message.php',
        '11b0d33fcd514a4ddafdffdde52f9ffc' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/Notification.php',
        '16062f7baa6f181e36c999bbc0a6e869' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/Options.php',
        '19ed2f08133463154ed67cf54db053d7' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/Platform.php',
        'e92b839dcbd61d7292e55a3955366068' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/PushPayload.php',
        '77eb47e8028da501bb14e816fa1ed3f8' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/PushResponse.php',
        'ecfab0fda16faa598de3e78f34399ba8' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/ReportResponse.php',
        '6d01f947d7c99a598198a2cb3c5ab6f5' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/MessageResponse.php',
        '3a7967691b35f2bdd35f80bf87c89f43' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/MessageAndroid.php',
        '0df6b2e0b3868fd1a8e53e6897314595' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/MessageIOS.php',
        'ce59702f0b1054fbf589d54f07242262' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/MessageItem.php',
        'ba7b7b76838f4cc83649889003e4abc5' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/UserResponse.php',
        '2b787183a5de036d9a6d98e9e79e801d' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/DeviceResponse.php',
        '1f42702016a63d9bc7bc93b71e2beceb' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Model/Report.php',
        '65df8932f2fc516ed87bf1526defa9dc' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/JPushClient.php',
        '6a8f01eeab726e96e70a7e4646c91aa8' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/JPushLog.php',
        'd02dae5c3c945182b62f0d56a40c74d6' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Exception/APIConnectionException.php',
        'a5622accddee34adffb88d38b99736ff' => __DIR__ . '/..' . '/jpush/jpush/src/JPush/Exception/APIRequestException.php',
    );

    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'React\\Promise\\' => 14,
        ),
        'M' => 
        array (
            'Monolog\\' => 8,
        ),
        'G' => 
        array (
            'GuzzleHttp\\Stream\\' => 18,
            'GuzzleHttp\\Ring\\' => 16,
        ),
        'E' => 
        array (
            'Elasticsearch\\' => 14,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Cache\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'React\\Promise\\' => 
        array (
            0 => __DIR__ . '/..' . '/react/promise/src',
        ),
        'Monolog\\' => 
        array (
            0 => __DIR__ . '/..' . '/monolog/monolog/src/Monolog',
        ),
        'GuzzleHttp\\Stream\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/streams/src',
        ),
        'GuzzleHttp\\Ring\\' => 
        array (
            0 => __DIR__ . '/..' . '/guzzlehttp/ringphp/src',
        ),
        'Elasticsearch\\' => 
        array (
            0 => __DIR__ . '/..' . '/elasticsearch/elasticsearch/src/Elasticsearch',
        ),
        'Doctrine\\Common\\Cache\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/cache/lib/Doctrine/Common/Cache',
        ),
    );

    public static $prefixesPsr0 = array (
        'j' => 
        array (
            'jpush' => 
            array (
                0 => __DIR__ . '/..' . '/jpush/jpush/src',
            ),
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 
            array (
                0 => __DIR__ . '/..' . '/psr/log',
            ),
            'PHPImageWorkshop' => 
            array (
                0 => __DIR__ . '/..' . '/sybio/image-workshop/src',
            ),
        ),
        'H' => 
        array (
            'Httpful' => 
            array (
                0 => __DIR__ . '/..' . '/nategood/httpful/src',
            ),
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInita17908cfe998440f5846c86cf5a32b68::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInita17908cfe998440f5846c86cf5a32b68::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInita17908cfe998440f5846c86cf5a32b68::$prefixesPsr0;

        }, null, ClassLoader::class);
    }
}