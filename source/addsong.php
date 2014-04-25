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


$song = $_POST["songname"];
$uid = $_SESSION['usrid'];

function printData($con, $uid){

    echo "<div id= 'songReplace'> ";

    echo "<br>";
    echo "<u> Songs: </u> <br>";
    $result = mysqli_query($con,"select song from song where  id='$uid' ORDER BY song ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['song']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $uid, $song){

    $songs = explode("," , $song);


    for($i=0; $i<count($songs); $i++ ){

        $toUse = test_input($songs[$i]);
        $stmt = $con->prepare("insert into song (song, id) values (?, ?)");
        $stmt->bind_param("si", $toUse, $uid);
        $stmt->execute();
        $stmt->close();

        $result = mysqli_query($con,"insert into hintsong (song) values ('$toUse')");

    }

}

$con = setDatabase();


if($song!= ""){

    addIntoDatabase($con, $uid, $song);

}
printData($con, $uid);


?>
