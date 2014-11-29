<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 5/2/14
 * Time: 4:51 AM
 */
session_start();

$uid = $_SESSION['usrid'];
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
<body style="background-color:#111111;">

<script type="javascript">

</script>

<div>
    <p class="banner"> <a href="home.php" class="nounderline"> MusicMate.com</a>
    </p>
</div>


<div id="formdiv3">


<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if($_POST['name']){

            $first = $_POST['newfname'];
            $last = $_POST['newlname'];

            $con = mysqli_connect('localhost', 'root', 'root', 'project');

            $result = mysqli_query($con, "update users SET fname='$first', lname='$last' where id='$uid'");

            echo "<br><span style='color: green'>Name Sucessfully Update </span><br>";

        }
    }
?>
<form id="editname" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label class="title"> <u> New Name : </u></label> <br>
    <input type="text" placeholder="Enter New First Name" name="newfname">
    <input type="text" placeholder="Enter New Name" name="newlname">
    <input type="submit" id="submit"  name="name" value="Update Name" class="submitbuton">
</form>
<hr style="color: #ffffff" >
<br>
    <br>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['email']){

        $email = $_POST['newemail'];

        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        $result = mysqli_query($con, "update users SET email='$email' where id='$uid'");

        echo "<span style='color: green'>Email Sucessfully Update </span>";
    }
}
?>
<form id="editemail" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label class="title"> <u>New Email </u></label><br>
    <input type="text" placeholder="Enter New last Name" name="newemail">
    <input type="submit" id="submit"  name="email" value="Update Email" class="submitbuton">
</form>
<hr style="color: #ffffff" >
<br>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['pass']){
        $givenOld = $_POST['oldpass'];
        $givennew = $_POST['newpass'];
        $confnew = $_POST['confpass'];

        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        $result = mysqli_query($con,"select pwd from users where id = '$uid' ");
        $row = mysqli_fetch_array($result);

        $originalPassword = $row['pwd'];

        $pflag = true;

        if(password_verify($givenOld, $originalPassword)){
            $pflag = false;
        }

        if($givennew != $confnew){
            $pflag = false;
        }

        if($pflag){

            $pwordHash = password_hash($givennew, PASSWORD_DEFAULT);

            $result = mysqli_query($con, "update users SET pwd='$pwordHash' where id='$uid'");

            echo "<br><span style='color: green'>Updating Password was sucessfull </span><br>";

        }
        else{
            echo "<br> <span style='color: darkred'>Updating Password Not sucessfull </span> <br>";
        }



    }
}
?>
<form id="editpass" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label class="title"> <u> Password </u> </label><br>
    <input type="text" placeholder="Enter Old Password" name="oldpass">
    <input type="text" placeholder="Enter New Password" name="newpass">
    <input type="text" placeholder="Confirm New Password" name="confpass">
    <input type="submit" id="submit"  name="pass" value="Update Password" class="submitbuton">
</form>
<hr style="color: #ffffff" >
<br>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($_POST['delete']){

        $con = mysqli_connect('localhost', 'root', 'root', 'project');

        $result = mysqli_query($con, "delete from users where id='$uid'");
        $result = mysqli_query($con, "delete from album where id='$uid'");
        $result = mysqli_query($con, "delete from artist where id='$uid'");
        $result = mysqli_query($con, "delete from genre where id='$uid'");
        $result = mysqli_query($con, "delete from song where id='$uid'");


        $_SESSION['usrid'] = 0;
        echo "<br> <span style='color: green'> Account Deleted </span> <br>";
    }
}
?>
<form id="delete" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">

    <label class="title"> <u> Delete Account </u></label>
    <br>
    <input type="submit" id="submit"  name="delete" value="Delete Account" class="submitbuton">
</form>


</div>



</body>
</html>