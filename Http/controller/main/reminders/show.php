<?php  
use Core\App;
use Core\Session;

$userid = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$reminders = $db->query("SELECT * FROM reminders WHERE user_id = :user_id", [
    ":user_id" => $userid
])->fetchAll();

//might change this to multiple error variable to show them both, idk tho
$errors = Session::get("input") ?? Session::get("reminder-new");

require "../views/main/reminders.view.php";

