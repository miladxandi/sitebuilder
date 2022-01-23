<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

/**
 * PhpFileLoader loads translations from PHP files returning an array of translations.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class PhpFileLoader extends FileLoader
{
<<<<<<< HEAD
    private static $cache = [];

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    /**
     * {@inheritdoc}
     */
    protected function loadResource($resource)
    {
<<<<<<< HEAD
        if ([] === self::$cache && \function_exists('opcache_invalidate') && filter_var(ini_get('opcache.enable'), \FILTER_VALIDATE_BOOLEAN) && (!\in_array(\PHP_SAPI, ['cli', 'phpdbg'], true) || filter_var(ini_get('opcache.enable_cli'), \FILTER_VALIDATE_BOOLEAN))) {
            self::$cache = null;
        }

        if (null === self::$cache) {
            return require $resource;
        }

        if (isset(self::$cache[$resource])) {
            return self::$cache[$resource];
        }

        return self::$cache[$resource] = require $resource;
=======
        return require $resource;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }
}
