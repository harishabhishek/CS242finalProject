<?php

include '../Stack.php';

/**
 * Class StackTestThe class to test the stack trace
 */
class StackTest extends PHPUnit_Framework_TestCase
{
    /**
     * Default stack test
     */
    public function testStackDefault()
    {
        $var = new Stack();
        $temp = $var->getVal();
        $this->assertEquals($temp, 'a');

    }

    public function testHash(){
        $var = md5("Hello World", true);

        $this->assertEquals(md5("Hello World", true), $var);
    }
}
?>