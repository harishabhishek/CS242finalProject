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

$uid = $_SESSION['usrid'];

$artist = $_POST["artistname"];


function printData($con, $uid){

    echo "<div id= 'artistReplace'> ";

    echo "<br>";
    echo "<u> Artists: </u> <br>";
    $result = mysqli_query($con,"select artist from artist where  id='$uid'");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['artist']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $uid, $artist){

    $artists = explode("," , $artist);


    for($i=0; $i<count($artists); $i++ ){

        $toUse = test_input($artists[$i]);
        $stmt = $con->prepare("insert into artist (artist, id) values (?, ?)");
        $stmt->bind_param("si", $toUse, $uid);
        $stmt->execute();
        $stmt->close();

        $result = mysqli_query($con, "insert into hintartist (artist) values ( '$toUse')");
    }



}

$con = setDatabase();



if($artist!= ""){

    addIntoDatabase($con, $uid, $artist);

}

printData($con, $uid);


?>
