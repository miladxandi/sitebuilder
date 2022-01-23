<?php
/*
 * This file is part of php-token-stream.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

use PHPUnit\Framework\TestCase;

class PHP_Token_NamespaceTest extends TestCase
{
<<<<<<< HEAD
=======
    /**
     * @covers PHP_Token_NAMESPACE::getName
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function testGetName()
    {
        $tokenStream = new PHP_Token_Stream(
          TEST_FILES_PATH . 'classInNamespace.php'
        );

        foreach ($tokenStream as $token) {
            if ($token instanceof PHP_Token_NAMESPACE) {
                $this->assertSame('Foo\\Bar', $token->getName());
            }
        }
    }

    public function testGetStartLineWithUnscopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php') as $token) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach ($tokenStream as $token) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if ($token instanceof PHP_Token_NAMESPACE) {
                $this->assertSame(2, $token->getLine());
            }
        }
    }

    public function testGetEndLineWithUnscopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php') as $token) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach ($tokenStream as $token) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if ($token instanceof PHP_Token_NAMESPACE) {
                $this->assertSame(2, $token->getEndLine());
            }
        }
    }
    public function testGetStartLineWithScopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php') as $token) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php');
        foreach ($tokenStream as $token) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if ($token instanceof PHP_Token_NAMESPACE) {
                $this->assertSame(2, $token->getLine());
            }
        }
    }

    public function testGetEndLineWithScopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php') as $token) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php');
        foreach ($tokenStream as $token) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if ($token instanceof PHP_Token_NAMESPACE) {
                $this->assertSame(8, $token->getEndLine());
            }
        }
    }
}
