<?php  
use Core\Database;


$userId = $_SESSION["user"]["id"];

$config = require "./../config.php";
$db = new Database($config["database"]);

$tasks = $db->query("SELECT * FROM tasks WHERE user_id = :user_id", [
    ":user_id" => $userId
])->fetchAll();

require "../views/main/tasks.view.php";

