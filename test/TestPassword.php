<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/25/14
 * Time: 10:39 AM
 */

class TestPassword extends PHPUnit_Framework_TestCase {

    public function testPassword(){

        $var = md5("Hello World");
        $temp = "Hello World";
        $this->assertEquals(md5($temp), $var);
    }

}
 