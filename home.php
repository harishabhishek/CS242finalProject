<!DOCTYPE html>
<!--This file is the home page of the user. This will be updated so that it is
customized and personalized for each user-->
<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/10/14
 * Time: 4:09 PM
 */

session_start();
$_SESSION['views']= "0";
$GLOBALS['s'] = "0";
?>
<html>
<head>
    <link rel="STYLESHEET" type="text/css" href="style.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    </script>

    <script>
        $(document).ready(function(){


            /**
             *  The initial hide buttons
             */
            $("#addArtistDiv").hide();
            $("#addAlbumDiv").hide();
            $("#addSongDiv").hide();
            $("#addGenreDiv").hide();
            $("#remArtistDiv").hide();
            $("#remAlbumDiv").hide();
            $("#remSongDiv").hide();
            $("#remGenreDiv").hide();



            /**
             * Artist add Button Listener
             */
            $("#addArtistDivBut").click(function(){

                var url = "addartist.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, artistname: $('#artistname').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#artistReplace").empty();
                    $("#artistReplace").load("addartist.php");

                    //alert('The server was successfully reached');
                    $("#addArtistDiv").height("0px");
                    $("#addArtistDiv").hide();
                    $("#artistname").val("");


                });


                //alert('button');
                $( "#addArtist").show();
                $("#remArtist").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });
            //End of Artist button Listener


            /**
             * Album add Button Listener
             */
            $("#addAlbumDivBut").click(function(){

                var url = "addalbum.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, albumname: $('#albumname').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#albumReplace").empty();
                    $("#albumReplace").load("addalbum.php");

                    //alert('The server was successfully reached');
                    $("#addAlbumDiv").height("0px");
                    $("#addAlbumDiv").hide();
                    $("#albumname").val("");


                });


                //alert('button');
                $( "#addAlbum").show();
                $("#remAlbum").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });
            //End of Album button Listener


            /**
             * Song add Button Listener
             */
            $("#addSongDivBut").click(function(){

                var url = "addsong.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, songname: $('#songname').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#songReplace").empty();
                    $("#songReplace").load("addsong.php");

                    //alert('The server was successfully reached');
                    $("#addSongDiv").height("0px");
                    $("#addSongDiv").hide();
                    $("#songname").val("");


                });


                //alert('button');
                $( "#addSong").show();
                $("#remSong").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });
            //End of Song button Listener


            /**
             * Genre add Button Listener
             */
            $("#addGenreDivBut").click(function(){

                var url = "addgenre.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, genrename: $('#genrename').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#genreReplace").empty();
                    $("#genreReplace").load("addgenre.php");

                    //alert('The server was successfully reached');
                    $("#addGenreDiv").height("0px");
                    $("#addGenreDiv").hide();
                    $("#genrename").val("");


                });


                //alert('button');
                $( "#addGenre").show();
                $("#remGenre").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });
            //End of Genre button Listener

            /**
             *End of Add Cascades
             */



            /**
             * Remove Button Handlers
             */
            $("#remArtistDivBut").click(function(){

                var url = "remartist.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, artistname: $('#remartistname').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#artistReplace").empty();
                    $("#artistReplace").load("remartist.php");

                    //alert('The server was successfully reached');
                    $("#remArtistDiv").height("0px");
                    $("#remArtistDiv").hide();
                    $("#remartistname").val("");


                });


                //alert('button');
                $("#addArtist").show();
                $( "#remArtist").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });


            /**
             * Remove Button Handlers
             */
            $("#remAlbumDivBut").click(function(){

                var url = "remalbum.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, albumname: $('#remalbumname').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#albumReplace").empty();
                    $("#albumReplace").load("remalbum.php");

                    //alert('The server was successfully reached');
                    $("#remAlbumDiv").height("0px");
                    $("#remAlbumDiv").hide();
                    $("#remalbumname").val("");


                });


                //alert('button');
                $("#addAlbum").show();
                $( "#remAlbum").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });


            /**
             * Remove Button Handlers
             */
            $("#remSongDivBut").click(function(){

                var url = "remsong.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, songname: $('#remsongname').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#songReplace").empty();
                    $("#songReplace").load("remsong.php");

                    //alert('The server was successfully reached');
                    $("#remSongDiv").height("0px");
                    $("#remSongDiv").hide();
                    $("#remsongname").val("");


                });


                //alert('button');
                $("#addSong").show();
                $("#remSong").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });


            /**
             * Remove Button Handlers
             */
            $("#remGenreDivBut").click(function(){

                var url = "remgenre.php";
                var userid = "1";

                /* Post the data to the given URL*/
                var posting = $.post( url, { userid: userid, genrename: $('#remgenrename').val() } );

                /* Put the results in a div */
                posting.done(function( data ) {

                    $("#genreReplace").empty();
                    $("#genreReplace").load("remgenre.php");

                    //alert('The server was successfully reached');
                    $("#remGenreDiv").height("0px");
                    $("#remGenreDiv").hide();
                    $("#remgenrename").val("");


                });


                //alert('button');
                $("#addGenre").show();
                $( "#remGenre").show();

                /* Put the results in a div */
                posting.error(function( data ) {
                    alert('There was some error!!!');
                });


            });

            /**
             * End of remove handlers
             */




            /**
             *  The show buttons to show the feilds
             */
            $( "#addArtist" ).click(function() {
                //alert('button');
                $( "#addArtist").hide();
                $("#remArtist").hide();
                $("#addArtistDiv").show();
                $("#addArtistDiv").height("50px");

            });

            $( "#addAlbum" ).click(function() {
                //alert('button');
                $( "#addAlbum").hide();
                $( "#remAlbum").hide();
                $("#addAlbumDiv").show();
                $("#addAlbumDiv").height("50px");

            });

            $( "#addSong" ).click(function() {
                //alert('button');
                $( "#addSong").hide();
                $( "#remSong").hide();
                $("#addSongDiv").show();
                $("#addSongDiv").height("50px");

            });

            $( "#addGenre" ).click(function() {
                //alert('button');
                $( "#addGenre").hide();
                $( "#remGenre").hide();
                $("#addGenreDiv").show();
                $("#addGenreDiv").height("50px");

            });
            /**
             * End of Show Buttons
             */


            /**
             * Beginning of show buttons for the remove handlers
             */
            $( "#remArtist" ).click(function() {
                //alert('button');
                $( "#remArtist").hide();
                $("#addArtist").hide();
                $("#remArtistDiv").show();
                $("#remArtistDiv").height("50px");

            });

            $( "#remAlbum" ).click(function() {
                //alert('button');
                $( "#remAlbum").hide();
                $("#addAlbum").hide();
                $("#remAlbumDiv").show();
                $("#remAlbumDiv").height("50px");

            });

            $( "#remSong" ).click(function() {
                //alert('button');
                $( "#remSong").hide();
                $("#addSong").hide();
                $("#remSongDiv").show();
                $("#remSongDiv").height("50px");

            });

            $( "#remGenre" ).click(function() {
                //alert('button');
                $( "#remGenre").hide();
                $("#addGenre").hide();
                $("#remGenreDiv").show();
                $("#remGenreDiv").height("50px");

            });

            /**
             * End of Remove Handler functions
             */



        });
        //end of ready() function


    </script>


