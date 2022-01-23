<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Psr7;

use Psr\Http\Message\MessageInterface;
use Psr\Http\Message\RequestInterface;
<<<<<<< HEAD
=======
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * Returns the string representation of an HTTP message.
 *
 * @param MessageInterface $message Message to convert to a string.
 *
 * @return string
<<<<<<< HEAD
 *
 * @deprecated str will be removed in guzzlehttp/psr7:2.0. Use Message::toString instead.
 */
function str(MessageInterface $message)
{
    return Message::toString($message);
=======
 */
function str(MessageInterface $message)
{
    if ($message instanceof RequestInterface) {
        $msg = trim($message->getMethod() . ' '
                . $message->getRequestTarget())
            . ' HTTP/' . $message->getProtocolVersion();
        if (!$message->hasHeader('host')) {
            $msg .= "\r\nHost: " . $message->getUri()->getHost();
        }
    } elseif ($message instanceof ResponseInterface) {
        $msg = 'HTTP/' . $message->getProtocolVersion() . ' '
            . $message->getStatusCode() . ' '
            . $message->getReasonPhrase();
    } else {
        throw new \InvalidArgumentException('Unknown message type');
    }

    foreach ($message->getHeaders() as $name => $values) {
        $msg .= "\r\n{$name}: " . implode(', ', $values);
    }

    return "{$msg}\r\n\r\n" . $message->getBody();
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Returns a UriInterface for the given value.
 *
<<<<<<< HEAD
 * This function accepts a string or UriInterface and returns a
 * UriInterface for the given value. If the value is already a
 * UriInterface, it is returned as-is.
=======
 * This function accepts a string or {@see Psr\Http\Message\UriInterface} and
 * returns a UriInterface for the given value. If the value is already a
 * `UriInterface`, it is returned as-is.
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 *
 * @param string|UriInterface $uri
 *
 * @return UriInterface
<<<<<<< HEAD
 *
 * @throws \InvalidArgumentException
 *
 * @deprecated uri_for will be removed in guzzlehttp/psr7:2.0. Use Utils::uriFor instead.
 */
function uri_for($uri)
{
    return Utils::uriFor($uri);
=======
 * @throws \InvalidArgumentException
 */
function uri_for($uri)
{
    if ($uri instanceof UriInterface) {
        return $uri;
    } elseif (is_string($uri)) {
        return new Uri($uri);
    }

    throw new \InvalidArgumentException('URI must be a string or UriInterface');
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Create a new stream based on the input type.
 *
 * Options is an associative array that can contain the following keys:
 * - metadata: Array of custom metadata.
 * - size: Size of the stream.
 *
<<<<<<< HEAD
 * This method accepts the following `$resource` types:
 * - `Psr\Http\Message\StreamInterface`: Returns the value as-is.
 * - `string`: Creates a stream object that uses the given string as the contents.
 * - `resource`: Creates a stream object that wraps the given PHP stream resource.
 * - `Iterator`: If the provided value implements `Iterator`, then a read-only
 *   stream object will be created that wraps the given iterable. Each time the
 *   stream is read from, data from the iterator will fill a buffer and will be
 *   continuously called until the buffer is equal to the requested read size.
 *   Subsequent read calls will first read from the buffer and then call `next`
 *   on the underlying iterator until it is exhausted.
 * - `object` with `__toString()`: If the object has the `__toString()` method,
 *   the object will be cast to a string and then a stream will be returned that
 *   uses the string value.
 * - `NULL`: When `null` is passed, an empty stream object is returned.
 * - `callable` When a callable is passed, a read-only stream object will be
 *   created that invokes the given callable. The callable is invoked with the
 *   number of suggested bytes to read. The callable can return any number of
 *   bytes, but MUST return `false` when there is no more data to return. The
 *   stream object that wraps the callable will invoke the callable until the
 *   number of requested bytes are available. Any additional bytes will be
 *   buffered and used in subsequent reads.
 *
 * @param resource|string|int|float|bool|StreamInterface|callable|\Iterator|null $resource Entity body data
 * @param array                                                                  $options  Additional options
 *
 * @return StreamInterface
 *
 * @throws \InvalidArgumentException if the $resource arg is not valid.
 *
 * @deprecated stream_for will be removed in guzzlehttp/psr7:2.0. Use Utils::streamFor instead.
 */
function stream_for($resource = '', array $options = [])
{
    return Utils::streamFor($resource, $options);
=======
 * @param resource|string|null|int|float|bool|StreamInterface|callable|\Iterator $resource Entity body data
 * @param array                                                                  $options  Additional options
 *
 * @return StreamInterface
 * @throws \InvalidArgumentException if the $resource arg is not valid.
 */
function stream_for($resource = '', array $options = [])
{
    if (is_scalar($resource)) {
        $stream = fopen('php://temp', 'r+');
        if ($resource !== '') {
            fwrite($stream, $resource);
            fseek($stream, 0);
        }
        return new Stream($stream, $options);
    }

    switch (gettype($resource)) {
        case 'resource':
            return new Stream($resource, $options);
        case 'object':
            if ($resource instanceof StreamInterface) {
                return $resource;
            } elseif ($resource instanceof \Iterator) {
                return new PumpStream(function () use ($resource) {
                    if (!$resource->valid()) {
                        return false;
                    }
                    $result = $resource->current();
                    $resource->next();
                    return $result;
                }, $options);
            } elseif (method_exists($resource, '__toString')) {
                return stream_for((string) $resource, $options);
            }
            break;
        case 'NULL':
            return new Stream(fopen('php://temp', 'r+'), $options);
    }

    if (is_callable($resource)) {
        return new PumpStream($resource, $options);
    }

    throw new \InvalidArgumentException('Invalid resource type: ' . gettype($resource));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Parse an array of header values containing ";" separated data into an
<<<<<<< HEAD
 * array of associative arrays representing the header key value pair data
 * of the header. When a parameter does not contain a value, but just
=======
 * array of associative arrays representing the header key value pair
 * data of the header. When a parameter does not contain a value, but just
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * contains a key, this function will inject a key with a '' string value.
 *
 * @param string|array $header Header to parse into components.
 *
 * @return array Returns the parsed header values.
<<<<<<< HEAD
 *
 * @deprecated parse_header will be removed in guzzlehttp/psr7:2.0. Use Header::parse instead.
 */
function parse_header($header)
{
    return Header::parse($header);
=======
 */
function parse_header($header)
{
    static $trimmed = "\"'  \n\t\r";
    $params = $matches = [];

    foreach (normalize_header($header) as $val) {
        $part = [];
        foreach (preg_split('/;(?=([^"]*"[^"]*")*[^"]*$)/', $val) as $kvp) {
            if (preg_match_all('/<[^>]+>|[^=]+/', $kvp, $matches)) {
                $m = $matches[0];
                if (isset($m[1])) {
                    $part[trim($m[0], $trimmed)] = trim($m[1], $trimmed);
                } else {
                    $part[] = trim($m[0], $trimmed);
                }
            }
        }
        if ($part) {
            $params[] = $part;
        }
    }

    return $params;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Converts an array of header values that may contain comma separated
 * headers into an array of headers with no comma separated values.
 *
 * @param string|array $header Header to normalize.
 *
 * @return array Returns the normalized header field values.
<<<<<<< HEAD
 *
 * @deprecated normalize_header will be removed in guzzlehttp/psr7:2.0. Use Header::normalize instead.
 */
function normalize_header($header)
{
    return Header::normalize($header);
=======
 */
function normalize_header($header)
{
    if (!is_array($header)) {
        return array_map('trim', explode(',', $header));
    }

    $result = [];
    foreach ($header as $value) {
        foreach ((array) $value as $v) {
            if (strpos($v, ',') === false) {
                $result[] = $v;
                continue;
            }
            foreach (preg_split('/,(?=([^"]*"[^"]*")*[^"]*$)/', $v) as $vv) {
                $result[] = trim($vv);
            }
        }
    }

    return $result;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Clone and modify a request with the given changes.
 *
<<<<<<< HEAD
 * This method is useful for reducing the number of clones needed to mutate a
 * message.
 *
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * The changes can be one of:
 * - method: (string) Changes the HTTP method.
 * - set_headers: (array) Sets the given headers.
 * - remove_headers: (array) Remove the given headers.
 * - body: (mixed) Sets the given body.
 * - uri: (UriInterface) Set the URI.
 * - query: (string) Set the query string value of the URI.
 * - version: (string) Set the protocol version.
 *
 * @param RequestInterface $request Request to clone and modify.
 * @param array            $changes Changes to apply.
 *
 * @return RequestInterface
<<<<<<< HEAD
 *
 * @deprecated modify_request will be removed in guzzlehttp/psr7:2.0. Use Utils::modifyRequest instead.
 */
function modify_request(RequestInterface $request, array $changes)
{
    return Utils::modifyRequest($request, $changes);
=======
 */
function modify_request(RequestInterface $request, array $changes)
{
    if (!$changes) {
        return $request;
    }

    $headers = $request->getHeaders();

    if (!isset($changes['uri'])) {
        $uri = $request->getUri();
    } else {
        // Remove the host header if one is on the URI
        if ($host = $changes['uri']->getHost()) {
            $changes['set_headers']['Host'] = $host;

            if ($port = $changes['uri']->getPort()) {
                $standardPorts = ['http' => 80, 'https' => 443];
                $scheme = $changes['uri']->getScheme();
                if (isset($standardPorts[$scheme]) && $port != $standardPorts[$scheme]) {
                    $changes['set_headers']['Host'] .= ':'.$port;
                }
            }
        }
        $uri = $changes['uri'];
    }

    if (!empty($changes['remove_headers'])) {
        $headers = _caseless_remove($changes['remove_headers'], $headers);
    }

    if (!empty($changes['set_headers'])) {
        $headers = _caseless_remove(array_keys($changes['set_headers']), $headers);
        $headers = $changes['set_headers'] + $headers;
    }

    if (isset($changes['query'])) {
        $uri = $uri->withQuery($changes['query']);
    }

    if ($request instanceof ServerRequestInterface) {
        return (new ServerRequest(
            isset($changes['method']) ? $changes['method'] : $request->getMethod(),
            $uri,
            $headers,
            isset($changes['body']) ? $changes['body'] : $request->getBody(),
            isset($changes['version'])
                ? $changes['version']
                : $request->getProtocolVersion(),
            $request->getServerParams()
        ))
        ->withParsedBody($request->getParsedBody())
        ->withQueryParams($request->getQueryParams())
        ->withCookieParams($request->getCookieParams())
        ->withUploadedFiles($request->getUploadedFiles());
    }

    return new Request(
        isset($changes['method']) ? $changes['method'] : $request->getMethod(),
        $uri,
        $headers,
        isset($changes['body']) ? $changes['body'] : $request->getBody(),
        isset($changes['version'])
            ? $changes['version']
            : $request->getProtocolVersion()
    );
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Attempts to rewind a message body and throws an exception on failure.
 *
 * The body of the message will only be rewound if a call to `tell()` returns a
 * value other than `0`.
 *
 * @param MessageInterface $message Message to rewind
 *
 * @throws \RuntimeException
<<<<<<< HEAD
 *
 * @deprecated rewind_body will be removed in guzzlehttp/psr7:2.0. Use Message::rewindBody instead.
 */
function rewind_body(MessageInterface $message)
{
    Message::rewindBody($message);
=======
 */
function rewind_body(MessageInterface $message)
{
    $body = $message->getBody();

    if ($body->tell()) {
        $body->rewind();
    }
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Safely opens a PHP stream resource using a filename.
 *
 * When fopen fails, PHP normally raises a warning. This function adds an
 * error handler that checks for errors and throws an exception instead.
 *
 * @param string $filename File to open
 * @param string $mode     Mode used to open the file
 *
 * @return resource
<<<<<<< HEAD
 *
 * @throws \RuntimeException if the file cannot be opened
 *
 * @deprecated try_fopen will be removed in guzzlehttp/psr7:2.0. Use Utils::tryFopen instead.
 */
function try_fopen($filename, $mode)
{
    return Utils::tryFopen($filename, $mode);
=======
 * @throws \RuntimeException if the file cannot be opened
 */
function try_fopen($filename, $mode)
{
    $ex = null;
    set_error_handler(function () use ($filename, $mode, &$ex) {
        $ex = new \RuntimeException(sprintf(
            'Unable to open %s using mode %s: %s',
            $filename,
            $mode,
            func_get_args()[1]
        ));
    });

    $handle = fopen($filename, $mode);
    restore_error_handler();

    if ($ex) {
        /** @var $ex \RuntimeException */
        throw $ex;
    }

    return $handle;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Copy the contents of a stream into a string until the given number of
 * bytes have been read.
 *
 * @param StreamInterface $stream Stream to read
 * @param int             $maxLen Maximum number of bytes to read. Pass -1
 *                                to read the entire stream.
<<<<<<< HEAD
 *
 * @return string
 *
 * @throws \RuntimeException on error.
 *
 * @deprecated copy_to_string will be removed in guzzlehttp/psr7:2.0. Use Utils::copyToString instead.
 */
function copy_to_string(StreamInterface $stream, $maxLen = -1)
{
    return Utils::copyToString($stream, $maxLen);
=======
 * @return string
 * @throws \RuntimeException on error.
 */
function copy_to_string(StreamInterface $stream, $maxLen = -1)
{
    $buffer = '';

    if ($maxLen === -1) {
        while (!$stream->eof()) {
            $buf = $stream->read(1048576);
            // Using a loose equality here to match on '' and false.
            if ($buf == null) {
                break;
            }
            $buffer .= $buf;
        }
        return $buffer;
    }

    $len = 0;
    while (!$stream->eof() && $len < $maxLen) {
        $buf = $stream->read($maxLen - $len);
        // Using a loose equality here to match on '' and false.
        if ($buf == null) {
            break;
        }
        $buffer .= $buf;
        $len = strlen($buffer);
    }

    return $buffer;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Copy the contents of a stream into another stream until the given number
 * of bytes have been read.
 *
 * @param StreamInterface $source Stream to read from
 * @param StreamInterface $dest   Stream to write to
 * @param int             $maxLen Maximum number of bytes to read. Pass -1
 *                                to read the entire stream.
 *
 * @throws \RuntimeException on error.
<<<<<<< HEAD
 *
 * @deprecated copy_to_stream will be removed in guzzlehttp/psr7:2.0. Use Utils::copyToStream instead.
 */
function copy_to_stream(StreamInterface $source, StreamInterface $dest, $maxLen = -1)
{
    return Utils::copyToStream($source, $dest, $maxLen);
}

/**
 * Calculate a hash of a stream.
 *
 * This method reads the entire stream to calculate a rolling hash, based on
 * PHP's `hash_init` functions.
=======
 */
function copy_to_stream(
    StreamInterface $source,
    StreamInterface $dest,
    $maxLen = -1
) {
    $bufferSize = 8192;

    if ($maxLen === -1) {
        while (!$source->eof()) {
            if (!$dest->write($source->read($bufferSize))) {
                break;
            }
        }
    } else {
        $remaining = $maxLen;
        while ($remaining > 0 && !$source->eof()) {
            $buf = $source->read(min($bufferSize, $remaining));
            $len = strlen($buf);
            if (!$len) {
                break;
            }
            $remaining -= $len;
            $dest->write($buf);
        }
    }
}

/**
 * Calculate a hash of a Stream
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 *
 * @param StreamInterface $stream    Stream to calculate the hash for
 * @param string          $algo      Hash algorithm (e.g. md5, crc32, etc)
 * @param bool            $rawOutput Whether or not to use raw output
 *
 * @return string Returns the hash of the stream
<<<<<<< HEAD
 *
 * @throws \RuntimeException on error.
 *
 * @deprecated hash will be removed in guzzlehttp/psr7:2.0. Use Utils::hash instead.
 */
function hash(StreamInterface $stream, $algo, $rawOutput = false)
{
    return Utils::hash($stream, $algo, $rawOutput);
}

/**
 * Read a line from the stream up to the maximum allowed buffer length.
 *
 * @param StreamInterface $stream    Stream to read from
 * @param int|null        $maxLength Maximum buffer length
 *
 * @return string
 *
 * @deprecated readline will be removed in guzzlehttp/psr7:2.0. Use Utils::readLine instead.
 */
function readline(StreamInterface $stream, $maxLength = null)
{
    return Utils::readLine($stream, $maxLength);
=======
 * @throws \RuntimeException on error.
 */
function hash(
    StreamInterface $stream,
    $algo,
    $rawOutput = false
) {
    $pos = $stream->tell();

    if ($pos > 0) {
        $stream->rewind();
    }

    $ctx = hash_init($algo);
    while (!$stream->eof()) {
        hash_update($ctx, $stream->read(1048576));
    }

    $out = hash_final($ctx, (bool) $rawOutput);
    $stream->seek($pos);

    return $out;
}

/**
 * Read a line from the stream up to the maximum allowed buffer length
 *
 * @param StreamInterface $stream    Stream to read from
 * @param int             $maxLength Maximum buffer length
 *
 * @return string
 */
function readline(StreamInterface $stream, $maxLength = null)
{
    $buffer = '';
    $size = 0;

    while (!$stream->eof()) {
        // Using a loose equality here to match on '' and false.
        if (null == ($byte = $stream->read(1))) {
            return $buffer;
        }
        $buffer .= $byte;
        // Break when a new line is found or the max length - 1 is reached
        if ($byte === "\n" || ++$size === $maxLength - 1) {
            break;
        }
    }

    return $buffer;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Parses a request message string into a request object.
 *
 * @param string $message Request message string.
 *
 * @return Request
<<<<<<< HEAD
 *
 * @deprecated parse_request will be removed in guzzlehttp/psr7:2.0. Use Message::parseRequest instead.
 */
function parse_request($message)
{
    return Message::parseRequest($message);
=======
 */
function parse_request($message)
{
    $data = _parse_message($message);
    $matches = [];
    if (!preg_match('/^[\S]+\s+([a-zA-Z]+:\/\/|\/).*/', $data['start-line'], $matches)) {
        throw new \InvalidArgumentException('Invalid request string');
    }
    $parts = explode(' ', $data['start-line'], 3);
    $version = isset($parts[2]) ? explode('/', $parts[2])[1] : '1.1';

    $request = new Request(
        $parts[0],
        $matches[1] === '/' ? _parse_request_uri($parts[1], $data['headers']) : $parts[1],
        $data['headers'],
        $data['body'],
        $version
    );

    return $matches[1] === '/' ? $request : $request->withRequestTarget($parts[1]);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Parses a response message string into a response object.
 *
 * @param string $message Response message string.
 *
 * @return Response
<<<<<<< HEAD
 *
 * @deprecated parse_response will be removed in guzzlehttp/psr7:2.0. Use Message::parseResponse instead.
 */
function parse_response($message)
{
    return Message::parseResponse($message);
=======
 */
function parse_response($message)
{
    $data = _parse_message($message);
    // According to https://tools.ietf.org/html/rfc7230#section-3.1.2 the space
    // between status-code and reason-phrase is required. But browsers accept
    // responses without space and reason as well.
    if (!preg_match('/^HTTP\/.* [0-9]{3}( .*|$)/', $data['start-line'])) {
        throw new \InvalidArgumentException('Invalid response string: ' . $data['start-line']);
    }
    $parts = explode(' ', $data['start-line'], 3);

    return new Response(
        $parts[1],
        $data['headers'],
        $data['body'],
        explode('/', $parts[0])[1],
        isset($parts[2]) ? $parts[2] : null
    );
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Parse a query string into an associative array.
 *
<<<<<<< HEAD
 * If multiple values are found for the same key, the value of that key value
 * pair will become an array. This function does not parse nested PHP style
 * arrays into an associative array (e.g., `foo[a]=1&foo[b]=2` will be parsed
 * into `['foo[a]' => '1', 'foo[b]' => '2'])`.
=======
 * If multiple values are found for the same key, the value of that key
 * value pair will become an array. This function does not parse nested
 * PHP style arrays into an associative array (e.g., foo[a]=1&foo[b]=2 will
 * be parsed into ['foo[a]' => '1', 'foo[b]' => '2']).
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 *
 * @param string   $str         Query string to parse
 * @param int|bool $urlEncoding How the query string is encoded
 *
 * @return array
<<<<<<< HEAD
 *
 * @deprecated parse_query will be removed in guzzlehttp/psr7:2.0. Use Query::parse instead.
 */
function parse_query($str, $urlEncoding = true)
{
    return Query::parse($str, $urlEncoding);
=======
 */
function parse_query($str, $urlEncoding = true)
{
    $result = [];

    if ($str === '') {
        return $result;
    }

    if ($urlEncoding === true) {
        $decoder = function ($value) {
            return rawurldecode(str_replace('+', ' ', $value));
        };
    } elseif ($urlEncoding === PHP_QUERY_RFC3986) {
        $decoder = 'rawurldecode';
    } elseif ($urlEncoding === PHP_QUERY_RFC1738) {
        $decoder = 'urldecode';
    } else {
        $decoder = function ($str) { return $str; };
    }

    foreach (explode('&', $str) as $kvp) {
        $parts = explode('=', $kvp, 2);
        $key = $decoder($parts[0]);
        $value = isset($parts[1]) ? $decoder($parts[1]) : null;
        if (!isset($result[$key])) {
            $result[$key] = $value;
        } else {
            if (!is_array($result[$key])) {
                $result[$key] = [$result[$key]];
            }
            $result[$key][] = $value;
        }
    }

    return $result;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Build a query string from an array of key value pairs.
 *
<<<<<<< HEAD
 * This function can use the return value of `parse_query()` to build a query
 * string. This function does not modify the provided keys when an array is
 * encountered (like `http_build_query()` would).
=======
 * This function can use the return value of parse_query() to build a query
 * string. This function does not modify the provided keys when an array is
 * encountered (like http_build_query would).
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 *
 * @param array     $params   Query string parameters.
 * @param int|false $encoding Set to false to not encode, PHP_QUERY_RFC3986
 *                            to encode using RFC3986, or PHP_QUERY_RFC1738
 *                            to encode using RFC1738.
<<<<<<< HEAD
 *
 * @return string
 *
 * @deprecated build_query will be removed in guzzlehttp/psr7:2.0. Use Query::build instead.
 */
function build_query(array $params, $encoding = PHP_QUERY_RFC3986)
{
    return Query::build($params, $encoding);
=======
 * @return string
 */
function build_query(array $params, $encoding = PHP_QUERY_RFC3986)
{
    if (!$params) {
        return '';
    }

    if ($encoding === false) {
        $encoder = function ($str) { return $str; };
    } elseif ($encoding === PHP_QUERY_RFC3986) {
        $encoder = 'rawurlencode';
    } elseif ($encoding === PHP_QUERY_RFC1738) {
        $encoder = 'urlencode';
    } else {
        throw new \InvalidArgumentException('Invalid type');
    }

    $qs = '';
    foreach ($params as $k => $v) {
        $k = $encoder($k);
        if (!is_array($v)) {
            $qs .= $k;
            if ($v !== null) {
                $qs .= '=' . $encoder($v);
            }
            $qs .= '&';
        } else {
            foreach ($v as $vv) {
                $qs .= $k;
                if ($vv !== null) {
                    $qs .= '=' . $encoder($vv);
                }
                $qs .= '&';
            }
        }
    }

    return $qs ? (string) substr($qs, 0, -1) : '';
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Determines the mimetype of a file by looking at its extension.
 *
<<<<<<< HEAD
 * @param string $filename
 *
 * @return string|null
 *
 * @deprecated mimetype_from_filename will be removed in guzzlehttp/psr7:2.0. Use MimeType::fromFilename instead.
 */
function mimetype_from_filename($filename)
{
    return MimeType::fromFilename($filename);
=======
 * @param $filename
 *
 * @return null|string
 */
function mimetype_from_filename($filename)
{
    return mimetype_from_extension(pathinfo($filename, PATHINFO_EXTENSION));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Maps a file extensions to a mimetype.
 *
 * @param $extension string The file extension.
 *
 * @return string|null
<<<<<<< HEAD
 *
 * @link http://svn.apache.org/repos/asf/httpd/httpd/branches/1.3.x/conf/mime.types
 * @deprecated mimetype_from_extension will be removed in guzzlehttp/psr7:2.0. Use MimeType::fromExtension instead.
 */
function mimetype_from_extension($extension)
{
    return MimeType::fromExtension($extension);
=======
 * @link http://svn.apache.org/repos/asf/httpd/httpd/branches/1.3.x/conf/mime.types
 */
function mimetype_from_extension($extension)
{
    static $mimetypes = [
        '3gp' => 'video/3gpp',
        '7z' => 'application/x-7z-compressed',
        'aac' => 'audio/x-aac',
        'ai' => 'application/postscript',
        'aif' => 'audio/x-aiff',
        'asc' => 'text/plain',
        'asf' => 'video/x-ms-asf',
        'atom' => 'application/atom+xml',
        'avi' => 'video/x-msvideo',
        'bmp' => 'image/bmp',
        'bz2' => 'application/x-bzip2',
        'cer' => 'application/pkix-cert',
        'crl' => 'application/pkix-crl',
        'crt' => 'application/x-x509-ca-cert',
        'css' => 'text/css',
        'csv' => 'text/csv',
        'cu' => 'application/cu-seeme',
        'deb' => 'application/x-debian-package',
        'doc' => 'application/msword',
        'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        'dvi' => 'application/x-dvi',
        'eot' => 'application/vnd.ms-fontobject',
        'eps' => 'application/postscript',
        'epub' => 'application/epub+zip',
        'etx' => 'text/x-setext',
        'flac' => 'audio/flac',
        'flv' => 'video/x-flv',
        'gif' => 'image/gif',
        'gz' => 'application/gzip',
        'htm' => 'text/html',
        'html' => 'text/html',
        'ico' => 'image/x-icon',
        'ics' => 'text/calendar',
        'ini' => 'text/plain',
        'iso' => 'application/x-iso9660-image',
        'jar' => 'application/java-archive',
        'jpe' => 'image/jpeg',
        'jpeg' => 'image/jpeg',
        'jpg' => 'image/jpeg',
        'js' => 'text/javascript',
        'json' => 'application/json',
        'latex' => 'application/x-latex',
        'log' => 'text/plain',
        'm4a' => 'audio/mp4',
        'm4v' => 'video/mp4',
        'mid' => 'audio/midi',
        'midi' => 'audio/midi',
        'mov' => 'video/quicktime',
        'mkv' => 'video/x-matroska',
        'mp3' => 'audio/mpeg',
        'mp4' => 'video/mp4',
        'mp4a' => 'audio/mp4',
        'mp4v' => 'video/mp4',
        'mpe' => 'video/mpeg',
        'mpeg' => 'video/mpeg',
        'mpg' => 'video/mpeg',
        'mpg4' => 'video/mp4',
        'oga' => 'audio/ogg',
        'ogg' => 'audio/ogg',
        'ogv' => 'video/ogg',
        'ogx' => 'application/ogg',
        'pbm' => 'image/x-portable-bitmap',
        'pdf' => 'application/pdf',
        'pgm' => 'image/x-portable-graymap',
        'png' => 'image/png',
        'pnm' => 'image/x-portable-anymap',
        'ppm' => 'image/x-portable-pixmap',
        'ppt' => 'application/vnd.ms-powerpoint',
        'pptx' => 'application/vnd.openxmlformats-officedocument.presentationml.presentation',
        'ps' => 'application/postscript',
        'qt' => 'video/quicktime',
        'rar' => 'application/x-rar-compressed',
        'ras' => 'image/x-cmu-raster',
        'rss' => 'application/rss+xml',
        'rtf' => 'application/rtf',
        'sgm' => 'text/sgml',
        'sgml' => 'text/sgml',
        'svg' => 'image/svg+xml',
        'swf' => 'application/x-shockwave-flash',
        'tar' => 'application/x-tar',
        'tif' => 'image/tiff',
        'tiff' => 'image/tiff',
        'torrent' => 'application/x-bittorrent',
        'ttf' => 'application/x-font-ttf',
        'txt' => 'text/plain',
        'wav' => 'audio/x-wav',
        'webm' => 'video/webm',
        'wma' => 'audio/x-ms-wma',
        'wmv' => 'video/x-ms-wmv',
        'woff' => 'application/x-font-woff',
        'wsdl' => 'application/wsdl+xml',
        'xbm' => 'image/x-xbitmap',
        'xls' => 'application/vnd.ms-excel',
        'xlsx' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'xml' => 'application/xml',
        'xpm' => 'image/x-xpixmap',
        'xwd' => 'image/x-xwindowdump',
        'yaml' => 'text/yaml',
        'yml' => 'text/yaml',
        'zip' => 'application/zip',
    ];

    $extension = strtolower($extension);

    return isset($mimetypes[$extension])
        ? $mimetypes[$extension]
        : null;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Parses an HTTP message into an associative array.
 *
 * The array contains the "start-line" key containing the start line of
 * the message, "headers" key containing an associative array of header
 * array values, and a "body" key containing the body of the message.
 *
 * @param string $message HTTP request or response to parse.
 *
 * @return array
<<<<<<< HEAD
 *
 * @internal
 *
 * @deprecated _parse_message will be removed in guzzlehttp/psr7:2.0. Use Message::parseMessage instead.
 */
function _parse_message($message)
{
    return Message::parseMessage($message);
=======
 * @internal
 */
function _parse_message($message)
{
    if (!$message) {
        throw new \InvalidArgumentException('Invalid message');
    }

    $message = ltrim($message, "\r\n");

    $messageParts = preg_split("/\r?\n\r?\n/", $message, 2);

    if ($messageParts === false || count($messageParts) !== 2) {
        throw new \InvalidArgumentException('Invalid message: Missing header delimiter');
    }

    list($rawHeaders, $body) = $messageParts;
    $rawHeaders .= "\r\n"; // Put back the delimiter we split previously
    $headerParts = preg_split("/\r?\n/", $rawHeaders, 2);

    if ($headerParts === false || count($headerParts) !== 2) {
        throw new \InvalidArgumentException('Invalid message: Missing status line');
    }

    list($startLine, $rawHeaders) = $headerParts;

    if (preg_match("/(?:^HTTP\/|^[A-Z]+ \S+ HTTP\/)(\d+(?:\.\d+)?)/i", $startLine, $matches) && $matches[1] === '1.0') {
        // Header folding is deprecated for HTTP/1.1, but allowed in HTTP/1.0
        $rawHeaders = preg_replace(Rfc7230::HEADER_FOLD_REGEX, ' ', $rawHeaders);
    }

    /** @var array[] $headerLines */
    $count = preg_match_all(Rfc7230::HEADER_REGEX, $rawHeaders, $headerLines, PREG_SET_ORDER);

    // If these aren't the same, then one line didn't match and there's an invalid header.
    if ($count !== substr_count($rawHeaders, "\n")) {
        // Folding is deprecated, see https://tools.ietf.org/html/rfc7230#section-3.2.4
        if (preg_match(Rfc7230::HEADER_FOLD_REGEX, $rawHeaders)) {
            throw new \InvalidArgumentException('Invalid header syntax: Obsolete line folding');
        }

        throw new \InvalidArgumentException('Invalid header syntax');
    }

    $headers = [];

    foreach ($headerLines as $headerLine) {
        $headers[$headerLine[1]][] = $headerLine[2];
    }

    return [
        'start-line' => $startLine,
        'headers' => $headers,
        'body' => $body,
    ];
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}

/**
 * Constructs a URI for an HTTP request message.
 *
 * @param string $path    Path from the start-line
 * @param array  $headers Array of headers (each value an array).
 *
 * @return string
<<<<<<< HEAD
 *
 * @internal
 *
 * @deprecated _parse_request_uri will be removed in guzzlehttp/psr7:2.0. Use Message::parseRequestUri instead.
 */
function _parse_request_uri($path, array $headers)
{
    return Message::parseRequestUri($path, $headers);
}

/**
 * Get a short summary of the message body.
=======
 * @internal
 */
function _parse_request_uri($path, array $headers)
{
    $hostKey = array_filter(array_keys($headers), function ($k) {
        return strtolower($k) === 'host';
    });

    // If no host is found, then a full URI cannot be constructed.
    if (!$hostKey) {
        return $path;
    }

    $host = $headers[reset($hostKey)][0];
    $scheme = substr($host, -4) === ':443' ? 'https' : 'http';

    return $scheme . '://' . $host . '/' . ltrim($path, '/');
}

/**
 * Get a short summary of the message body
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 *
 * Will return `null` if the response is not printable.
 *
 * @param MessageInterface $message    The message to get the body summary
 * @param int              $truncateAt The maximum allowed size of the summary
 *
<<<<<<< HEAD
 * @return string|null
 *
 * @deprecated get_message_body_summary will be removed in guzzlehttp/psr7:2.0. Use Message::bodySummary instead.
 */
function get_message_body_summary(MessageInterface $message, $truncateAt = 120)
{
    return Message::bodySummary($message, $truncateAt);
}

/**
 * Remove the items given by the keys, case insensitively from the data.
 *
 * @param iterable<string> $keys
 *
 * @return array
 *
 * @internal
 *
 * @deprecated _caseless_remove will be removed in guzzlehttp/psr7:2.0. Use Utils::caselessRemove instead.
 */
function _caseless_remove($keys, array $data)
{
    return Utils::caselessRemove($keys, $data);
=======
 * @return null|string
 */
function get_message_body_summary(MessageInterface $message, $truncateAt = 120)
{
    $body = $message->getBody();

    if (!$body->isSeekable() || !$body->isReadable()) {
        return null;
    }

    $size = $body->getSize();

    if ($size === 0) {
        return null;
    }

    $summary = $body->read($truncateAt);
    $body->rewind();

    if ($size > $truncateAt) {
        $summary .= ' (truncated...)';
    }

    // Matches any printable character, including unicode characters:
    // letters, marks, numbers, punctuation, spacing, and separators.
    if (preg_match('/[^\pL\pM\pN\pP\pS\pZ\n\r\t]/', $summary)) {
        return null;
    }

    return $summary;
}

/** @internal */
function _caseless_remove($keys, array $data)
{
    $result = [];

    foreach ($keys as &$key) {
        $key = strtolower($key);
    }

    foreach ($data as $k => $v) {
        if (!in_array(strtolower($k), $keys)) {
            $result[$k] = $v;
        }
    }

    return $result;
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
