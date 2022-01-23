<?php declare(strict_types = 1);
namespace TheSeer\Tokenizer;

class Token {

<<<<<<< HEAD
    /** @var int */
    private $line;

    /** @var string */
    private $name;

    /** @var string */
=======
    /**
     * @var int
     */
    private $line;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $value;

    /**
     * Token constructor.
<<<<<<< HEAD
=======
     *
     * @param int    $line
     * @param string $name
     * @param string $value
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    public function __construct(int $line, string $name, string $value) {
        $this->line  = $line;
        $this->name  = $name;
        $this->value = $value;
    }

<<<<<<< HEAD
=======
    /**
     * @return int
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function getLine(): int {
        return $this->line;
    }

<<<<<<< HEAD
=======
    /**
     * @return string
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function getName(): string {
        return $this->name;
    }

<<<<<<< HEAD
    public function getValue(): string {
        return $this->value;
    }
=======
    /**
     * @return string
     */
    public function getValue(): string {
        return $this->value;
    }

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
