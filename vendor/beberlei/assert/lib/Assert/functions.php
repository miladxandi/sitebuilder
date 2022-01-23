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

/**
 * Start validation on a value, returns {@link AssertionChain}.
 *
 * The invocation of this method starts an assertion chain
 * that is happening on the passed value.
 *
<<<<<<< HEAD
 * @param mixed $value
 * @param string|callable|null $defaultMessage
 * @param string $defaultPropertyPath
 *
=======
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
 * @example
 *
 *  \Assert\that($value)->notEmpty()->integer();
 *  \Assert\that($value)->nullOr()->string()->startsWith("Foo");
 *
 * The assertion chain can be stateful, that means be careful when you reuse
 * it. You should never pass around the chain.
<<<<<<< HEAD
 */
function that($value, $defaultMessage = null, string $defaultPropertyPath = null): AssertionChain
=======
 *
 * @param mixed  $value
 * @param string $defaultMessage
 * @param string $defaultPropertyPath
 *
 * @return \Assert\AssertionChain
 */
function that($value, $defaultMessage = null, $defaultPropertyPath = null)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
{
    return Assert::that($value, $defaultMessage, $defaultPropertyPath);
}

/**
 * Start validation on a set of values, returns {@link AssertionChain}.
 *
<<<<<<< HEAD
 * @param mixed $values
 * @param string|callable|null $defaultMessage
 * @param string $defaultPropertyPath
 */
function thatAll($values, $defaultMessage = null, string $defaultPropertyPath = null): AssertionChain
=======
 * @param mixed  $values
 * @param string $defaultMessage
 * @param string $defaultPropertyPath
 *
 * @return \Assert\AssertionChain
 */
function thatAll($values, $defaultMessage = null, $defaultPropertyPath = null)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
{
    return Assert::thatAll($values, $defaultMessage, $defaultPropertyPath);
}

/**
 * Start validation and allow NULL, returns {@link AssertionChain}.
 *
<<<<<<< HEAD
 * @param mixed $value
 * @param string|callable|null $defaultMessage
 * @param string $defaultPropertyPath
 *
 * @deprecated In favour of Assert::thatNullOr($value, $defaultMessage = null, $defaultPropertyPath = null)
 */
function thatNullOr($value, $defaultMessage = null, string $defaultPropertyPath = null): AssertionChain
=======
 * @param mixed  $value
 * @param string $defaultMessage
 * @param string $defaultPropertyPath
 *
 * @return \Assert\AssertionChain
 *
 * @deprecated In favour of Assert::thatNullOr($value, $defaultMessage = null, $defaultPropertyPath = null)
 */
function thatNullOr($value, $defaultMessage = null, $defaultPropertyPath = null)
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
{
    return Assert::thatNullOr($value, $defaultMessage, $defaultPropertyPath);
}

/**
 * Create a lazy assertion object.
<<<<<<< HEAD
 */
function lazy(): LazyAssertion
=======
 *
 * @return \Assert\LazyAssertion
 */
function lazy()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
{
    return Assert::lazy();
}
