<?php session_start(); ?>
<!DOCTYPE html>
<!--The first login, home page visitors see-->
<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/10/14
 * Time: 4:09 PM
 */
?>
<html>
<head>
    <link rel="STYLESHEET" type="text/css" href="style.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){


        });
    </script>
</head>
<body class="back">
<div>
<p class="banner"> <a href="login.php" class="nounderline"> MusicMate.com</a></p>
</div>

<a href="profile.php"> <button class="login"> Log In!</button></a>
<a href="signup.php"> <button class="new">New User</button></a>

<div id="about">
    <br>
    <br>

    <p>MusicMate allows you to develop your own musical profile,
        keeping track of new artists, top songs, and connecting with other listeners.
        Discover communities of people who share your
        musical tastes, connect with artists, and enjoy new music every day. The music is waiting!

    </p>
</div>
<br>
<div id="join">

    <p>
        Join Today to enjoy our Free Service!
    </p>
</div>
</body>
</html>