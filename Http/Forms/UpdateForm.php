<?php  
namespace Http\Forms;

use Core\Validator;

class UpdateForm{

    protected $errors = [];

    public function validate($note, $deadline){
        
        if(! Validator::validString($note) || !Validator::validString($deadline))
        {            
            return false;
        }

        return true;
    }

    public function errors(){
        return $this->errors;
    }

    public function error($field, $value){
        $this->errors[$field] = $value;
    }
}