<?php
<<<<<<< HEAD

declare(strict_types=1);
=======
/**
 * @license http://www.opensource.org/licenses/mit-license.php MIT (see the LICENSE file)
 */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

namespace Psr\Container;

/**
 * Describes the interface of a container that exposes methods to read its entries.
 */
interface ContainerInterface
{
    /**
     * Finds an entry of the container by its identifier and returns it.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @throws NotFoundExceptionInterface  No entry was found for **this** identifier.
     * @throws ContainerExceptionInterface Error while retrieving the entry.
     *
     * @return mixed Entry.
     */
<<<<<<< HEAD
    public function get(string $id);
=======
    public function get($id);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

    /**
     * Returns true if the container can return an entry for the given identifier.
     * Returns false otherwise.
     *
     * `has($id)` returning true does not mean that `get($id)` will not throw an exception.
     * It does however mean that `get($id)` will not throw a `NotFoundExceptionInterface`.
     *
     * @param string $id Identifier of the entry to look for.
     *
     * @return bool
     */
<<<<<<< HEAD
    public function has(string $id);
=======
    public function has($id);
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
