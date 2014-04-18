<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/18/14
 * Time: 12:51 AM
 */



/**
 * The function establishes the database connections
 * @return $con : the connection for the database
 */
function setDatabase()
{
    $con = mysqli_connect('localhost', 'root', 'root', 'project');

    // Check connection
    if (!$con) {
        return $con;
    } else {
        return $con;
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysql_real_escape_string($data);
    return $data;
}

$id = $_POST["userid"];
$album = $_POST["albumname"];

function printData($con){

    echo "<div id= 'albumReplace'> ";

    echo "<br>";
    echo "<u> Albums: </u> <br>";
    $result = mysqli_query($con,"select album from album ORDER BY album ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['album']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $id, $album){

    $albums = explode("," , $album);


    for($i=0; $i<count($albums); $i++ ){

        $toUse = test_input($albums[$i]);
        $stmt = mysqli_query($con, "delete from album where album = '$toUse'  and id = '$id' ");


    }



}

$con = setDatabase();

printData($con);

if($album!= ""){

    addIntoDatabase($con, $id, $album);

}


?>
