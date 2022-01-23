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

class PHP_Token_FunctionTest extends TestCase
{
    /**
     * @var PHP_Token_FUNCTION[]
     */
    private $functions;

    protected function setUp()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'source.php') as $token) {
=======
        $ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source.php');

        foreach ($ts as $token) {
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
            if ($token instanceof PHP_Token_FUNCTION) {
                $this->functions[] = $token;
            }
        }
    }

<<<<<<< HEAD
=======
    /**
     * @covers PHP_Token_FUNCTION::getArguments
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function testGetArguments()
    {
        $this->assertEquals([], $this->functions[0]->getArguments());

        $this->assertEquals(
<<<<<<< HEAD
            ['$baz' => 'Baz'], $this->functions[1]->getArguments()
        );

        $this->assertEquals(
            ['$foobar' => 'Foobar'], $this->functions[2]->getArguments()
        );

        $this->assertEquals(
            ['$barfoo' => 'Barfoo'], $this->functions[3]->getArguments()
=======
          ['$baz' => 'Baz'], $this->functions[1]->getArguments()
        );

        $this->assertEquals(
          ['$foobar' => 'Foobar'], $this->functions[2]->getArguments()
        );

        $this->assertEquals(
          ['$barfoo' => 'Barfoo'], $this->functions[3]->getArguments()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        );

        $this->assertEquals([], $this->functions[4]->getArguments());

        $this->assertEquals(['$x' => null, '$y' => null], $this->functions[5]->getArguments());
    }

<<<<<<< HEAD
=======
    /**
     * @covers PHP_Token_FUNCTION::getName
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function testGetName()
    {
        $this->assertEquals('foo', $this->functions[0]->getName());
        $this->assertEquals('bar', $this->functions[1]->getName());
        $this->assertEquals('foobar', $this->functions[2]->getName());
        $this->assertEquals('barfoo', $this->functions[3]->getName());
        $this->assertEquals('baz', $this->functions[4]->getName());
    }

<<<<<<< HEAD
=======
    /**
     * @covers PHP_Token::getLine
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function testGetLine()
    {
        $this->assertEquals(5, $this->functions[0]->getLine());
        $this->assertEquals(10, $this->functions[1]->getLine());
        $this->assertEquals(17, $this->functions[2]->getLine());
        $this->assertEquals(21, $this->functions[3]->getLine());
        $this->assertEquals(29, $this->functions[4]->getLine());
        $this->assertEquals(37, $this->functions[6]->getLine());
    }

<<<<<<< HEAD
=======
    /**
     * @covers PHP_TokenWithScope::getEndLine
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function testGetEndLine()
    {
        $this->assertEquals(5, $this->functions[0]->getEndLine());
        $this->assertEquals(12, $this->functions[1]->getEndLine());
        $this->assertEquals(19, $this->functions[2]->getEndLine());
        $this->assertEquals(23, $this->functions[3]->getEndLine());
        $this->assertEquals(31, $this->functions[4]->getEndLine());
        $this->assertEquals(41, $this->functions[6]->getEndLine());
    }

<<<<<<< HEAD
=======
    /**
     * @covers PHP_Token_FUNCTION::getDocblock
     */
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
    public function testGetDocblock()
    {
        $this->assertNull($this->functions[0]->getDocblock());

        $this->assertEquals(
<<<<<<< HEAD
            "/**\n     * @param Baz \$baz\n     */",
            $this->functions[1]->getDocblock()
        );

        $this->assertEquals(
            "/**\n     * @param Foobar \$foobar\n     */",
            $this->functions[2]->getDocblock()
=======
          "/**\n     * @param Baz \$baz\n     */",
          $this->functions[1]->getDocblock()
        );

        $this->assertEquals(
          "/**\n     * @param Foobar \$foobar\n     */",
          $this->functions[2]->getDocblock()
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        );

        $this->assertNull($this->functions[3]->getDocblock());
        $this->assertNull($this->functions[4]->getDocblock());
    }

    public function testSignature()
    {
<<<<<<< HEAD
        $tokens     = new PHP_Token_Stream(TEST_FILES_PATH . 'source5.php');
        $functions  = $tokens->getFunctions();
        $classes    = $tokens->getClasses();
        $interfaces = $tokens->getInterfaces();

        $this->assertEquals(
            'foo($a, array $b, array $c = array())',
            $functions['foo']['signature']
        );

        $this->assertEquals(
            'm($a, array $b, array $c = array())',
            $classes['c']['methods']['m']['signature']
        );

        $this->assertEquals(
            'm($a, array $b, array $c = array())',
            $classes['a']['methods']['m']['signature']
        );

        $this->assertEquals(
            'm($a, array $b, array $c = array())',
            $interfaces['i']['methods']['m']['signature']
=======
        $ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source5.php');
        $f  = $ts->getFunctions();
        $c  = $ts->getClasses();
        $i  = $ts->getInterfaces();

        $this->assertEquals(
          'foo($a, array $b, array $c = array())',
          $f['foo']['signature']
        );

        $this->assertEquals(
          'm($a, array $b, array $c = array())',
          $c['c']['methods']['m']['signature']
        );

        $this->assertEquals(
          'm($a, array $b, array $c = array())',
          $c['a']['methods']['m']['signature']
        );

        $this->assertEquals(
          'm($a, array $b, array $c = array())',
          $i['i']['methods']['m']['signature']
>>>>>>> 140ccc26977f8b1cb4fade0f462b76c9f6ee2055
        );
    }
}
