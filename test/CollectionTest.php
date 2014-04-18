<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:57 AM
 */

include '../Collection.php';

/**
 * Class CollectionTest The class which handles the default collection for each
 * user on the website.
 * This class tests the Collection class.
 */
class CollectionTest extends PHPUnit_Framework_TestCase {

    /**
     * The default Artist test
     */
    public function testArtist(){

        $var = new Collection();

        $this->assertEquals($var->artist, 'Pantera');
    }

    /**
     * The default song test
     */
    public function testSong(){

        $var = new Collection();

        $this->assertEquals($var->song, 'Walk');
    }


    /**
     * The default Album test
     */
    public function testAlbum(){

        $var = new Collection();

        $this->assertEquals($var->album, 'Vulgur Display of Power');
    }


    /**
     * Default genre test
     */
    public function testGenre(){

        $var = new Collection();

        $this->assertEquals($var->genre, 'metal');
    }


}
 