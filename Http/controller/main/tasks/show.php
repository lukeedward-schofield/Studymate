<?php  
use Core\App;
use Core\Session;

$userId = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$tasks = $db->query("SELECT * FROM tasks WHERE user_id = :user_id", [
    ":user_id" => $userId
])->fetchAll();

//might change this to multiple error variable to show them both, idk tho
$errors = Session::get("input") ?? Session::get("task-new");

require "../views/main/tasks.view.php";

