<?php  
namespace Http\Forms;

use Core\Validator;

class LoginForm
{
    protected $errors = [];
    public function validate($email, $password)
    {

        if(!Validator::validEmail($email)){
            $this->error("email", "Email not valid");
        }

        if(!Validator::validString($password)){
            $this->error("password", "Need password");
        }

        return empty($this->errors);
    }

    public function error($field, $value){
        $this->errors[$field] = $value;
    }

    public function errors()
    {
        return $this->errors;
    }
}