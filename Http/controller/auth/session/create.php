<?php  
use Core\Session;

//gets session
$errors = Session::get("errors");


require "./../views/auth/login/login.view.php";