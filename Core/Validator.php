<?php  
namespace Core;

class Validator{

    public static function validEmail($email){

        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validString($value, $min = 0, $max = INF){


        return strlen($value) > $min || strlen($value) > $max;
    }

    // public static function validString($value, $min = 0, $max = INF) {
    // $length = strlen($value);
    // return $length >= $min && $length <= $max;
// }
}


