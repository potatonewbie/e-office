<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0df76f12674c82d3fc9dd9417b8a77eb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit0df76f12674c82d3fc9dd9417b8a77eb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0df76f12674c82d3fc9dd9417b8a77eb::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit0df76f12674c82d3fc9dd9417b8a77eb::$classMap;

        }, null, ClassLoader::class);
    }
}
