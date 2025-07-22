<?php



use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;


$email = trim($_POST["email"]);
$password = trim($_POST["password"]); 

$errors = [];

$Form = new LoginForm();
if(! $Form->validate($email, $password)){

    //sets session
    Session::flash("errors", $Form->errors());
    redirect("/login");
}


$Authenticator = new Authenticator();


if (! $Authenticator->attempt($email, $password)){

    $Form->error("user", "A user with that email and password does not exist!");

    Session::flash("errors", $Form->errors());
    
    redirect("/login");
}

redirect("/");


