<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3a67be04cc517e8755d37943f407121d
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit3a67be04cc517e8755d37943f407121d::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3a67be04cc517e8755d37943f407121d::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit3a67be04cc517e8755d37943f407121d::$classMap;

        }, null, ClassLoader::class);
    }
}
