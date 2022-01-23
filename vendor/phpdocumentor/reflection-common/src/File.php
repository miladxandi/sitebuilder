<?php
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
<<<<<<< HEAD
=======
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection;

/**
 * Interface for files processed by the ProjectFactory
 */
interface File
{
    /**
     * Returns the content of the file as a string.
<<<<<<< HEAD
     */
    public function getContents() : string;

    /**
     * Returns md5 hash of the file.
     */
    public function md5() : string;

    /**
     * Returns an relative path to the file.
     */
    public function path() : string;
=======
     *
     * @return string
     */
    public function getContents();

    /**
     * Returns md5 hash of the file.
     *
     * @return string
     */
    public function md5();

    /**
     * Returns an relative path to the file.
     *
     * @return string
     */
    public function path();
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
