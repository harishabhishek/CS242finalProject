<?php
/**
 * Created by IntelliJ IDEA.
 * User: new
 * Date: 4/11/14
 * Time: 12:47 AM
 */

class User {

    public $fname;
    public $lname;
    public $email;
    public $password;

    function __construct(){
        $this->email='default@test.com';
        $this->fname='John';
        $this->lname='Doe';
        $this->password='pwd';
    }


} 