<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitdc6bb3cd4d7bcb490d7c4a3fc7c45eba
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        require __DIR__ . '/platform_check.php';

        spl_autoload_register(array('ComposerAutoloaderInitdc6bb3cd4d7bcb490d7c4a3fc7c45eba', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitdc6bb3cd4d7bcb490d7c4a3fc7c45eba', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitdc6bb3cd4d7bcb490d7c4a3fc7c45eba::getInitializer($loader));

        $loader->register(true);

        $includeFiles = \Composer\Autoload\ComposerStaticInitdc6bb3cd4d7bcb490d7c4a3fc7c45eba::$files;
        foreach ($includeFiles as $fileIdentifier => $file) {
            composerRequiredc6bb3cd4d7bcb490d7c4a3fc7c45eba($fileIdentifier, $file);
        }

        return $loader;
    }
}

/**
 * @param string $fileIdentifier
 * @param string $file
 * @return void
 */
function composerRequiredc6bb3cd4d7bcb490d7c4a3fc7c45eba($fileIdentifier, $file)
{
    if (empty($GLOBALS['__composer_autoload_files'][$fileIdentifier])) {
        $GLOBALS['__composer_autoload_files'][$fileIdentifier] = true;

        require $file;
    }
}
