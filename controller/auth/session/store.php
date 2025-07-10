st<?php

use Core\Database;
use Core\Validator;

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

$config = require "./../config.php";

$db = new Database($config["database"]);

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