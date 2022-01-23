<?php

/**
 * Assert
 *
 * LICENSE
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.txt.
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to kontakt@beberlei.de so I can send you a copy immediately.
 */

namespace Assert;

use Throwable;

interface AssertionFailedException extends Throwable
{
<<<<<<< HEAD
    /**
     * @return string|null
     */
    public function getPropertyPath();

    /**
     * @return mixed
     */
    public function getValue();

    public function getConstraints(): array;
=======
    public function getPropertyPath();

    public function getValue();

    public function getConstraints();
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
}
