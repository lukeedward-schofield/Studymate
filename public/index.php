<?php  
session_start();
use Core\Router;
use Core\Middleware\Middleware;
use Core\Middleware\Auth;
use Core\Middleware\Guest;


const BASE_PATH = __DIR__ . "\..\\";
require "../Core/fn.php";

spl_autoload_register(function ($class) {
    //made dynamic for different devices
        //i.e different directory separator for macs
    $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);
    

   require BASE_PATH . $class . ".php";
});

require "bootstrap.php";



$router = new Router();
//uses the $router, that is why we create the router object first
require "../routes.php";

//if a modified request method does not exist, the default request method is used
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];
//parse_url to separate path to query string
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];

// dd($_SESSION["user"]);

$router->route($uri, $method);












