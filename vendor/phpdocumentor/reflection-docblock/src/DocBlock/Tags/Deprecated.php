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
 * Reflection class for a {@}deprecated tag in a Docblock.
 */
final class Deprecated extends BaseTag implements Factory\StaticMethod
{
<<<<<<< HEAD
    /** @var string */
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    protected $name = 'deprecated';

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
        Assert::nullOrNotEmpty($version);

        $this->version     = $version;
=======
    /** @var string The version vector. */
    private $version = '';

    public function __construct($version = null, Description $description = null)
    {
        Assert::nullOrStringNotEmpty($version);

        $this->version = $version;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $this->description = $description;
    }

    /**
     * @return static
     */
<<<<<<< HEAD
    public static function create(
        ?string $body,
        ?DescriptionFactory $descriptionFactory = null,
        ?TypeContext $context = null
    ): self {
=======
    public static function create($body, DescriptionFactory $descriptionFactory = null, TypeContext $context = null)
    {
        Assert::nullOrString($body);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        if (empty($body)) {
            return new static();
        }

        $matches = [];
        if (!preg_match('/^(' . self::REGEX_VECTOR . ')\s*(.+)?$/sux', $body, $matches)) {
            return new static(
                null,
<<<<<<< HEAD
                $descriptionFactory !== null ? $descriptionFactory->create($body, $context) : null
            );
        }

        Assert::notNull($descriptionFactory);

        return new static(
            $matches[1],
            $descriptionFactory->create($matches[2] ?? '', $context)
=======
                null !== $descriptionFactory ? $descriptionFactory->create($body, $context) : null
            );
        }

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
