<?php session_start();
$flag = false;

?>
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){

                $('#continue').click(function() {

<!--                    var login = "--><?php //echo $_SESSION['login']; ?><!--";-->
<!--                    alert(login);-->
                       window.open('home.php', '_blank');

//                    }

                });


        });
    </script>
</head>

<body class="back">

<div>
    <p class="banner"> <a href="login.php" class="nounderline">MusicMate.com</a></p>
</div>

<div id="topError">
    <?php

    $con = mysqli_connect('localhost', 'root', 'root', 'project');



    if($_SERVER['REQUEST_METHOD'] == 'POST'){

        $fname =  test_input($_POST["fname"]);
        $lname = test_input($_POST["lname"]);
        $username = test_input($_POST["username"]);
        $emailbox = test_input($_POST["emailbox"]);
        $pword = test_input($_POST["pword"]);
        $vpword = test_input($_POST["vpword"]);



        if($fname==="" || $lname ==="" || $username==="" || $emailbox ===""){
            $flag = false;
        }
        else
            $flag = true;




        $result = mysqli_query($con,"select uname from users ");

        while($row = mysqli_fetch_array($result)){
            if($row['uname'] == $username){
                $flag = false;
                echo "<div id='failure'> Failure: User name already exists</div>";
            }
        }

        if($pword != $vpword){
            $flag = false;
            echo "<div id='failure'> Failure: Password Don't match</div>";
        }

        if($flag){

            $flag = true;

            $result = mysqli_query($con,"select MAX(id) as id from users");
            $row = mysqli_fetch_array($result);

            $uid = (int)$row['id']+1;

            //$pwordHash = md5($pword);

            $pwordHash = password_hash($pword, PASSWORD_DEFAULT);

            $result  = mysqli_query($con, "insert into users (fname, pwd, lname, email, id, uname)
            values ('$fname', '$pwordHash', '$lname', '$emailbox', '$uid', '$username')");

            $_SESSION['usrid'] = $uid;
            $_SESSION['login'] = "true";

            echo "<div id='success'> Signup Was Successful </div>";
        }

        if(!$flag){
            $_SESSION['login'] = "false";
            echo "<div id='failure'> Signup Failed : There were one or more errors</div>";
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
<div id="formdiv2">
<!--    The form based sign up-->
<form id="formoid" action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
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
        <input type="text" name="username" id="uname">
    </div>
    <br>
    <div>
        <label class="title">Email:</label>
        <input type="text" name="emailbox" id="email">
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
        <button id="continue" class="submitbuton" style="margin-left: 50px" >Continue</button>
    </div>

</form>
</div>


</body>
</html>