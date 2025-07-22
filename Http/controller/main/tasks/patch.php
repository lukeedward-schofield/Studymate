<?php  
use Core\App;    

$db = App::resolve("Core/Database");
$taskId = $_POST["id"];

$db->query("UPDATE tasks SET finished = 1 WHERE id = :id",[
    ":id" => $taskId
]);

redirect("/tasks");