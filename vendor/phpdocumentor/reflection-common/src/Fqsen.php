<?php
<<<<<<< HEAD

declare(strict_types=1);

/**
 * phpDocumentor
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
=======
/**
 * phpDocumentor
 *
 * PHP Version 5.5
 *
 * @copyright 2010-2015 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection;

<<<<<<< HEAD
use InvalidArgumentException;
use function assert;
use function end;
use function explode;
use function is_string;
use function preg_match;
use function sprintf;
use function trim;

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * Value Object for Fqsen.
 *
 * @link https://github.com/phpDocumentor/fig-standards/blob/master/proposed/phpdoc-meta.md
<<<<<<< HEAD
 *
 * @psalm-immutable
 */
final class Fqsen
{
    /** @var string full quallified class name */
    private $fqsen;

    /** @var string name of the element without path. */
=======
 */
final class Fqsen
{
    /**
     * @var string full quallified class name
     */
    private $fqsen;

    /**
     * @var string name of the element without path.
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $name;

    /**
     * Initializes the object.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException when $fqsen is not matching the format.
     */
    public function __construct(string $fqsen)
    {
        $matches = [];

        $result = preg_match(
            //phpcs:ignore Generic.Files.LineLength.TooLong
            '/^\\\\([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff\\\\]*)?(?:[:]{2}\\$?([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*))?(?:\\(\\))?$/',
            $fqsen,
            $matches
        );

        if ($result === 0) {
            throw new InvalidArgumentException(
=======
     * @param string $fqsen
     *
     * @throws \InvalidArgumentException when $fqsen is not matching the format.
     */
    public function __construct($fqsen)
    {
        $matches = array();
        $result = preg_match(
            '/^\\\\([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff\\\\]*)?(?:[:]{2}\\$?([a-zA-Z_\\x7f-\\xff][a-zA-Z0-9_\\x7f-\\xff]*))?(?:\\(\\))?$/',
                $fqsen,
                $matches
        );

        if ($result === 0) {
            throw new \InvalidArgumentException(
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                sprintf('"%s" is not a valid Fqsen.', $fqsen)
            );
        }

        $this->fqsen = $fqsen;

        if (isset($matches[2])) {
            $this->name = $matches[2];
        } else {
            $matches = explode('\\', $fqsen);
<<<<<<< HEAD
            $name = end($matches);
            assert(is_string($name));
            $this->name = trim($name, '()');
=======
            $this->name = trim(end($matches), '()');
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }
    }

    /**
     * converts this class to string.
<<<<<<< HEAD
     */
    public function __toString() : string
=======
     *
     * @return string
     */
    public function __toString()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->fqsen;
    }

    /**
     * Returns the name of the element without path.
<<<<<<< HEAD
     */
    public function getName() : string
=======
     *
     * @return string
     */
    public function getName()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->name;
    }
}
