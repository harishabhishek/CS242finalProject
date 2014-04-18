<!DOCTYPE html>
<!--    This file is the new sign-up sheet for the website-->

<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/10/14
 * Time: 9:43 PM
 */
?>
<html>
<head>
    <link rel="STYLESHEET" type="text/css" href="style.css"/>

</head>
<body class="back">
<div>
    <p class="banner"> <a href="home.php" class="nounderline"> MusicMate.com</a></p>
</div>
<div id="formdiv2">
<!--    The form based sign up-->
<form id="formoid" action="home.php">
    <div>
        <label class="title">First Name:</label>
        <input type="text" id="fname" name="fname" >
    </div>
    <br>
    <div>
        <label class="title">Last Name:</label>
        <input type="text" id="lname" name="lname" >
    </div>
    <br>
    <div>
        <label class="title">User Name:</label>
        <input type="text" name="uname" id="uname">
    </div>
    <br>
    <div>
        <label class="title">Email:</label>
        <input type="text" name="email" id="email">
    </div>
    <br>
    <div>
        <label class="title">Password:</label>
        <input type="password" name="pword" id="pword">
    </div>
    <br>
    <div>
        <label class="title">Verify Password:</label>
        <input type="password" name="vpword" id="vpword">
    </div>

    <div >
        <input type="submit" id="submit"  name="submitButton" value="Submit" class="submitbuton">
    </div>
</form>
</div>

</body>
</html>