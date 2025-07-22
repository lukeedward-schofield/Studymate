<?php  

namespace Core;

class Session{


    public static function put($key, $value){  
        $_SESSION[$key] = $value;
    }

    public static function get($key){
        return $_SESSION["_flash"][$key] ?? $_SESSION[$key] ?? null;
    }

    public static function flash($key, $value){

        $_SESSION["_flash"][$key] = $value;
    }

    public static function unflash(){
        unset($_SESSION["_flash"]);
    }

    public static function flush(){
        $_SESSION = [];
    }

    public static function destroy(){
        session_destroy();

        //clear/expire/delete cookie
        $cookieParams = session_get_cookie_params();
        setcookie("PHPSESSID", "", time() - 3600, $ $cookieParams["path"], $cookieParams["domain"], $cookieParams["secure"], $cookieParams["httponly"]);

    }
}