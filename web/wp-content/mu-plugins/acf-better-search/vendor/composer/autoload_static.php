<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite64eea9f89b5f8c3bb51e9a7dc7ebac4
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AcfBetterSearch\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AcfBetterSearch\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInite64eea9f89b5f8c3bb51e9a7dc7ebac4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite64eea9f89b5f8c3bb51e9a7dc7ebac4::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite64eea9f89b5f8c3bb51e9a7dc7ebac4::$classMap;

        }, null, ClassLoader::class);
    }
}
