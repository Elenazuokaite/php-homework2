<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite28b51603cbaf4b1b4ada503a15dcb0f
{
    public static $prefixLengthsPsr4 = array (
        'N' => 
        array (
            'Nfq\\Weather\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Nfq\\Weather\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite28b51603cbaf4b1b4ada503a15dcb0f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite28b51603cbaf4b1b4ada503a15dcb0f::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
