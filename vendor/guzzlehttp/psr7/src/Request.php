<?php
<<<<<<< HEAD

=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
namespace GuzzleHttp\Psr7;

use InvalidArgumentException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\StreamInterface;
use Psr\Http\Message\UriInterface;

/**
 * PSR-7 request implementation.
 */
class Request implements RequestInterface
{
    use MessageTrait;

    /** @var string */
    private $method;

<<<<<<< HEAD
    /** @var string|null */
=======
    /** @var null|string */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    private $requestTarget;

    /** @var UriInterface */
    private $uri;

    /**
     * @param string                               $method  HTTP method
     * @param string|UriInterface                  $uri     URI
     * @param array                                $headers Request headers
<<<<<<< HEAD
     * @param string|resource|StreamInterface|null $body    Request body
=======
     * @param string|null|resource|StreamInterface $body    Request body
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     * @param string                               $version Protocol version
     */
    public function __construct(
        $method,
        $uri,
        array $headers = [],
        $body = null,
        $version = '1.1'
    ) {
<<<<<<< HEAD
        $this->assertMethod($method);
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        if (!($uri instanceof UriInterface)) {
            $uri = new Uri($uri);
        }

        $this->method = strtoupper($method);
        $this->uri = $uri;
        $this->setHeaders($headers);
        $this->protocol = $version;

        if (!isset($this->headerNames['host'])) {
            $this->updateHostFromUri();
        }

        if ($body !== '' && $body !== null) {
<<<<<<< HEAD
            $this->stream = Utils::streamFor($body);
=======
            $this->stream = stream_for($body);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }
    }

    public function getRequestTarget()
    {
        if ($this->requestTarget !== null) {
            return $this->requestTarget;
        }

        $target = $this->uri->getPath();
        if ($target == '') {
            $target = '/';
        }
        if ($this->uri->getQuery() != '') {
            $target .= '?' . $this->uri->getQuery();
        }

        return $target;
    }

    public function withRequestTarget($requestTarget)
    {
        if (preg_match('#\s#', $requestTarget)) {
            throw new InvalidArgumentException(
                'Invalid request target provided; cannot contain whitespace'
            );
        }

        $new = clone $this;
        $new->requestTarget = $requestTarget;
        return $new;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function withMethod($method)
    {
<<<<<<< HEAD
        $this->assertMethod($method);
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        $new = clone $this;
        $new->method = strtoupper($method);
        return $new;
    }

    public function getUri()
    {
        return $this->uri;
    }

    public function withUri(UriInterface $uri, $preserveHost = false)
    {
        if ($uri === $this->uri) {
            return $this;
        }

        $new = clone $this;
        $new->uri = $uri;

        if (!$preserveHost || !isset($this->headerNames['host'])) {
            $new->updateHostFromUri();
        }

        return $new;
    }

    private function updateHostFromUri()
    {
        $host = $this->uri->getHost();

        if ($host == '') {
            return;
        }

        if (($port = $this->uri->getPort()) !== null) {
            $host .= ':' . $port;
        }

        if (isset($this->headerNames['host'])) {
            $header = $this->headerNames['host'];
        } else {
            $header = 'Host';
            $this->headerNames['host'] = 'Host';
        }
        // Ensure Host is the first header.
        // See: http://tools.ietf.org/html/rfc7230#section-5.4
        $this->headers = [$header => [$host]] + $this->headers;
    }
<<<<<<< HEAD

    private function assertMethod($method)
    {
        if (!is_string($method) || $method === '') {
            throw new \InvalidArgumentException('Method must be a non-empty string.');
        }
    }
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
