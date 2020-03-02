<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0a5ec91e3a1c0ac950ad09a4db907616
{
    public static $prefixLengthsPsr4 = array (
        'h' => 
        array (
            'helper\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'helper\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'helper\\db\\components\\Connection' => __DIR__ . '/../..' . '/app/db/components/Connection.php',
        'helper\\db\\components\\queryHelper' => __DIR__ . '/../..' . '/app/db/components/queryHelper.php',
        'helper\\models\\PostData' => __DIR__ . '/../..' . '/app/models/PostData.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0a5ec91e3a1c0ac950ad09a4db907616::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0a5ec91e3a1c0ac950ad09a4db907616::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0a5ec91e3a1c0ac950ad09a4db907616::$classMap;

        }, null, ClassLoader::class);
    }
}
