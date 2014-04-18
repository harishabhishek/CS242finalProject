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
$artist = $_POST["artistname"];

function printData($con){

    echo "<div id= 'artistReplace'> ";

    echo "<br>";
    echo "<u> Artists: </u> <br>";
    $result = mysqli_query($con,"select artist from artist ORDER BY artist ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['artist']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $id, $artist){

    $artists = explode("," , $artist);


    for($i=0; $i<count($artists); $i++ ){

        $toUse = test_input($artists[$i]);
        $stmt = $con->prepare("insert into artist (artist, id) values (?, ?)");
        $stmt->bind_param("si", $toUse, $id);
        $stmt->execute();
        $stmt->close();

    }



}

$con = setDatabase();



if($artist!= ""){

    addIntoDatabase($con, $id, $artist);

}

printData($con);


?>
