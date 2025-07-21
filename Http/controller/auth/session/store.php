<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$email = trim($_POST["email"]);
$password = trim($_POST["password"]); 

$errors = [];

$Form = new LoginForm();
if(! $Form->validate($email, $password)){
    $errors = $Form->errors();

    require "./../views/auth/login/login.view.php";
    exit();
}


$Authenticator = new Authenticator();


if (! $Authenticator->attempt($email, $password)){
   
    $errors["user"] = "A user with that email and password does not exist!";
    require "./../views/auth/login/login.view.php";
    exit();
}

redirect("/");


