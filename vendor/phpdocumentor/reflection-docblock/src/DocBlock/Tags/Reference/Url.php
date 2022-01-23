<?php
<<<<<<< HEAD

declare(strict_types=1);

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * This file is part of phpDocumentor.
 *
 *  For the full copyright and license information, please view the LICENSE
 *  file that was distributed with this source code.
 *
<<<<<<< HEAD
 * @link http://phpdoc.org
=======
 *  @copyright 2010-2017 Mike van Riel<mike@phpdoc.org>
 *  @license   http://www.opensource.org/licenses/mit-license.php MIT
 *  @link      http://phpdoc.org
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */

namespace phpDocumentor\Reflection\DocBlock\Tags\Reference;

use Webmozart\Assert\Assert;

/**
<<<<<<< HEAD
 * Url reference used by {@see \phpDocumentor\Reflection\DocBlock\Tags\See}
 */
final class Url implements Reference
{
    /** @var string */
    private $uri;

    public function __construct(string $uri)
=======
 * Url reference used by {@see phpDocumentor\Reflection\DocBlock\Tags\See}
 */
final class Url implements Reference
{
    /**
     * @var string
     */
    private $uri;

    /**
     * Url constructor.
     */
    public function __construct($uri)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        Assert::stringNotEmpty($uri);
        $this->uri = $uri;
    }

<<<<<<< HEAD
    public function __toString(): string
=======
    public function __toString()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->uri;
    }
}
