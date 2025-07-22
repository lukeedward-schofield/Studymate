<?php  
use Core\Database;
use Core\App;
use Core\Session;

$userid = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$projects = $db->query("SELECT * FROM projects WHERE user_id = :user_id", [
    ":user_id" => $userid
])->fetchAll();

$errors = Session::get("input") ?? Session::get("project-new");

require "../views/main/projects.view.php";

