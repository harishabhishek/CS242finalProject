<?php
session_start();
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 5/2/14
 * Time: 1:59 AM
 */


$q=$_REQUEST["q"];
//echo "<h1>". $q. "</h1>";


$con = mysqli_connect('localhost', 'root', 'root', 'project');

$result = mysqli_query($con,"select uname from users where uname = '$q'");
$row = mysqli_fetch_array($result);
$uname = $row['uname'];

$result = mysqli_query($con,"select id from users where uname = '$q'");
$row = mysqli_fetch_array($result);
$uid = $row['id'];


if($uname != ""){
    echo "<h1>". $q. "</h1>";


    //Artists
    echo "<div id= 'artistReplace'> ";

    echo "<br>";
    echo "<u> Artists: </u> <br>";
    $result = mysqli_query($con,"select artist from artist where  id='$uid'");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['artist']."<br>";
    }
    echo "<br>";
    echo "</div>";

    //Albums
    echo "<div id= 'albumReplace'> ";

    echo "<br>";
    echo "<u> Albums: </u> <br>";
    $result = mysqli_query($con,"select album from album where  id='$uid' ORDER BY album ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['album']."<br>";
    }
    echo "<br>";
    echo "</div>";

    //Songs
    echo "<div id= 'songReplace'> ";

    echo "<br>";
    echo "<u> Songs: </u> <br>";
    $result = mysqli_query($con,"select song from song where  id='$uid' ORDER BY song ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['song']."<br>";
    }
    echo "<br>";
    echo "</div>";

    //genre
    echo "<div id= 'genreReplace'> ";

    echo "<br>";
    echo "<u> Genre: </u> <br>";
    $result = mysqli_query($con,"select genre from genre where  id='$uid' ORDER BY genre ASC");
    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['genre']."<br>";
    }
    echo "<br>";
    echo "</div>";



}
else{
    echo "<h2> Not Found</h2>";
}

?>