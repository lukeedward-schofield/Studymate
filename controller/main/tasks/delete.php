<?php  
use Core\Database;
use Core\App;

$db = App::resolve("Core/Database");

$taskId = $_POST["id"];


$db->query("DELETE FROM tasks WHERE id = :id",[
                 ":id" => $taskId
]);


header("location: /tasks");
exit();