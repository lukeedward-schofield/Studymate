<?php  
use Core\Database;


$userid = $_SESSION["user"]["id"];

$config = require "./../config.php";
$db = new Database($config["database"]);

$reminders = $db->query("SELECT * FROM reminders WHERE user_id = :user_id", [
    ":user_id" => $userid
])->fetchAll();

require "../views/main/reminders.view.php";

