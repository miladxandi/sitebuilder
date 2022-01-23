<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Config\Util\XmlUtils;
use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\MessageCatalogue;
use Symfony\Component\Translation\Util\XliffUtils;

/**
 * XliffFileLoader loads translations from XLIFF files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class XliffFileLoader implements LoaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function load($resource, $locale, $domain = 'messages')
    {
        if (!stream_is_local($resource)) {
            throw new InvalidResourceException(sprintf('This is not a local file "%s".', $resource));
        }

        if (!file_exists($resource)) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $resource));
        }

        $catalogue = new MessageCatalogue($locale);
        $this->extract($resource, $catalogue, $domain);

<<<<<<< HEAD
        if (class_exists(FileResource::class)) {
=======
        if (class_exists('Symfony\Component\Config\Resource\FileResource')) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            $catalogue->addResource(new FileResource($resource));
        }

        return $catalogue;
    }

<<<<<<< HEAD
    private function extract($resource, MessageCatalogue $catalogue, string $domain)
=======
    private function extract($resource, MessageCatalogue $catalogue, $domain)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        try {
            $dom = XmlUtils::loadFile($resource);
        } catch (\InvalidArgumentException $e) {
<<<<<<< HEAD
            throw new InvalidResourceException(sprintf('Unable to load "%s": ', $resource).$e->getMessage(), $e->getCode(), $e);
=======
            throw new InvalidResourceException(sprintf('Unable to load "%s": %s', $resource, $e->getMessage()), $e->getCode(), $e);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }

        $xliffVersion = XliffUtils::getVersionNumber($dom);
        if ($errors = XliffUtils::validateSchema($dom)) {
<<<<<<< HEAD
            throw new InvalidResourceException(sprintf('Invalid resource provided: "%s"; Errors: ', $resource).XliffUtils::getErrorsAsString($errors));
=======
            throw new InvalidResourceException(sprintf('Invalid resource provided: "%s"; Errors: %s', $xliffVersion, XliffUtils::getErrorsAsString($errors)));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }

        if ('1.2' === $xliffVersion) {
            $this->extractXliff1($dom, $catalogue, $domain);
        }

        if ('2.0' === $xliffVersion) {
            $this->extractXliff2($dom, $catalogue, $domain);
        }
    }

    /**
     * Extract messages and metadata from DOMDocument into a MessageCatalogue.
<<<<<<< HEAD
=======
     *
     * @param \DOMDocument     $dom       Source to extract messages and metadata
     * @param MessageCatalogue $catalogue Catalogue where we'll collect messages and metadata
     * @param string           $domain    The domain
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    private function extractXliff1(\DOMDocument $dom, MessageCatalogue $catalogue, string $domain)
    {
        $xml = simplexml_import_dom($dom);
<<<<<<< HEAD
        $encoding = $dom->encoding ? strtoupper($dom->encoding) : null;

        $namespace = 'urn:oasis:names:tc:xliff:document:1.2';
        $xml->registerXPathNamespace('xliff', $namespace);

        foreach ($xml->xpath('//xliff:file') as $file) {
            $fileAttributes = $file->attributes();

            $file->registerXPathNamespace('xliff', $namespace);

            foreach ($file->xpath('.//xliff:trans-unit') as $translation) {
                $attributes = $translation->attributes();

                if (!(isset($attributes['resname']) || isset($translation->source))) {
                    continue;
                }

                $source = isset($attributes['resname']) && $attributes['resname'] ? $attributes['resname'] : $translation->source;
                // If the xlf file has another encoding specified, try to convert it because
                // simple_xml will always return utf-8 encoded values
                $target = $this->utf8ToCharset((string) ($translation->target ?? $translation->source), $encoding);

                $catalogue->set((string) $source, $target, $domain);

                $metadata = [
                    'source' => (string) $translation->source,
                    'file' => [
                        'original' => (string) $fileAttributes['original'],
                    ],
                ];
                if ($notes = $this->parseNotesMetadata($translation->note, $encoding)) {
                    $metadata['notes'] = $notes;
                }

                if (isset($translation->target) && $translation->target->attributes()) {
                    $metadata['target-attributes'] = [];
                    foreach ($translation->target->attributes() as $key => $value) {
                        $metadata['target-attributes'][$key] = (string) $value;
                    }
                }

                if (isset($attributes['id'])) {
                    $metadata['id'] = (string) $attributes['id'];
                }

                $catalogue->setMetadata((string) $source, $metadata, $domain);
            }
=======
        $encoding = strtoupper($dom->encoding);

        $xml->registerXPathNamespace('xliff', 'urn:oasis:names:tc:xliff:document:1.2');
        foreach ($xml->xpath('//xliff:trans-unit') as $translation) {
            $attributes = $translation->attributes();

            if (!(isset($attributes['resname']) || isset($translation->source))) {
                continue;
            }

            $source = isset($attributes['resname']) && $attributes['resname'] ? $attributes['resname'] : $translation->source;
            // If the xlf file has another encoding specified, try to convert it because
            // simple_xml will always return utf-8 encoded values
            $target = $this->utf8ToCharset((string) (isset($translation->target) ? $translation->target : $translation->source), $encoding);

            $catalogue->set((string) $source, $target, $domain);

            $metadata = [];
            if ($notes = $this->parseNotesMetadata($translation->note, $encoding)) {
                $metadata['notes'] = $notes;
            }

            if (isset($translation->target) && $translation->target->attributes()) {
                $metadata['target-attributes'] = [];
                foreach ($translation->target->attributes() as $key => $value) {
                    $metadata['target-attributes'][$key] = (string) $value;
                }
            }

            if (isset($attributes['id'])) {
                $metadata['id'] = (string) $attributes['id'];
            }

            $catalogue->setMetadata((string) $source, $metadata, $domain);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        }
    }

    private function extractXliff2(\DOMDocument $dom, MessageCatalogue $catalogue, string $domain)
    {
        $xml = simplexml_import_dom($dom);
<<<<<<< HEAD
        $encoding = $dom->encoding ? strtoupper($dom->encoding) : null;
=======
        $encoding = strtoupper($dom->encoding);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        $xml->registerXPathNamespace('xliff', 'urn:oasis:names:tc:xliff:document:2.0');

        foreach ($xml->xpath('//xliff:unit') as $unit) {
            foreach ($unit->segment as $segment) {
                $source = $segment->source;

                // If the xlf file has another encoding specified, try to convert it because
                // simple_xml will always return utf-8 encoded values
<<<<<<< HEAD
                $target = $this->utf8ToCharset((string) ($segment->target ?? $source), $encoding);
=======
                $target = $this->utf8ToCharset((string) (isset($segment->target) ? $segment->target : $source), $encoding);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

                $catalogue->set((string) $source, $target, $domain);

                $metadata = [];
                if (isset($segment->target) && $segment->target->attributes()) {
                    $metadata['target-attributes'] = [];
                    foreach ($segment->target->attributes() as $key => $value) {
                        $metadata['target-attributes'][$key] = (string) $value;
                    }
                }

                if (isset($unit->notes)) {
                    $metadata['notes'] = [];
                    foreach ($unit->notes->note as $noteNode) {
                        $note = [];
                        foreach ($noteNode->attributes() as $key => $value) {
                            $note[$key] = (string) $value;
                        }
                        $note['content'] = (string) $noteNode;
                        $metadata['notes'][] = $note;
                    }
                }

                $catalogue->setMetadata((string) $source, $metadata, $domain);
            }
        }
    }

    /**
     * Convert a UTF8 string to the specified encoding.
     */
    private function utf8ToCharset(string $content, string $encoding = null): string
    {
        if ('UTF-8' !== $encoding && !empty($encoding)) {
            return mb_convert_encoding($content, $encoding, 'UTF-8');
        }

        return $content;
    }

    private function parseNotesMetadata(\SimpleXMLElement $noteElement = null, string $encoding = null): array
    {
        $notes = [];

        if (null === $noteElement) {
            return $notes;
        }

        /** @var \SimpleXMLElement $xmlNote */
        foreach ($noteElement as $xmlNote) {
            $noteAttributes = $xmlNote->attributes();
            $note = ['content' => $this->utf8ToCharset((string) $xmlNote, $encoding)];
            if (isset($noteAttributes['priority'])) {
                $note['priority'] = (int) $noteAttributes['priority'];
            }

            if (isset($noteAttributes['from'])) {
                $note['from'] = (string) $noteAttributes['from'];
            }

            $notes[] = $note;
        }

        return $notes;
    }
}
