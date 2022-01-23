<?php
<<<<<<< HEAD

namespace Doctrine\Instantiator;

use ArrayIterator;
=======
/*
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT
 * OWNER OR CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL,
 * SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT
 * LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE,
 * DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY
 * THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
 * (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
 * OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 *
 * This software consists of voluntary contributions made by many individuals
 * and is licensed under the MIT license. For more information, see
 * <http://www.doctrine-project.org>.
 */

namespace Doctrine\Instantiator;

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
use Doctrine\Instantiator\Exception\InvalidArgumentException;
use Doctrine\Instantiator\Exception\UnexpectedValueException;
use Exception;
use ReflectionClass;
<<<<<<< HEAD
use ReflectionException;
use Serializable;

use function class_exists;
use function is_subclass_of;
use function restore_error_handler;
use function set_error_handler;
use function sprintf;
use function strlen;
use function unserialize;

=======

/**
 * {@inheritDoc}
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
final class Instantiator implements InstantiatorInterface
{
    /**
     * Markers used internally by PHP to define whether {@see \unserialize} should invoke
     * the method {@see \Serializable::unserialize()} when dealing with classes implementing
     * the {@see \Serializable} interface.
     */
<<<<<<< HEAD
    public const SERIALIZATION_FORMAT_USE_UNSERIALIZER   = 'C';
    public const SERIALIZATION_FORMAT_AVOID_UNSERIALIZER = 'O';

    /**
     * Used to instantiate specific classes, indexed by class name.
     *
     * @var callable[]
=======
    const SERIALIZATION_FORMAT_USE_UNSERIALIZER   = 'C';
    const SERIALIZATION_FORMAT_AVOID_UNSERIALIZER = 'O';

    /**
     * @var \callable[] used to instantiate specific classes, indexed by class name
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    private static $cachedInstantiators = [];

    /**
<<<<<<< HEAD
     * Array of objects that can directly be cloned, indexed by class name.
     *
     * @var object[]
=======
     * @var object[] of objects that can directly be cloned, indexed by class name
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    private static $cachedCloneables = [];

    /**
     * {@inheritDoc}
     */
    public function instantiate($className)
    {
        if (isset(self::$cachedCloneables[$className])) {
            return clone self::$cachedCloneables[$className];
        }

        if (isset(self::$cachedInstantiators[$className])) {
            $factory = self::$cachedInstantiators[$className];

            return $factory();
        }

        return $this->buildAndCacheFromFactory($className);
    }

    /**
     * Builds the requested object and caches it in static properties for performance
     *
     * @return object
<<<<<<< HEAD
     *
     * @template T of object
     * @phpstan-param class-string<T> $className
     *
     * @phpstan-return T
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
     */
    private function buildAndCacheFromFactory(string $className)
    {
        $factory  = self::$cachedInstantiators[$className] = $this->buildFactory($className);
        $instance = $factory();

        if ($this->isSafeToClone(new ReflectionClass($instance))) {
            self::$cachedCloneables[$className] = clone $instance;
        }

        return $instance;
    }

    /**
     * Builds a callable capable of instantiating the given $className without
     * invoking its constructor.
     *
     * @throws InvalidArgumentException
     * @throws UnexpectedValueException
<<<<<<< HEAD
     * @throws ReflectionException
     *
     * @template T of object
     * @phpstan-param class-string<T> $className
     *
     * @phpstan-return callable(): T
     */
    private function buildFactory(string $className): callable
=======
     * @throws \ReflectionException
     */
    private function buildFactory(string $className) : callable
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        $reflectionClass = $this->getReflectionClass($className);

        if ($this->isInstantiableViaReflection($reflectionClass)) {
            return [$reflectionClass, 'newInstanceWithoutConstructor'];
        }

        $serializedString = sprintf(
            '%s:%d:"%s":0:{}',
<<<<<<< HEAD
            is_subclass_of($className, Serializable::class) ? self::SERIALIZATION_FORMAT_USE_UNSERIALIZER : self::SERIALIZATION_FORMAT_AVOID_UNSERIALIZER,
=======
            self::SERIALIZATION_FORMAT_AVOID_UNSERIALIZER,
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            strlen($className),
            $className
        );

        $this->checkIfUnSerializationIsSupported($reflectionClass, $serializedString);

