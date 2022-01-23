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
 * @link http://phpdoc.org
=======
 * @copyright 2010-2015 Mike van Riel<mike@phpdoc.org>
 * @license   http://www.opensource.org/licenses/mit-license.php MIT
 * @link      http://phpdoc.org
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */

namespace phpDocumentor\Reflection\DocBlock\Tags;

<<<<<<< HEAD
use InvalidArgumentException;

use function filter_var;
use function preg_match;
use function trim;

use const FILTER_VALIDATE_EMAIL;
=======
use Webmozart\Assert\Assert;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

/**
 * Reflection class for an {@}author tag in a Docblock.
 */
final class Author extends BaseTag implements Factory\StaticMethod
{
    /** @var string register that this is the author tag. */
    protected $name = 'author';

    /** @var string The name of the author */
<<<<<<< HEAD
    private $authorName;

    /** @var string The email of the author */
    private $authorEmail;

    /**
     * Initializes this tag with the author name and e-mail.
     */
    public function __construct(string $authorName, string $authorEmail)
    {
        if ($authorEmail && !filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
            throw new InvalidArgumentException('The author tag does not have a valid e-mail address');
=======
    private $authorName = '';

    /** @var string The email of the author */
    private $authorEmail = '';

    /**
     * Initializes this tag with the author name and e-mail.
     *
     * @param string $authorName
     * @param string $authorEmail
     */
    public function __construct($authorName, $authorEmail)
    {
        Assert::string($authorName);
        Assert::string($authorEmail);
        if ($authorEmail && !filter_var($authorEmail, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('The author tag does not have a valid e-mail address');
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }

        $this->authorName  = $authorName;
        $this->authorEmail = $authorEmail;
    }

    /**
     * Gets the author's name.
     *
     * @return string The author's name.
     */
<<<<<<< HEAD
    public function getAuthorName(): string
=======
    public function getAuthorName()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->authorName;
    }

    /**
     * Returns the author's email.
     *
     * @return string The author's email.
     */
<<<<<<< HEAD
    public function getEmail(): string
=======
    public function getEmail()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->authorEmail;
    }

    /**
     * Returns this tag in string form.
<<<<<<< HEAD
     */
    public function __toString(): string
    {
        if ($this->authorEmail) {
            $authorEmail = '<' . $this->authorEmail . '>';
        } else {
            $authorEmail = '';
        }

        $authorName = $this->authorName;

        return $authorName . ($authorEmail !== '' ? ($authorName !== '' ? ' ' : '') . $authorEmail : '');
    }

    /**
     * Attempts to create a new Author object based on the tag body.
     */
    public static function create(string $body): ?self
    {
=======
     *
     * @return string
     */
    public function __toString()
    {
        return $this->authorName . (strlen($this->authorEmail) ? ' <' . $this->authorEmail . '>' : '');
    }

    /**
     * Attempts to create a new Author object based on †he tag body.
     *
     * @param string $body
     *
     * @return static
     */
    public static function create($body)
    {
        Assert::string($body);

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $splitTagContent = preg_match('/^([^\<]*)(?:\<([^\>]*)\>)?$/u', $body, $matches);
        if (!$splitTagContent) {
            return null;
        }

        $authorName = trim($matches[1]);
<<<<<<< HEAD
        $email      = isset($matches[2]) ? trim($matches[2]) : '';
=======
        $email = isset($matches[2]) ? trim($matches[2]) : '';
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        return new static($authorName, $email);
    }
}
