<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3e4273741e24449fd93e339af3aa1b94
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Ajax\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Ajax\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmv/php-mv-ui/Ajax',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3e4273741e24449fd93e339af3aa1b94::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3e4273741e24449fd93e339af3aa1b94::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
