<?php  
use Core\Database;


$config = require"./../config.php";
$database = new Database($config["database"]);

$projectId = $_POST["id"];
$database->query("DELETE FROM projects WHERE id = :id",[
    "id" => $projectId
]);

header("location: /projects");
exit();