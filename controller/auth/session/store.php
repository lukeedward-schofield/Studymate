<?php

use Core\Container;
use Core\Database;
use Core\Validator;
use Core\App;

$email = trim($_POST["email"]);
$password = trim($_POST["password"]); 

$errors = [];

if(!Validator::validEmail($email)){
    $errors["email"] = "Email not valid";
}

if(!Validator::validString($password)){
    $errors["password"] = "need password";
}

if(!empty($errors)){

    require "./../views/auth/login/login.view.php";
    exit();
}



$db = App::resolve("Core/Database");


$user = $db->query("SELECT * FROM users WHERE email = :email",[
    ":email" => $email
])->fetch();

if($user){
   if(!password_verify($password, $user["pass_word"]))
   {
     $errors["user"] = "A user with that email and password does not exist!";
     require "./../views/auth/login/login.view.php";
     exit();
   }

   login([
    "id" => $user["id"],
    "name" => $user["user_name"]
   ]);

    header("location: /");
    exit();
} 