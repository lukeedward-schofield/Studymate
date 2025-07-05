<?php  
use Core\Database;


$config = require"./../config.php";
$database = new Database($config["database"]);

$reminderId = $_POST["id"];
$database->query("DELETE FROM reminders WHERE id = :id",[
    "id" => $reminderId
]);

header("location: /reminders");
exit();