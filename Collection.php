<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:54 AM
 */

/**
 * Class Collection the collection class which serves as the base of the collection
 * the songs and library of the user.
 */
class Collection {

    public $artist;
    public $genre;
    public $album;
    public $song;

    /**
     * the default constructor for the database
     */
    function __construct(){

        $this->album = 'Vulgur Display of Power';
        $this->artist='Pantera';
        $this->song='Walk';
        $this->genre='metal';
    }

} 