<?php  

namespace Core\Middleware;

class Auth{
    public static function handle(){
        if(!isset($_SESSION["user"])){
            header("location: /");
            exit();
        }
    }
}