<<<<<<< HEAD
        return static function () use ($serializedString) {
=======
        return function () use ($serializedString) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            return unserialize($serializedString);
        };
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     * @throws ReflectionException
     *
     * @template T of object
     * @phpstan-param class-string<T> $className
     *
     * @phpstan-return ReflectionClass<T>
     */
    private function getReflectionClass(string $className): ReflectionClass
=======
     * @param string $className
     *
     * @return ReflectionClass
     *
     * @throws InvalidArgumentException
     * @throws \ReflectionException
     */
    private function getReflectionClass($className) : ReflectionClass
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        if (! class_exists($className)) {
            throw InvalidArgumentException::fromNonExistingClass($className);
        }

        $reflection = new ReflectionClass($className);

        if ($reflection->isAbstract()) {
            throw InvalidArgumentException::fromAbstractClass($reflection);
        }

        return $reflection;
    }

    /**
<<<<<<< HEAD
     * @throws UnexpectedValueException
     *
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
     */
    private function checkIfUnSerializationIsSupported(ReflectionClass $reflectionClass, string $serializedString): void
    {
        set_error_handler(static function (int $code, string $message, string $file, int $line) use ($reflectionClass, &$error): bool {
=======
     * @param ReflectionClass $reflectionClass
     * @param string          $serializedString
     *
     * @throws UnexpectedValueException
     *
     * @return void
     */
    private function checkIfUnSerializationIsSupported(ReflectionClass $reflectionClass, $serializedString) : void
    {
        set_error_handler(function ($code, $message, $file, $line) use ($reflectionClass, & $error) : void {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            $error = UnexpectedValueException::fromUncleanUnSerialization(
                $reflectionClass,
                $message,
                $code,
                $file,
                $line
            );
<<<<<<< HEAD

            return true;
        });

        try {
            $this->attemptInstantiationViaUnSerialization($reflectionClass, $serializedString);
        } finally {
            restore_error_handler();
        }
=======
        });

        $this->attemptInstantiationViaUnSerialization($reflectionClass, $serializedString);

        restore_error_handler();
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        if ($error) {
            throw $error;
        }
    }

    /**
<<<<<<< HEAD
     * @throws UnexpectedValueException
     *
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
     */
    private function attemptInstantiationViaUnSerialization(ReflectionClass $reflectionClass, string $serializedString): void
=======
     * @param ReflectionClass $reflectionClass
     * @param string          $serializedString
     *
     * @throws UnexpectedValueException
     *
     * @return void
     */
    private function attemptInstantiationViaUnSerialization(ReflectionClass $reflectionClass, $serializedString) : void
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        try {
            unserialize($serializedString);
        } catch (Exception $exception) {
<<<<<<< HEAD
=======
            restore_error_handler();

>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            throw UnexpectedValueException::fromSerializationTriggeredException($reflectionClass, $exception);
        }
    }

<<<<<<< HEAD
    /**
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
     */
    private function isInstantiableViaReflection(ReflectionClass $reflectionClass): bool
=======
    private function isInstantiableViaReflection(ReflectionClass $reflectionClass) : bool
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return ! ($this->hasInternalAncestors($reflectionClass) && $reflectionClass->isFinal());
    }

    /**
     * Verifies whether the given class is to be considered internal
<<<<<<< HEAD
     *
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
     */
    private function hasInternalAncestors(ReflectionClass $reflectionClass): bool
=======
     */
    private function hasInternalAncestors(ReflectionClass $reflectionClass) : bool
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        do {
            if ($reflectionClass->isInternal()) {
                return true;
            }
<<<<<<< HEAD

            $reflectionClass = $reflectionClass->getParentClass();
        } while ($reflectionClass);
=======
        } while ($reflectionClass = $reflectionClass->getParentClass());
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

        return false;
    }

    /**
     * Checks if a class is cloneable
     *
     * Classes implementing `__clone` cannot be safely cloned, as that may cause side-effects.
<<<<<<< HEAD
     *
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
     */
    private function isSafeToClone(ReflectionClass $reflectionClass): bool
    {
        return $reflectionClass->isCloneable()
            && ! $reflectionClass->hasMethod('__clone')
            && ! $reflectionClass->isSubclassOf(ArrayIterator::class);
=======
     */
    private function isSafeToClone(ReflectionClass $reflection) : bool
    {
        return $reflection->isCloneable() && ! $reflection->hasMethod('__clone');
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    }
}
