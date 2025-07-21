<?php  
namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {

        if(!Validator::validEmail($email)){
            $this->errors["email"] = "Email not valid";
        }

        if(!Validator::validString($password)){
            $this->errors["password"] = "need password";
        }

        return empty($this->errors);
    }

    public function errors()
    {
        return $this->errors;
    }
}