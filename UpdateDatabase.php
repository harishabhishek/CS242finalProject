<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:40 AM
 */

/**
 * Class UpdateDatabase the class which updates the databse and throws an error
 */
class UpdateDatabase {

    public $con;

    /**
     * @return mixed the value of the default artist
     */
    public function connectToDatabase(){
        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        //Check connection
        if (!$con) {
            echo "<p> Failed to connect to MySQL: </p>" . mysqli_connect_error();
        } else {
            echo " <p> Connected to the Database </p>";
        }

        $result = mysqli_query($con,"select artist from collection where artist='Nirvana'");

        $row = mysqli_fetch_array($result);

        return $row['artist'];
    }

} 