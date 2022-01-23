<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\StreamInterface;

/**
 * Stream that when read returns bytes for a streaming multipart or
 * multipart/form-data stream.
<<<<<<< HEAD
 *
 * @final
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 */
class MultipartStream implements StreamInterface
{
    use StreamDecoratorTrait;

    private $boundary;

    /**
     * @param array  $elements Array of associative arrays, each containing a
     *                         required "name" key mapping to the form field,
     *                         name, a required "contents" key mapping to a
     *                         StreamInterface/resource/string, an optional
     *                         "headers" associative array of custom headers,
     *                         and an optional "filename" key mapping to a
     *                         string to send as the filename in the part.
     * @param string $boundary You can optionally provide a specific boundary
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(array $elements = [], $boundary = null)
    {
        $this->boundary = $boundary ?: sha1(uniqid('', true));
        $this->stream = $this->createStream($elements);
    }

    /**
     * Get the boundary
     *
     * @return string
     */
    public function getBoundary()
    {
        return $this->boundary;
    }

    public function isWritable()
    {
        return false;
    }

    /**
     * Get the headers needed before transferring the content of a POST file
     */
    private function getHeaders(array $headers)
    {
        $str = '';
        foreach ($headers as $key => $value) {
            $str .= "{$key}: {$value}\r\n";
        }

        return "--{$this->boundary}\r\n" . trim($str) . "\r\n\r\n";
    }

    /**
     * Create the aggregate stream that will be used to upload the POST data
     */
    protected function createStream(array $elements)
    {
        $stream = new AppendStream();

        foreach ($elements as $element) {
            $this->addElement($stream, $element);
        }

        // Add the trailing boundary with CRLF
<<<<<<< HEAD
        $stream->addStream(Utils::streamFor("--{$this->boundary}--\r\n"));
=======
        $stream->addStream(stream_for("--{$this->boundary}--\r\n"));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        return $stream;
    }

    private function addElement(AppendStream $stream, array $element)
    {
        foreach (['contents', 'name'] as $key) {
            if (!array_key_exists($key, $element)) {
                throw new \InvalidArgumentException("A '{$key}' key is required");
            }
        }

<<<<<<< HEAD
        $element['contents'] = Utils::streamFor($element['contents']);
=======
        $element['contents'] = stream_for($element['contents']);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        if (empty($element['filename'])) {
            $uri = $element['contents']->getMetadata('uri');
            if (substr($uri, 0, 6) !== 'php://') {
                $element['filename'] = $uri;
            }
        }

        list($body, $headers) = $this->createElement(
            $element['name'],
            $element['contents'],
            isset($element['filename']) ? $element['filename'] : null,
            isset($element['headers']) ? $element['headers'] : []
        );

<<<<<<< HEAD
        $stream->addStream(Utils::streamFor($this->getHeaders($headers)));
        $stream->addStream($body);
        $stream->addStream(Utils::streamFor("\r\n"));
=======
        $stream->addStream(stream_for($this->getHeaders($headers)));
        $stream->addStream($body);
        $stream->addStream(stream_for("\r\n"));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }

    /**
     * @return array
     */
    private function createElement($name, StreamInterface $stream, $filename, array $headers)
    {
        // Set a default content-disposition header if one was no provided
        $disposition = $this->getHeader($headers, 'content-disposition');
        if (!$disposition) {
            $headers['Content-Disposition'] = ($filename === '0' || $filename)
<<<<<<< HEAD
                ? sprintf(
                    'form-data; name="%s"; filename="%s"',
                    $name,
                    basename($filename)
                )
=======
                ? sprintf('form-data; name="%s"; filename="%s"',
                    $name,
                    basename($filename))
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                : "form-data; name=\"{$name}\"";
        }

        // Set a default content-length header if one was no provided
        $length = $this->getHeader($headers, 'content-length');
        if (!$length) {
            if ($length = $stream->getSize()) {
                $headers['Content-Length'] = (string) $length;
            }
        }

        // Set a default Content-Type if one was not supplied
        $type = $this->getHeader($headers, 'content-type');
        if (!$type && ($filename === '0' || $filename)) {
<<<<<<< HEAD
            if ($type = MimeType::fromFilename($filename)) {
=======
            if ($type = mimetype_from_filename($filename)) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
                $headers['Content-Type'] = $type;
            }
        }

        return [$stream, $headers];
    }

    private function getHeader(array $headers, $key)
    {
        $lowercaseHeader = strtolower($key);
        foreach ($headers as $k => $v) {
            if (strtolower($k) === $lowercaseHeader) {
                return $v;
            }
        }

        return null;
    }
}
