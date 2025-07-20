<?php  
use Core\Database;
use Core\App;


$userid = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$projects = $db->query("SELECT * FROM projects WHERE user_id = :user_id", [
    ":user_id" => $userid
])->fetchAll();

require "../views/main/projects.view.php";

