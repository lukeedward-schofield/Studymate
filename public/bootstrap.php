<?php  

use Core\Container;
use Core\Database;
use Core\App;
use Core\Validator;




$container = new Container();

App::setContainer($container);


App::bind("Core/Database", function () {
    $config = require "../config.php";

    return new Database($config["database"]);
});





