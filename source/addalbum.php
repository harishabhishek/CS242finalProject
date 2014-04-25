<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/18/14
 * Time: 12:51 AM
 */
session_start();


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


$album = $_POST["albumname"];
$uid = $_SESSION['usrid'];

function printData($con, $uid){

    echo "<div id= 'albumReplace'> ";

    echo "<br>";
    echo "<u> Albums: </u> <br>";
    $result = mysqli_query($con,"select album from album where  id='$uid' ORDER BY album ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['album']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $uid, $album){

    $albums = explode("," , $album);


    for($i=0; $i<count($albums); $i++ ){

        $toUse = test_input($albums[$i]);
        $stmt = $con->prepare("insert into album (album, id) values (?, ?)");
        $stmt->bind_param("si", $toUse, $uid);
        $stmt->execute();
        $stmt->close();

        $result = mysqli_query($con,"insert into hintalbum (album) values ('$toUse')");

    }



}

$con = setDatabase();


if($album!= ""){

    addIntoDatabase($con, $uid, $album);

}
printData($con, $uid);


?>
