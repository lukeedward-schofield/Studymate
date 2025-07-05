<?php  
use Core\Database;


$userid = $_SESSION["user"]["id"];

$config = require "./../config.php";
$db = new Database($config["database"]);

$projects = $db->query("SELECT * FROM projects WHERE user_id = :user_id", [
    ":user_id" => $userid
])->fetchAll();

require "../views/main/projects.view.php";

