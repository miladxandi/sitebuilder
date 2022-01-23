<?php
<<<<<<< HEAD

declare(strict_types=1);

/**
 * This file is part of phpDocumentor.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @link http://phpdoc.org
=======
/**
 * phpDocumentor
 *
 * PHP Version 5.3
 *
 * @author    Vasil Rangelov <boen.robot@gmail.com>
 * @copyright 2010-2011 Mike van Riel / Naenius (http://www.naenius.com)
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */

namespace phpDocumentor\Reflection\DocBlock\Tags;

use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
use function preg_match;

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
/**
 * Reflection class for a {@}version tag in a Docblock.
 */
final class Version extends BaseTag implements Factory\StaticMethod
{
<<<<<<< HEAD
    /** @var string */
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    protected $name = 'version';

    /**
     * PCRE regular expression matching a version vector.
     * Assumes the "x" modifier.
     */
<<<<<<< HEAD
    public const REGEX_VECTOR = '(?:
=======
    const REGEX_VECTOR = '(?:
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        # Normal release vectors.
        \d\S*
        |
        # VCS version vectors. Per PHPCS, they are expected to
        # follow the form of the VCS name, followed by ":", followed
        # by the version vector itself.
        # By convention, popular VCSes like CVS, SVN and GIT use "$"
        # around the actual version vector.
        [^\s\:]+\:\s*\$[^\$]+\$
    )';

<<<<<<< HEAD
    /** @var string|null The version vector. */
    private $version;

    public function __construct(?string $version = null, ?Description $description = null)
    {
        Assert::nullOrStringNotEmpty($version);

        $this->version     = $version;
        $this->description = $description;
    }

    public static function create(
        ?string $body,
        ?DescriptionFactory $descriptionFactory = null,
        ?TypeContext $context = null
    ): ?self {
=======
    /** @var string The version vector. */
    private $version = '';

    public function __construct($version = null, Description $description = null)
    {
        Assert::nullOrStringNotEmpty($version);

        $this->version = $version;
        $this->description = $description;
    }

    /**
     * @return static
     */
    public static function create($body, DescriptionFactory $descriptionFactory = null, TypeContext $context = null)
    {
        Assert::nullOrString($body);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        if (empty($body)) {
            return new static();
        }

        $matches = [];
        if (!preg_match('/^(' . self::REGEX_VECTOR . ')\s*(.+)?$/sux', $body, $matches)) {
            return null;
        }

<<<<<<< HEAD
        $description = null;
        if ($descriptionFactory !== null) {
            $description = $descriptionFactory->create($matches[2] ?? '', $context);
        }

        return new static(
            $matches[1],
            $description
=======
        return new static(
            $matches[1],
            $descriptionFactory->create(isset($matches[2]) ? $matches[2] : '', $context)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        );
    }

    /**
     * Gets the version section of the tag.
<<<<<<< HEAD
     */
    public function getVersion(): ?string
=======
     *
     * @return string
     */
    public function getVersion()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->version;
    }

    /**
     * Returns a string representation for this tag.
<<<<<<< HEAD
     */
    public function __toString(): string
    {
        if ($this->description) {
            $description = $this->description->render();
        } else {
            $description = '';
        }

        $version = (string) $this->version;

        return $version . ($description !== '' ? ($version !== '' ? ' ' : '') . $description : '');
=======
     *
     * @return string
     */
    public function __toString()
    {
        return $this->version . ($this->description ? ' ' . $this->description->render() : '');
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }
}