</head>
<body style="background-color:#111111;">

<script type="javascript">

</script>
<div id="super">
<div>
    <p class="banner"> <a href="login.php" class="nounderline"> MusicMate.com</a></p>
</div>

<div id="Artist">
    <p >
        Welcome User! <br>The following are the artists and songs that you have selected:
    </p>
    <?php


    $con = mysqli_connect('localhost', 'root', 'root', 'project');


    echo "<div id= 'artistReplace'> ";
    echo "<br>";
    echo "<u> Artists: </u> <br>";
    $result = mysqli_query($con,"select artist from artist ORDER BY artist ASC");

    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['artist']."<br>";
    }
    echo "<br>";

    echo "</div>";

    echo "<button class='add' id='addArtist'> Add Artists</button>";
    echo "<button class='add' id='remArtist'> Remove Artists</button>";
    echo "<br>";
    echo "<br>";
    $addArtist = '<div id="addArtistDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Artists" placeholder="Enter your favorite Artists" class="addDiv" id="artistname">
     <br>
     <button class="add" id="addArtistDivBut">Add Artist </button>
     </div>';
    echo $addArtist;

    $remArtist = '<div id="remArtistDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Artists" placeholder="Enter Artists to Delete" class="addDiv" id="remartistname">
     <br>
     <button class="add" id="remArtistDivBut">Remove Artist </button>
     </div>';
    echo $remArtist;





    echo "<div id= 'albumReplace'> ";
    echo "<br>";
    echo "<u> Albums: </u> <br>";
    $result = mysqli_query($con,"select album from album ORDER BY album ASC");

    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['album']."<br>";
    }
    echo "<br>";

    echo "</div>";

    echo "<button class='add' id='addAlbum'> Add Album</button>";
    echo "<button class='add' id='remAlbum'> Remove Album</button>";

    echo "<br>";
    echo "<br>";
    $addAlbum = '<div id="addAlbumDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Albums" placeholder="Enter your favorite Albums" class="addDiv" id="albumname">
     <br>
     <button class="add" id="addAlbumDivBut">Add Artist </button>
     </div>';
    echo $addAlbum;

    $remAlbum = '<div id="remAlbumDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Albums" placeholder="Enter Albums to Remove" class="addDiv" id="remalbumname">
     <br>
     <button class="add" id="remAlbumDivBut">Remove Artist </button>
     </div>';
    echo $remAlbum;



    echo "<div id= 'songReplace'> ";
    echo "<br>";
    echo "<u> Songs: </u> <br>";
    $result = mysqli_query($con,"select song from song ORDER BY song ASC");

    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['song']."<br>";
    }
    echo "<br>";

    echo "</div>";

    echo "<button class='add' id='addSong'> Add Songs</button>";
    echo "<button class='add' id='remSong'> Remove Songs</button>";

    echo "<br>";
    echo "<br>";
    $addSong = '<div id="addSongDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Songs" placeholder="Enter Your Favorite Songs" class="addDiv" id="songname">
     <br>
     <button class="add" id="addSongDivBut">Add Song</button>
     </div>';
    echo $addSong;

    $remSong = '<div id="remSongDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Songs" placeholder="Enter Songs to Remove" class="addDiv" id="remsongname">
     <br>
     <button class="add" id="remSongDivBut">Remove Song</button>
     </div>';
    echo $remSong;




    echo "<div id= 'genreReplace'> ";
    echo "<br>";
    echo "<u> Genre: </u> <br>";
    $result = mysqli_query($con,"select genre from genre ORDER BY genre ASC");

    while($row = mysqli_fetch_array($result)){
        echo "&emsp;".$row['genre']."<br>";
    }
    echo "<br>";

    echo "</div>";

    echo "<button class='add' id='addGenre'> Add Genre</button>";
    echo "<button class='add' id='remGenre'> Remove Genre</button>";

    echo "<br>";
    echo "<br>";
    $addGenre = '<div id="addGenreDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Genres" placeholder="Enter your favorite Genres" class="addDiv" id="genrename">
     <br>
     <button class="add" id="addGenreDivBut">Add Genre </button>
     </div>';
    echo $addGenre;

    $remGenre = '<div id="remGenreDiv" xmlns="http://www.w3.org/1999/html">

     Name: <input type="text" name="Genres" placeholder="Enter Genres to Delete" class="addDiv" id="remgenrename">
     <br>
     <button class="add" id="remGenreDivBut">Remove Genre </button>
     </div>';
    echo $remGenre;

    echo "<br> <br>";

    ?>

    <br>
    <br>


</div>
</div>
</body>
</html>