<?php  
use Core\Database;
use Core\App;

$db = App::resolve("Core/Database");

$reminderId = $_POST["id"];
$db->query("DELETE FROM reminders WHERE id = :id",[
    "id" => $reminderId
]);

header("location: /reminders");
exit();