<?php declare(strict_types = 1);
namespace TheSeer\Tokenizer;

use DOMDocument;

class XMLSerializer {

<<<<<<< HEAD
    /** @var \XMLWriter */
    private $writer;

    /** @var Token */
    private $previousToken;

    /** @var NamespaceUri */
=======
    /**
     * @var \XMLWriter
     */
    private $writer;

    /**
     * @var Token
     */
    private $previousToken;

    /**
     * @var NamespaceUri
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $xmlns;

    /**
     * XMLSerializer constructor.
     *
     * @param NamespaceUri $xmlns
     */
    public function __construct(NamespaceUri $xmlns = null) {
        if ($xmlns === null) {
            $xmlns = new NamespaceUri('https://github.com/theseer/tokenizer');
        }
        $this->xmlns = $xmlns;
    }

<<<<<<< HEAD
    public function toDom(TokenCollection $tokens): DOMDocument {
        $dom                     = new DOMDocument();
=======
    /**
     * @param TokenCollection $tokens
     *
     * @return DOMDocument
     */
    public function toDom(TokenCollection $tokens): DOMDocument {
        $dom = new DOMDocument();
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $dom->preserveWhiteSpace = false;
        $dom->loadXML($this->toXML($tokens));

        return $dom;
    }

<<<<<<< HEAD
=======
    /**
     * @param TokenCollection $tokens
     *
     * @return string
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function toXML(TokenCollection $tokens): string {
        $this->writer = new \XMLWriter();
        $this->writer->openMemory();
        $this->writer->setIndent(true);
        $this->writer->startDocument();
        $this->writer->startElement('source');
        $this->writer->writeAttribute('xmlns', $this->xmlns->asString());
<<<<<<< HEAD

        if (\count($tokens) > 0) {
            $this->writer->startElement('line');
            $this->writer->writeAttribute('no', '1');

            $this->previousToken = $tokens[0];

            foreach ($tokens as $token) {
                $this->addToken($token);
            }
=======
        $this->writer->startElement('line');
        $this->writer->writeAttribute('no', '1');

        $this->previousToken = $tokens[0];
        foreach ($tokens as $token) {
            $this->addToken($token);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }

        $this->writer->endElement();
        $this->writer->endElement();
        $this->writer->endDocument();

        return $this->writer->outputMemory();
    }

<<<<<<< HEAD
    private function addToken(Token $token): void {
=======
    /**
     * @param Token $token
     */
    private function addToken(Token $token) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        if ($this->previousToken->getLine() < $token->getLine()) {
            $this->writer->endElement();

            $this->writer->startElement('line');
            $this->writer->writeAttribute('no', (string)$token->getLine());
            $this->previousToken = $token;
        }

        if ($token->getValue() !== '') {
            $this->writer->startElement('token');
            $this->writer->writeAttribute('name', $token->getName());
<<<<<<< HEAD
            $this->writer->writeRaw(\htmlspecialchars($token->getValue(), \ENT_NOQUOTES | \ENT_DISALLOWED | \ENT_XML1));
=======
            $this->writer->writeRaw(htmlspecialchars($token->getValue(), ENT_NOQUOTES | ENT_DISALLOWED | ENT_XML1));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            $this->writer->endElement();
        }
    }
}
