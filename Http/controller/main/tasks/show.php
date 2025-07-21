<?php  
use Core\Database;
use Core\App;

$userId = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$tasks = $db->query("SELECT * FROM tasks WHERE user_id = :user_id", [
    ":user_id" => $userId
])->fetchAll();

require "../views/main/tasks.view.php";

