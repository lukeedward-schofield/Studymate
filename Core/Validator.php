<?php  
namespace Core;

class Validator{

    public static function validEmail($email){
        $string = trim($email);

        return filter_var($string, FILTER_VALIDATE_EMAIL);
    }

    public static function validString($value, $min = 0, $max = INF){

        $string = trim($value);

        return strlen($string) > $min || strlen($string) > $max;
    }
}


