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

$genre = $_POST["genrename"];
$uid = $_SESSION['usrid'];

function printData($con, $uid){

    echo "<div id= 'GenreReplace'> ";

    echo "<br>";
    echo "<u> Genres: </u> <br>";
    $result = mysqli_query($con,"select genre from genre where  id='$uid' ORDER BY genre ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['genre']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $uid, $genre){

    $genres = explode("," , $genre);


    for($i=0; $i<count($genres); $i++ ){

        $toUse = test_input($genres[$i]);
        $stmt = mysqli_query($con, "delete from genre where genre = '$toUse'  and id = '$uid' ");


    }



}

$con = setDatabase();

printData($con, $uid);

if($genre!= ""){

    addIntoDatabase($con, $uid, $genre);

}


?>
