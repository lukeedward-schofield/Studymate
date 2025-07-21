<?php 
declare(strict_types=1);
namespace Core;

class Container
{
    protected $bindings = [];
    public function bind($key, $resolver){
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key){
        if(! array_key_exists($key, $this->bindings)){
            //404
            exit();
        }

       $resolver = $this->bindings[$key];
       return call_user_func($resolver);
    }
}
