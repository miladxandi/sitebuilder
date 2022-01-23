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

use Symfony\Component\Config\Resource\DirectoryResource;
use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * IcuResFileLoader loads translations from a resource bundle.
 *
 * @author stealth35
 */
class IcuResFileLoader implements LoaderInterface
{
    /**
     * {@inheritdoc}
     */
    public function load($resource, $locale, $domain = 'messages')
    {
        if (!stream_is_local($resource)) {
            throw new InvalidResourceException(sprintf('This is not a local file "%s".', $resource));
        }

        if (!is_dir($resource)) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $resource));
        }

        try {
            $rb = new \ResourceBundle($locale, $resource);
        } catch (\Exception $e) {
            $rb = null;
        }

        if (!$rb) {
<<<<<<< HEAD
            throw new InvalidResourceException(sprintf('Cannot load resource "%s".', $resource));
=======
            throw new InvalidResourceException(sprintf('Cannot load resource "%s"', $resource));
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        } elseif (intl_is_failure($rb->getErrorCode())) {
            throw new InvalidResourceException($rb->getErrorMessage(), $rb->getErrorCode());
        }

        $messages = $this->flatten($rb);
        $catalogue = new MessageCatalogue($locale);
        $catalogue->add($messages, $domain);

<<<<<<< HEAD
        if (class_exists(DirectoryResource::class)) {
=======
        if (class_exists('Symfony\Component\Config\Resource\DirectoryResource')) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            $catalogue->addResource(new DirectoryResource($resource));
        }

        return $catalogue;
    }

    /**
     * Flattens an ResourceBundle.
     *
     * The scheme used is:
     *   key { key2 { key3 { "value" } } }
     * Becomes:
     *   'key.key2.key3' => 'value'
     *
     * This function takes an array by reference and will modify it
     *
     * @param \ResourceBundle $rb       The ResourceBundle that will be flattened
     * @param array           $messages Used internally for recursive calls
     * @param string          $path     Current path being parsed, used internally for recursive calls
     *
     * @return array the flattened ResourceBundle
     */
    protected function flatten(\ResourceBundle $rb, array &$messages = [], $path = null)
    {
        foreach ($rb as $key => $value) {
            $nodePath = $path ? $path.'.'.$key : $key;
            if ($value instanceof \ResourceBundle) {
                $this->flatten($value, $messages, $nodePath);
            } else {
                $messages[$nodePath] = $value;
            }
        }

        return $messages;
    }
}
