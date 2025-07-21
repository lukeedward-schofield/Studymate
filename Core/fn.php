<?php 

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
    $_SESSION = [];
    //destroy session
    session_destroy();

    //clear/expire/delete cookie
    $cookieParams = session_get_cookie_params();
    setcookie("PHPSESSID", "", time() - 3600, $ $cookieParams["path"], $cookieParams["domain"], $cookieParams["secure"], $cookieParams["httponly"]);
}

function redirect($route){
    header("location: {$route}");
    exit();
}