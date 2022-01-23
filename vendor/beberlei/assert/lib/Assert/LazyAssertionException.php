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

class LazyAssertionException extends InvalidArgumentException
{
    /**
     * @var InvalidArgumentException[]
     */
    private $errors = [];

    /**
     * @param InvalidArgumentException[] $errors
<<<<<<< HEAD
     */
    public static function fromErrors(array $errors): self
=======
     *
     * @return self
     */
    public static function fromErrors(array $errors)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        $message = \sprintf('The following %d assertions failed:', \count($errors))."\n";

        $i = 1;
        foreach ($errors as $error) {
            $message .= \sprintf("%d) %s: %s\n", $i++, $error->getPropertyPath(), $error->getMessage());
        }

        return new static($message, $errors);
    }

    public function __construct($message, array $errors)
    {
        parent::__construct($message, 0, null, null);

        $this->errors = $errors;
    }

<<<<<<< HEAD
    /**
     * @return InvalidArgumentException[]
     */
    public function getErrorExceptions(): array
=======
    public function getErrorExceptions()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->errors;
    }
}
