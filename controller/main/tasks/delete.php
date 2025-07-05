<?php  
use Core\Database;


$config = require "./../config.php";
$database = new Database($config["database"]);

$taskId = $_POST["id"];

$database->query("DELETE FROM tasks WHERE id = :id",[
                 ":id" => $taskId
]);


header("location: /tasks");
exit();