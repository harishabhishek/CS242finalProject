<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:33 AM
 */

/**
 * Class Database the class which handles the setting up of the database.
 */
class Database {

    public $con;

    /**
     * Function to connect to the databse
     */
    public function connectToDatabase(){
        $con = mysqli_connect('localhost', 'root', 'root', 'project');

         //Check connection
    if (!$con) {
        echo "<p> Failed to connect to MySQL: </p>" . mysqli_connect_error();
    } else {
        echo " <p> Connected to the Database </p>";
    }
    }
} 