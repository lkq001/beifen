<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc7dd32270779efb86300bc2ff2753317
{
    public static $files = array (
        'f960e77410032f236cef8c56617b313e' => __DIR__ . '/..' . '/overtrue/laravel-lang/src/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'O' => 
        array (
            'Overtrue\\LaravelLang\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Overtrue\\LaravelLang\\' => 
        array (
            0 => __DIR__ . '/..' . '/overtrue/laravel-lang/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitc7dd32270779efb86300bc2ff2753317::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitc7dd32270779efb86300bc2ff2753317::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
