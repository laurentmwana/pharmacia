<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit222b44cf7027687c59a82ae401327c1b
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit222b44cf7027687c59a82ae401327c1b::$classMap;

        }, null, ClassLoader::class);
    }
}
