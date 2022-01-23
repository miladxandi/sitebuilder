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
 * @author    Jan Schneider <jan@horde.org>
 * @copyright 2017 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * @link      http://phpdoc.org
 */

namespace phpDocumentor\Reflection\DocBlock\Tags\Formatter;

use phpDocumentor\Reflection\DocBlock\Tag;
use phpDocumentor\Reflection\DocBlock\Tags\Formatter;

<<<<<<< HEAD
use function max;
use function str_repeat;
use function strlen;

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
class AlignFormatter implements Formatter
{
    /** @var int The maximum tag name length. */
    protected $maxLen = 0;

    /**
<<<<<<< HEAD
=======
     * Constructor.
     *
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     * @param Tag[] $tags All tags that should later be aligned with the formatter.
     */
    public function __construct(array $tags)
    {
        foreach ($tags as $tag) {
            $this->maxLen = max($this->maxLen, strlen($tag->getName()));
        }
    }

    /**
     * Formats the given tag to return a simple plain text version.
<<<<<<< HEAD
     */
    public function format(Tag $tag): string
    {
        return '@' . $tag->getName() .
            str_repeat(
                ' ',
                $this->maxLen - strlen($tag->getName()) + 1
            ) .
            $tag;
=======
     *
     * @param Tag $tag
     *
     * @return string
     */
    public function format(Tag $tag)
    {
        return '@' . $tag->getName() . str_repeat(' ', $this->maxLen - strlen($tag->getName()) + 1) . (string)$tag;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }
}
