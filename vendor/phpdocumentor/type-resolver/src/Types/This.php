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

namespace phpDocumentor\Reflection\Types;

use phpDocumentor\Reflection\Type;

/**
 * Value Object representing the '$this' pseudo-type.
 *
 * $this, as a Type, represents the instance of the class associated with the element as it was called. $this is
 * commonly used when documenting fluent interfaces since it represents that the same object is returned.
<<<<<<< HEAD
 *
 * @psalm-immutable
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */
final class This implements Type
{
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
        return '$this';
    }
}
