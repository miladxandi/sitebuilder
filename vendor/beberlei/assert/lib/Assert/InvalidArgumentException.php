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

class InvalidArgumentException extends \InvalidArgumentException implements AssertionFailedException
{
<<<<<<< HEAD
    /**
     * @var string|null
     */
    private $propertyPath;

    /**
     * @var mixed
     */
    private $value;

    /**
     * @var array
     */
    private $constraints;

    public function __construct($message, $code, string $propertyPath = null, $value = null, array $constraints = [])
=======
    private $propertyPath;
    private $value;
    private $constraints;

    public function __construct($message, $code, $propertyPath, $value, array $constraints = [])
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        parent::__construct($message, $code);

        $this->propertyPath = $propertyPath;
        $this->value = $value;
        $this->constraints = $constraints;
    }

    /**
     * User controlled way to define a sub-property causing
     * the failure of a currently asserted objects.
     *
     * Useful to transport information about the nature of the error
     * back to higher layers.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    public function getPropertyPath()
    {
        return $this->propertyPath;
    }

    /**
     * Get the value that caused the assertion to fail.
     *
     * @return mixed
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Get the constraints that applied to the failed assertion.
<<<<<<< HEAD
     */
    public function getConstraints(): array
=======
     *
     * @return array
     */
    public function getConstraints()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return $this->constraints;
    }
}
