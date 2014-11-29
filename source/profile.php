<?php session_start(); ?>

<!DOCTYPE html>
<!--The file which lets user logon to the website-->
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

            $('#continue').click(function() {

                window.open('home.php', '_blank');

            });


        });
    </script>
</head>

</head>
<body class="back">
<div>
    <p class="banner"> <a href="login.php" class="nounderline"> MusicMate.com</a></p>
</div>

<div id="topError">
    <?php

    $con = mysqli_connect('localhost', 'root', 'root', 'project');



    $flag = false;
    if($_SERVER['REQUEST_METHOD'] == 'POST'){



        $username = test_input($_POST["uname"]);
        $pword = test_input($_POST["pword"]);



        if($username==="" || $pword ===""){
            $flag = false;
        }
        else
            $flag = true;


        $notFound = true;

        $result = mysqli_query($con,"select uname from users");

        while($row = mysqli_fetch_array($result)){

            if($username === $row['uname']){
                $notFound = false;
                break;
            }
        }

        if($notFound){
            $flag = false;
            echo "<div id='failure'> Failure: User name not found</div>";
        }


        $result = mysqli_query($con,"select pwd from users where uname = '$username'");
        $row = mysqli_fetch_array($result);
        $originalPassword = $row['pwd'];

        $pflag = true;
//        if($originalPassword === md5($pword)){
//            $flag = true;
//            $pflag = false;
//
//        }

        if(password_verify($pword, $originalPassword)){
            $flag = true;
            $pflag = false;

        }

        if($pflag){
            $flag = false;
            echo "<div id='failure'> Failure: Password did not match</div>";
        }

        if($flag){

            $result = mysqli_query($con,"select id from users where uname = '$username'");
            $row = mysqli_fetch_array($result);
            $uid = $row['id'];

            $_SESSION['usrid'] = $uid;
            echo "<div id='success'> Signup Was Successful </div>";

            $alert = "<script> alert('Your Signup was successful. Please Continue')</script>";

            echo $alert;
        }
        else{
            echo "<div id='failure'> Login failed because of one of more reasons </div>";
        }


    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    ?>
</div>


<div id="formdiv">
    <form id="formoid" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
        <div>
            <label class="title">User Name:</label>
            <input type="text" name="uname" id="uname">
        </div>
        <div>
            <label class="title">Password:</label>
            <input type="password" name="pword" id="pword">
        </div>
        <br>

        <div >
            <input type="submit" id="submitButton"  name="submitButton" value="Submit" class="submitbuton">

        </div>
    </form>

    <button id="continue" class="submitbuton" >Continue</button>
</div>

<div id ="div1"> </div>
</body>
</html>