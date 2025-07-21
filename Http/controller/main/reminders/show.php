<?php  
use Core\Database;
use Core\App;


$userid = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$reminders = $db->query("SELECT * FROM reminders WHERE user_id = :user_id", [
    ":user_id" => $userid
])->fetchAll();

require "../views/main/reminders.view.php";

