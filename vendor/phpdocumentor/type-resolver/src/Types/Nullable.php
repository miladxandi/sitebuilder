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
 * @copyright 2010-2017 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Type;

/**
 * Value Object representing a nullable type. The real type is wrapped.
<<<<<<< HEAD
 *
 * @psalm-immutable
 */
final class Nullable implements Type
{
    /** @var Type The actual type that is wrapped */
=======
 */
final class Nullable implements Type
{
    /**
     * @var Type
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $realType;

    /**
     * Initialises this nullable type using the real type embedded
<<<<<<< HEAD
=======
     *
     * @param Type $realType
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    public function __construct(Type $realType)
    {
        $this->realType = $realType;
    }

    /**
     * Provide access to the actual type directly, if needed.
<<<<<<< HEAD
     */
    public function getActualType(): Type
=======
     *
     * @return Type
     */
    public function getActualType()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->realType;
    }

    /**
     * Returns a rendered output of the Type as it would be used in a DocBlock.
<<<<<<< HEAD
     */
    public function __toString(): string
=======
     *
     * @return string
     */
    public function __toString()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return '?' . $this->realType->__toString();
    }
}
