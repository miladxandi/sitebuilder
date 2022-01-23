<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Lazily reads or writes to a file that is opened only after an IO operation
 * take place on the stream.
<<<<<<< HEAD
 *
 * @final
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */
class LazyOpenStream implements StreamInterface
{
    use StreamDecoratorTrait;

    /** @var string File to open */
    private $filename;

<<<<<<< HEAD
    /** @var string */
=======
    /** @var string $mode */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $mode;

    /**
     * @param string $filename File to lazily open
     * @param string $mode     fopen mode to use when opening the stream
     */
    public function __construct($filename, $mode)
    {
        $this->filename = $filename;
        $this->mode = $mode;
    }

    /**
     * Creates the underlying stream lazily when required.
     *
     * @return StreamInterface
     */
    protected function createStream()
    {
<<<<<<< HEAD
        return Utils::streamFor(Utils::tryFopen($this->filename, $this->mode));
=======
        return stream_for(try_fopen($this->filename, $this->mode));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }
}
