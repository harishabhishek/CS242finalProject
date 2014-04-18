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
</head>
<body class="back">
<div>
    <p class="banner"> <a href="login.php" class="nounderline"> MusicMate.com</a></p>
</div>



<div id="formdiv">
    <form id="formoid" action="thanks.php">
        <div>
            <label class="title">Email:</label>
            <input type="text" name="email" id="email">
        </div>
<!--        <div>-->
<!--            <label class="title">Password:</label>-->
<!--            <input type="password" name="pword" id="pword">-->
<!--        </div>-->
        <br>

        <div >
            <input type="submit" id="submitButton"  name="submitButton" value="Submit" class="submitbuton">
        </div>
    </form>

    <script type='text/javascript'>
        /* attach a submit handler to the form */
        $("#formoid").submit(function(event) {

            /* stop form from submitting normally */
            event.preventDefault();

            /* get some values from elements on the page: */
            var $form = $( this ),
                url = $form.attr( 'action' );


            /* Send the data using post */
            var posting = $.post( url, { email: $('#email').val() } );

            /* Put the results in a div */
            posting.done(function( data ) {
                $("#div1").load("thanks.php");
                $("#div1").height("100px");

                alert('The server was successfully reached');



            });

            /* Put the results in a div */
            posting.error(function( data ) {
                alert('There was some error in the Comment');
            });

        });
    </script>
</div>

<div id ="div1"> </div>
</body>
</html>