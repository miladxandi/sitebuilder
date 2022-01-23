<?php declare(strict_types = 1);
namespace TheSeer\Tokenizer;

class NamespaceUri {

    /** @var string */
    private $value;

<<<<<<< HEAD
=======
    /**
     * @param string $value
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function __construct(string $value) {
        $this->ensureValidUri($value);
        $this->value = $value;
    }

    public function asString(): string {
        return $this->value;
    }

<<<<<<< HEAD
    private function ensureValidUri($value): void {
        if (\strpos($value, ':') === false) {
            throw new NamespaceUriException(
                \sprintf("Namespace URI '%s' must contain at least one colon", $value)
=======
    private function ensureValidUri($value) {
        if (strpos($value, ':') === false) {
            throw new NamespaceUriException(
                sprintf("Namespace URI '%s' must contain at least one colon", $value)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            );
        }
    }
}
