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
 * The location where an element occurs within a file.
<<<<<<< HEAD
 *
 * @psalm-immutable
 */
final class Location
{
    /** @var int */
=======
 */
final class Location
{
    /** @var int  */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $lineNumber = 0;

    /** @var int */
    private $columnNumber = 0;

    /**
     * Initializes the location for an element using its line number in the file and optionally the column number.
<<<<<<< HEAD
     */
    public function __construct(int $lineNumber, int $columnNumber = 0)
    {
        $this->lineNumber = $lineNumber;
=======
     *
     * @param int $lineNumber
     * @param int $columnNumber
     */
    public function __construct($lineNumber, $columnNumber = 0)
    {
        $this->lineNumber   = $lineNumber;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $this->columnNumber = $columnNumber;
    }

    /**
     * Returns the line number that is covered by this location.
<<<<<<< HEAD
     */
    public function getLineNumber() : int
=======
     *
     * @return integer
     */
    public function getLineNumber()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->lineNumber;
    }

    /**
     * Returns the column number (character position on a line) for this location object.
<<<<<<< HEAD
     */
    public function getColumnNumber() : int
=======
     *
     * @return integer
     */
    public function getColumnNumber()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->columnNumber;
    }
}
