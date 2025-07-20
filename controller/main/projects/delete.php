<?php  
use Core\Database;
use Core\App;

$db = App::resolve("Core/Database");

$projectId = $_POST["id"];
$db->query("DELETE FROM projects WHERE id = :id",[
    "id" => $projectId
]);

header("location: /projects");
exit();