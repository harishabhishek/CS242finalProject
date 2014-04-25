<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/18/14
 * Time: 8:33 AM
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

$con = setDatabase();
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    $data = mysql_real_escape_string($data);
    return $data;
}

?>

<html>
<head>
    <link rel="STYLESHEET" type="text/css" href="source/style.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
    </script>
    <script>
        $(document).ready(function(){

//            $("#inputR").hide();
//            $("#outputR").hide();


        });

    </script>

</head>
<body class="back">
<div>
    <p class="banner"> <a href="source/home.php" class="nounderline"> MusicMate.com</a></p>
</div>

<div id="Artist" style="margin-top: 5%; align-self: center; width: 800px">

    <h1 style="align-self: center"> Password Hashing </h1>

    <div id="Input">


        <form id="formoid" action="loginHandler.php" METHOD="post">
            <div>
                <label class="title">Name:</label>
                <input type="text" id="name" name="iname" >
            </div>
            <br>
            <div>
                <label class="title">Password:</label>
                <input type="password" name="password" id="ipassword">
            </div>
            <br>
                <input type="submit" id="submitButton"  name="submit" value="input">
        </form>

    </div>

    <div id = "inputR">
    <p> Result:        <?php

        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            if($_POST['submit'] == "input"){

                $uname = $_POST['iname'];
                $pwd = $_POST['ipassword'];

                $uname = test_input($uname);
                $pwd = trim($pwd);

                $flag = false;
                $con = mysqli_connect('localhost', 'root', 'root', 'project');

                $result = mysqli_query($con,"select usr from password ");

                while($row = mysqli_fetch_array($result)){
                    if($row['usr'] == $uname){
                        $flag = true;
                    }
                }

                if($flag){
                    echo "<span style='color: #ff0000' >Failure as the user name already exists. (it's case sensitive) </span>";
                }
                else{
                    //$hash = password_hash($pwd, PASSWORD_DEFAULT);
                    $hash = md5($pwd);
//                    $stmt = $con->prepare("insert into password (usr, pwd) values (?, ?)");
//                    $stmt->bind_param("ss", $uname, $pwd);
//                    $stmt->execute();
//                    $stmt->close();


                    echo strlen($hash);
                    echo $hash;
                    $usr = $uname;
                    $result = mysqli_query($con, "insert into password (usr, pwd) values ( '$usr', '$hash')");
                    //echo "<span style='color: lightgreen'>User added. Success </span>";

                }
            }


        }
        ?>
    </p>
     <br>
    </div>
    <div>
<!--        <p> Initial Hash : --><?php
//            $con = mysqli_connect('localhost', 'root', 'root', 'project');
//            $hash = password_hash("Blue", PASSWORD_DEFAULT);
//            echo $hash;
//            $usr = "usr";
//            $result - mysqli_query($con, "insert into password (usr, pwd) values ( '$usr', '$hash')")
//
//            ?>
        </p>
        <p> Final Hash : </p>
    </div>
    <div id="output">
        <form id="formoid2" action="loginHandler.php" METHOD="post">
            <div>
                <label class="title">Name:</label>
                <input type="text" id="oname" name="oname" >
            </div>
            <br>
            <div>
                <label class="title">Password:</label>
                <input type="password" name="opassword" id="opassword">
            </div>
            <br>
            <input type="submit" id="submitButton"  name="submit" value="output">
        </form>


    </div>

    <div id="outputR">
        <p> Result: <?php

            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                if($_POST['submit'] == "output"){

                    $uname = $_POST['oname'];
                    $pwd = $_POST['opassword'];
                    $pwd = trim($pwd);
                    $uname = test_input($uname);


                    $flag = true;

                    $con = mysqli_connect('localhost', 'root', 'root', 'project');
                    $result = mysqli_query($con,"select usr from password ");

                    while($row = mysqli_fetch_array($result)){
                        if($row['usr'] == $uname){
                            $flag = false;
                        }
                    }

                    if($flag){
                        echo "<span style='color: #ff0000' >Failure, the username not found. (it's case sensitive) </span>";
                    }
                    else{

                        $result = mysqli_query($con,"select pwd from password where usr='$uname'");
                        $row = mysqli_fetch_array($result);
                        $hashedVal = strval($row['pwd']);



                        //$valid = (md5($pwd) ==  $hashedVal);
                        $valid = password_verify(str($pwd), str($row['pwd']));
                        echo $pwd;
                        echo strlen($pwd);

                        if($valid == TRUE){
                            echo "true";
                        }
                        if($valid == FALSE){
                            echo "false";
                        }
//                        echo md5($pwd);
//
//                        if($valid){
//                            echo "<span style='color: lightgreen'>Correct password, User Found. Success </span>";
//                        }
//                        else
//                            echo "<span style='color: #ff0000' >Failure, The password did not match. (it's case sensitive) </span>";

                    }
                }


            }
            ?>


        </p>
        <br>
    </div>

</div>

</body>
</html>