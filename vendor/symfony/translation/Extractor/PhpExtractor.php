<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Extractor;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * PhpExtractor extracts translation messages from a PHP template.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class PhpExtractor extends AbstractFileExtractor implements ExtractorInterface
{
<<<<<<< HEAD
    public const MESSAGE_TOKEN = 300;
    public const METHOD_ARGUMENTS_TOKEN = 1000;
    public const DOMAIN_TOKEN = 1001;
=======
    const MESSAGE_TOKEN = 300;
    const METHOD_ARGUMENTS_TOKEN = 1000;
    const DOMAIN_TOKEN = 1001;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

    /**
     * Prefix for new found message.
     *
     * @var string
     */
    private $prefix = '';

    /**
     * The sequence that captures translation messages.
     *
     * @var array
     */
    protected $sequences = [
        [
            '->',
            'trans',
            '(',
            self::MESSAGE_TOKEN,
            ',',
            self::METHOD_ARGUMENTS_TOKEN,
            ',',
            self::DOMAIN_TOKEN,
        ],
        [
            '->',
            'transChoice',
            '(',
            self::MESSAGE_TOKEN,
            ',',
            self::METHOD_ARGUMENTS_TOKEN,
            ',',
            self::METHOD_ARGUMENTS_TOKEN,
            ',',
            self::DOMAIN_TOKEN,
        ],
        [
            '->',
            'trans',
            '(',
            self::MESSAGE_TOKEN,
        ],
        [
            '->',
            'transChoice',
            '(',
            self::MESSAGE_TOKEN,
        ],
    ];

    /**
     * {@inheritdoc}
     */
    public function extract($resource, MessageCatalogue $catalog)
    {
        $files = $this->extractFiles($resource);
        foreach ($files as $file) {
<<<<<<< HEAD
            $this->parseTokens(token_get_all(file_get_contents($file)), $catalog, $file);

=======
            $this->parseTokens(token_get_all(file_get_contents($file)), $catalog);

            // PHP 7 memory manager will not release after token_get_all(), see https://bugs.php.net/70098
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            gc_mem_caches();
        }
    }

    /**
     * {@inheritdoc}
     */
    public function setPrefix($prefix)
    {
        $this->prefix = $prefix;
    }

    /**
     * Normalizes a token.
     *
     * @param mixed $token
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    protected function normalizeToken($token)
    {
        if (isset($token[1]) && 'b"' !== $token) {
            return $token[1];
        }

        return $token;
    }

    /**
     * Seeks to a non-whitespace token.
     */
    private function seekToNextRelevantToken(\Iterator $tokenIterator)
    {
        for (; $tokenIterator->valid(); $tokenIterator->next()) {
            $t = $tokenIterator->current();
<<<<<<< HEAD
            if (\T_WHITESPACE !== $t[0]) {
=======
            if (T_WHITESPACE !== $t[0]) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                break;
            }
        }
    }

    private function skipMethodArgument(\Iterator $tokenIterator)
    {
        $openBraces = 0;

        for (; $tokenIterator->valid(); $tokenIterator->next()) {
            $t = $tokenIterator->current();

            if ('[' === $t[0] || '(' === $t[0]) {
                ++$openBraces;
            }

            if (']' === $t[0] || ')' === $t[0]) {
                --$openBraces;
            }

            if ((0 === $openBraces && ',' === $t[0]) || (-1 === $openBraces && ')' === $t[0])) {
                break;
            }
        }
    }

    /**
     * Extracts the message from the iterator while the tokens
     * match allowed message tokens.
     */
    private function getValue(\Iterator $tokenIterator)
    {
        $message = '';
        $docToken = '';
        $docPart = '';

        for (; $tokenIterator->valid(); $tokenIterator->next()) {
            $t = $tokenIterator->current();
            if ('.' === $t) {
                // Concatenate with next token
                continue;
            }
            if (!isset($t[1])) {
                break;
            }

            switch ($t[0]) {
<<<<<<< HEAD
                case \T_START_HEREDOC:
                    $docToken = $t[1];
                    break;
                case \T_ENCAPSED_AND_WHITESPACE:
                case \T_CONSTANT_ENCAPSED_STRING:
=======
                case T_START_HEREDOC:
                    $docToken = $t[1];
                    break;
                case T_ENCAPSED_AND_WHITESPACE:
                case T_CONSTANT_ENCAPSED_STRING:
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    if ('' === $docToken) {
                        $message .= PhpStringTokenParser::parse($t[1]);
                    } else {
                        $docPart = $t[1];
                    }
                    break;
<<<<<<< HEAD
                case \T_END_HEREDOC:
                    if ($indentation = strspn($t[1], ' ')) {
                        $docPartWithLineBreaks = $docPart;
                        $docPart = '';

                        foreach (preg_split('~(\r\n|\n|\r)~', $docPartWithLineBreaks, -1, \PREG_SPLIT_DELIM_CAPTURE) as $str) {
                            if (\in_array($str, ["\r\n", "\n", "\r"], true)) {
                                $docPart .= $str;
                            } else {
                                $docPart .= substr($str, $indentation);
                            }
                        }
                    }

=======
                case T_END_HEREDOC:
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    $message .= PhpStringTokenParser::parseDocString($docToken, $docPart);
                    $docToken = '';
                    $docPart = '';
                    break;
<<<<<<< HEAD
                case \T_WHITESPACE:
=======
                case T_WHITESPACE:
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    break;
                default:
                    break 2;
            }
        }

        return $message;
    }

    /**
     * Extracts trans message from PHP tokens.
     *
<<<<<<< HEAD
     * @param array  $tokens
     * @param string $filename
     */
    protected function parseTokens($tokens, MessageCatalogue $catalog/*, string $filename*/)
    {
        if (\func_num_args() < 3 && __CLASS__ !== static::class && __CLASS__ !== (new \ReflectionMethod($this, __FUNCTION__))->getDeclaringClass()->getName() && !$this instanceof \PHPUnit\Framework\MockObject\MockObject && !$this instanceof \Prophecy\Prophecy\ProphecySubjectInterface && !$this instanceof \Mockery\MockInterface) {
            @trigger_error(sprintf('The "%s()" method will have a new "string $filename" argument in version 5.0, not defining it is deprecated since Symfony 4.3.', __METHOD__), \E_USER_DEPRECATED);
        }
        $filename = 2 < \func_num_args() ? func_get_arg(2) : '';

=======
     * @param array            $tokens
     * @param MessageCatalogue $catalog
     */
    protected function parseTokens($tokens, MessageCatalogue $catalog)
    {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $tokenIterator = new \ArrayIterator($tokens);

        for ($key = 0; $key < $tokenIterator->count(); ++$key) {
            foreach ($this->sequences as $sequence) {
                $message = '';
                $domain = 'messages';
                $tokenIterator->seek($key);

                foreach ($sequence as $sequenceKey => $item) {
                    $this->seekToNextRelevantToken($tokenIterator);

                    if ($this->normalizeToken($tokenIterator->current()) === $item) {
                        $tokenIterator->next();
                        continue;
                    } elseif (self::MESSAGE_TOKEN === $item) {
                        $message = $this->getValue($tokenIterator);

                        if (\count($sequence) === ($sequenceKey + 1)) {
                            break;
                        }
                    } elseif (self::METHOD_ARGUMENTS_TOKEN === $item) {
                        $this->skipMethodArgument($tokenIterator);
                    } elseif (self::DOMAIN_TOKEN === $item) {
<<<<<<< HEAD
                        $domainToken = $this->getValue($tokenIterator);
                        if ('' !== $domainToken) {
                            $domain = $domainToken;
                        }
=======
                        $domain = $this->getValue($tokenIterator);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

                        break;
                    } else {
                        break;
                    }
                }

                if ($message) {
                    $catalog->set($message, $this->prefix.$message, $domain);
<<<<<<< HEAD
                    $metadata = $catalog->getMetadata($message, $domain) ?? [];
                    $normalizedFilename = preg_replace('{[\\\\/]+}', '/', $filename);
                    $metadata['sources'][] = $normalizedFilename.':'.$tokens[$key][2];
                    $catalog->setMetadata($message, $metadata, $domain);
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                    break;
                }
            }
        }
    }

    /**
     * @param string $file
     *
     * @return bool
     *
     * @throws \InvalidArgumentException
     */
    protected function canBeExtracted($file)
    {
<<<<<<< HEAD
        return $this->isFile($file) && 'php' === pathinfo($file, \PATHINFO_EXTENSION);
    }

    /**
     * {@inheritdoc}
=======
        return $this->isFile($file) && 'php' === pathinfo($file, PATHINFO_EXTENSION);
    }

    /**
     * @param string|array $directory
     *
     * @return array
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    protected function extractFromDirectory($directory)
    {
        $finder = new Finder();

        return $finder->files()->name('*.php')->in($directory);
    }
}
