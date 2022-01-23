<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;

/**
<<<<<<< HEAD
 * Stream decorator that prevents a stream from being seeked.
 *
 * @final
=======
 * Stream decorator that prevents a stream from being seeked
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */
class NoSeekStream implements StreamInterface
{
    use StreamDecoratorTrait;

    public function seek($offset, $whence = SEEK_SET)
    {
        throw new \RuntimeException('Cannot seek a NoSeekStream');
    }

    public function isSeekable()
    {
        return false;
    }
}
