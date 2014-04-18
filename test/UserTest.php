<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:51 AM
 */

include '../User.php';

/**
 * Class UserTest The test class which tests the user profile
 */
class UserTest extends PHPUnit_Framework_TestCase {

    /**
     * Test the first name
     */
    public function testFname(){

        $var = new User();

        $this->assertEquals($var->fname, 'John');
    }

    /**
     * test the last name
     */
    public function testLname(){

        $var = new User();

        $this->assertEquals($var->lname, 'Doe');
    }

    /**
     * test the passwork
     */
    public function testpwd(){

        $var = new User();

        $this->assertEquals($var->password, 'pwd');
    }

    /**
     * test the email
     */
    public function testemail(){

        $var = new User();

        $this->assertEquals($var->email, 'default@test.com');
    }

}
 