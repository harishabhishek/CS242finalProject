<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:41 AM
 */

include '../UpdateDatabase.php';

/**
 * Class UpdateDatabaseTest The class which tests updating the database and connecting
 * to the database
 */
class UpdateDatabaseTest extends PHPUnit_Framework_TestCase {

    /**
     * the test case for testing the updating of the database
     */
    public function testData(){

        $var = new UpdateDatabase();
        $this->assertEquals($var->connectToDatabase(), 'Nirvana');
    }

}
 