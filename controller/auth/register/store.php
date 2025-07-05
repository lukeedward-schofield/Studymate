<?php

use Core\Database;  
use Core\Validator;

$username = trim($_POST["username"]);
$email = trim($_POST["email"]);
$password = trim($_POST["password"]);

$errors = [];

//input validation
if(!Validator::validString($username)){
    $errors["username"] = "need username";
}

if(!Validator::validEmail($email)){
    $errors["email"] = "Email not valid";
}

if(!Validator::validString($password)){
    $errors["password"] = "need password";
}

if(!empty($errors)){

    require "./../views/auth/register/register.view.php";
    exit();
}


//database validation
$config = require "./../config.php";

$db = new Database($config["database"]);

//check if email already exists
$user = $db->query("SELECT * FROM users WHERE email = :email",[
    ":email" => $email
])->fetch(); 

    //if no. redirect to login
if($user){

    $errors["user"] = "A user with that email already exists. Want to login?";
    require "./../views/auth/register/register.view.php";
    exit();
}

$db->query("INSERT INTO users (user_name, email, pass_word)
                   VALUES (:user_name, :email, :pass_word)", [
                    ":user_name" => $username,
                    ":email" => $email,
                    ":pass_word" => password_hash($password, PASSWORD_DEFAULT)
                ]);

$userId = $db->connection->lastInsertId();

    //if yes, redirect to home menu
login([
    "id" => $userId,
    "name" => $username
]);

header("location: /");
exit();
