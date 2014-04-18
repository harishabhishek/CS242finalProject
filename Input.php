<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/18/14
 * Time: 12:52 AM
 */

session_start();
class Input {

    public function __construct(){

    }

    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data = mysql_real_escape_string($data);
        return $data;
    }

} 