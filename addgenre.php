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
$genre = $_POST["genrename"];

function printData($con){

    echo "<div id= 'genreReplace'> ";

    echo "<br>";
    echo "<u> Genre: </u> <br>";
    $result = mysqli_query($con,"select genre from genre ORDER BY genre ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['genre']."<br>";
    }
    echo "<br>";

    echo "</div>";


}

function addIntoDatabase($con, $id, $genre){

    $genres = explode("," , $genre);

    for($i=0; $i<count($genres); $i++ ){

        $toUse = test_input($genres[$i]);
        $stmt = $con->prepare("insert into genre (genre, id) values (?, ?)");
        $stmt->bind_param("si", $toUse, $id);
        $stmt->execute();
        $stmt->close();

    }

}

$con = setDatabase();


if($genre!= ""){

    addIntoDatabase($con, $id, $genre);

}
printData($con);



?>
