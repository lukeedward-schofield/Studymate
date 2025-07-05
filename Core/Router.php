<?php  
declare(strict_types=1);
namespace Core;

use Core\Middleware\Middleware;


class Router{
    public $routes = [];   

    public function route( $uri,  $method):void
    {
        foreach($this->routes as $route)
        {
            if($route["uri"] === $uri && 
               $route["method"] === strtoupper(string: $method) )
            {
               if($route["middleware"])
               {
                $middleware = Middleware::MAP[$route["middleware"]]; 
                $middleware::handle();
               }
               
                require $route["controller"];
            }

        }
    }

     public function only($middleware){
        $this->routes[array_key_last($this->routes)]["middleware"] = $middleware;
     }

    public function add($uri, $controller, $method)
    {   
        $this->routes[] =
        [
            "uri" => $uri,
            "controller" => $controller,
            "method" => $method,
            "middleware" => null
        ];

        return $this;
    }
    
    public function get( $uri,  $controller)
        {
          return $this->add($uri, $controller, "GET");
        }

        public function post( $uri,  $controller)
        {
           return $this->add($uri, $controller, "POST");
        }

        public function put( $uri,  $controller)
        {
           return $this->add($uri, $controller, "PUT");
        }

        public function patch( $uri,  $controller)
        {
           return $this->add($uri, $controller, "PATCH");
        }

        public function delete( $uri,  $controller)
        {
           return $this->add($uri, $controller, "DELETE");
        }
}