<?php

use Core\Session;

function dd($value){
    echo "<pre>";
     var_dump($value);
    echo "</pre>";

   die();
}

function login($userData = []){
    $_SESSION["user"] = [
        "id" => $userData["id"],
        "name" => $userData["name"]
    ];

    session_regenerate_id(true);
}

function logout(){
    //clear session
    Session::flush();
    //destroy session
    Session::destroy();
}

function redirect($route){
    header("location: {$route}");
    exit();
}