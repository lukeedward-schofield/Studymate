<?php  

namespace Core;

use Core\Database;

class Authenticator
{
    public function attempt($email, $password)
    {
        $db = App::resolve("Core/Database");
        $user = $db->query("SELECT * FROM users WHERE email = :email",[
                           ":email" => $email])->fetch();


        if($user){
            if(! password_verify($password, $user["pass_word"]))
            {
                return false;
            }

            login([
                "id" => $user["id"],
                "name" => $user["user_name"]
            ]);

            return true;
        } 
    }
}