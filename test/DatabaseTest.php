<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:34 AM
 */

include '../Database.php';

/**
 * Class DatabaseTest This test class tests the default database that is set up
 */
class DatabaseTest extends PHPUnit_Framework_TestCase {

    /**
     * Test for the name
     */
    public function testDatabase(){

        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        $result = mysqli_query($con,"select artist from collection where artist='Nirvana'");

        $row = mysqli_fetch_array($result);

        $this->assertEquals($row['artist'], 'Nirvana');
    }

    /**
     * test of genre from the database
     */
    public function testDefaultGenre(){

        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        $result = mysqli_query($con,"select artist from collection where genre='grunge'");

        $row = mysqli_fetch_array($result);

        $this->assertEquals($row['artist'], 'Nirvana');
    }

    /**
     * Test of album
     */
    public function testDefaultAlbum(){

        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        $result = mysqli_query($con,"select artist from collection where album='Nevermind'");

        $row = mysqli_fetch_array($result);

        $this->assertEquals($row['artist'], 'Nirvana');
    }


}
 