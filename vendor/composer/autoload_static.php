<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5360aeeb5b0e8b607c0c490d4be3d6e7
{
    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInit5360aeeb5b0e8b607c0c490d4be3d6e7::$classMap;

        }, null, ClassLoader::class);
    }
}
