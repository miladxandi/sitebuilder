<?php declare(strict_types = 1);
namespace TheSeer\Tokenizer;

class TokenCollection implements \ArrayAccess, \Iterator, \Countable {

<<<<<<< HEAD
    /** @var Token[] */
    private $tokens = [];

    /** @var int */
    private $pos;

    public function addToken(Token $token): void {
        $this->tokens[] = $token;
    }

    public function current(): Token {
        return \current($this->tokens);
    }

    public function key(): int {
        return \key($this->tokens);
    }

    public function next(): void {
        \next($this->tokens);
        $this->pos++;
    }

=======
    /**
     * @var Token[]
     */
    private $tokens = [];

    /**
     * @var int
     */
    private $pos;

    /**
     * @param Token $token
     */
    public function addToken(Token $token) {
        $this->tokens[] = $token;
    }

    /**
     * @return Token
     */
    public function current(): Token {
        return current($this->tokens);
    }

    /**
     * @return int
     */
    public function key(): int {
        return key($this->tokens);
    }

    /**
     * @return void
     */
    public function next() {
        next($this->tokens);
        $this->pos++;
    }

    /**
     * @return bool
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function valid(): bool {
        return $this->count() > $this->pos;
    }

<<<<<<< HEAD
    public function rewind(): void {
        \reset($this->tokens);
        $this->pos = 0;
    }

    public function count(): int {
        return \count($this->tokens);
    }

=======
    /**
     * @return void
     */
    public function rewind() {
        reset($this->tokens);
        $this->pos = 0;
    }

    /**
     * @return int
     */
    public function count(): int {
        return count($this->tokens);
    }

    /**
     * @param mixed $offset
     *
     * @return bool
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function offsetExists($offset): bool {
        return isset($this->tokens[$offset]);
    }

    /**
<<<<<<< HEAD
=======
     * @param mixed $offset
     *
     * @return Token
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     * @throws TokenCollectionException
     */
    public function offsetGet($offset): Token {
        if (!$this->offsetExists($offset)) {
            throw new TokenCollectionException(
<<<<<<< HEAD
                \sprintf('No Token at offest %s', $offset)
=======
                sprintf('No Token at offest %s', $offset)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            );
        }

        return $this->tokens[$offset];
    }

    /**
<<<<<<< HEAD
=======
     * @param mixed $offset
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     * @param Token $value
     *
     * @throws TokenCollectionException
     */
<<<<<<< HEAD
    public function offsetSet($offset, $value): void {
        if (!\is_int($offset)) {
            $type = \gettype($offset);

            throw new TokenCollectionException(
                \sprintf(
                    'Offset must be of type integer, %s given',
                    $type === 'object' ? \get_class($value) : $type
                )
            );
        }

        if (!$value instanceof Token) {
            $type = \gettype($value);

            throw new TokenCollectionException(
                \sprintf(
                    'Value must be of type %s, %s given',
                    Token::class,
                    $type === 'object' ? \get_class($value) : $type
=======
    public function offsetSet($offset, $value) {
        if (!is_int($offset)) {
            $type = gettype($offset);
            throw new TokenCollectionException(
                sprintf(
                    'Offset must be of type integer, %s given',
                    $type === 'object' ? get_class($value) : $type
                )
            );
        }
        if (!$value instanceof Token) {
            $type = gettype($value);
            throw new TokenCollectionException(
                sprintf(
                    'Value must be of type %s, %s given',
                    Token::class,
                    $type === 'object' ? get_class($value) : $type
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                )
            );
        }
        $this->tokens[$offset] = $value;
    }

<<<<<<< HEAD
    public function offsetUnset($offset): void {
        unset($this->tokens[$offset]);
    }
=======
    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset) {
        unset($this->tokens[$offset]);
    }

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
