<?php
<<<<<<< HEAD
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
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055

namespace Doctrine\Instantiator\Exception;

use InvalidArgumentException as BaseInvalidArgumentException;
use ReflectionClass;

<<<<<<< HEAD
use function interface_exists;
use function sprintf;
use function trait_exists;

/**
 * Exception for invalid arguments provided to the instantiator
 */
class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionInterface
{
    public static function fromNonExistingClass(string $className): self
=======
/**
 * Exception for invalid arguments provided to the instantiator
 *
 * @author Marco Pivetta <ocramius@gmail.com>
 */
class InvalidArgumentException extends BaseInvalidArgumentException implements ExceptionInterface
{
    public static function fromNonExistingClass(string $className) : self
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        if (interface_exists($className)) {
            return new self(sprintf('The provided type "%s" is an interface, and can not be instantiated', $className));
        }

<<<<<<< HEAD
        if (trait_exists($className)) {
=======
        if (PHP_VERSION_ID >= 50400 && trait_exists($className)) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            return new self(sprintf('The provided type "%s" is a trait, and can not be instantiated', $className));
        }

        return new self(sprintf('The provided class "%s" does not exist', $className));
    }

<<<<<<< HEAD
    /**
     * @template T of object
     * @phpstan-param ReflectionClass<T> $reflectionClass
     */
    public static function fromAbstractClass(ReflectionClass $reflectionClass): self
=======
    public static function fromAbstractClass(ReflectionClass $reflectionClass) : self
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    {
        return new self(sprintf(
            'The provided class "%s" is abstract, and can not be instantiated',
            $reflectionClass->getName()
        ));
    }
}
