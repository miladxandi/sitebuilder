<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Reader;

use Symfony\Component\Translation\MessageCatalogue;

/**
 * TranslationReader reads translation messages from translation files.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
interface TranslationReaderInterface
{
    /**
     * Reads translation messages from a directory to the catalogue.
     *
<<<<<<< HEAD
     * @param string $directory
=======
     * @param string           $directory
     * @param MessageCatalogue $catalogue
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    public function read($directory, MessageCatalogue $catalogue);
}
