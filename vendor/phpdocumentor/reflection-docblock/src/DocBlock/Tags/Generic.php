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

<<<<<<< HEAD
use InvalidArgumentException;
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
use phpDocumentor\Reflection\DocBlock\Description;
use phpDocumentor\Reflection\DocBlock\DescriptionFactory;
use phpDocumentor\Reflection\DocBlock\StandardTagFactory;
use phpDocumentor\Reflection\Types\Context as TypeContext;
use Webmozart\Assert\Assert;

<<<<<<< HEAD
use function preg_match;

/**
 * Parses a tag definition for a DocBlock.
 */
final class Generic extends BaseTag implements Factory\StaticMethod
=======
/**
 * Parses a tag definition for a DocBlock.
 */
class Generic extends BaseTag implements Factory\StaticMethod
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
{
    /**
     * Parses a tag and populates the member variables.
     *
<<<<<<< HEAD
     * @param string      $name        Name of the tag.
     * @param Description $description The contents of the given tag.
     */
    public function __construct(string $name, ?Description $description = null)
    {
        $this->validateTagName($name);

        $this->name        = $name;
=======
     * @param string $name Name of the tag.
     * @param Description $description The contents of the given tag.
     */
    public function __construct($name, Description $description = null)
    {
        $this->validateTagName($name);

        $this->name = $name;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $this->description = $description;
    }

    /**
     * Creates a new tag that represents any unknown tag type.
     *
<<<<<<< HEAD
     * @return static
     */
    public static function create(
        string $body,
        string $name = '',
        ?DescriptionFactory $descriptionFactory = null,
        ?TypeContext $context = null
    ): self {
        Assert::stringNotEmpty($name);
        Assert::notNull($descriptionFactory);

        $description = $body !== '' ? $descriptionFactory->create($body, $context) : null;
=======
     * @param string             $body
     * @param string             $name
     * @param DescriptionFactory $descriptionFactory
     * @param TypeContext        $context
     *
     * @return static
     */
    public static function create(
        $body,
        $name = '',
        DescriptionFactory $descriptionFactory = null,
        TypeContext $context = null
    ) {
        Assert::string($body);
        Assert::stringNotEmpty($name);
        Assert::notNull($descriptionFactory);

        $description = $descriptionFactory && $body ? $descriptionFactory->create($body, $context) : null;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        return new static($name, $description);
    }

    /**
     * Returns the tag as a serialized string
<<<<<<< HEAD
     */
    public function __toString(): string
    {
        if ($this->description) {
            $description = $this->description->render();
        } else {
            $description = '';
        }

        return $description;
=======
     *
     * @return string
     */
    public function __toString()
    {
        return ($this->description ? $this->description->render() : '');
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }

    /**
     * Validates if the tag name matches the expected format, otherwise throws an exception.
<<<<<<< HEAD
     */
    private function validateTagName(string $name): void
    {
        if (!preg_match('/^' . StandardTagFactory::REGEX_TAGNAME . '$/u', $name)) {
            throw new InvalidArgumentException(
=======
     *
     * @param string $name
     *
     * @return void
     */
    private function validateTagName($name)
    {
        if (! preg_match('/^' . StandardTagFactory::REGEX_TAGNAME . '$/u', $name)) {
            throw new \InvalidArgumentException(
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                'The tag name "' . $name . '" is not wellformed. Tags may only consist of letters, underscores, '
                . 'hyphens and backslashes.'
            );
        }
    }
}
