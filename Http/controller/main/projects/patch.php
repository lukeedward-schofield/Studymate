<?php  
    use Core\App;

    $db = App::resolve("Core/Database");
    $projectId = $_POST["id"];

    $db->query("UPDATE projects SET finished = 1 WHERE id = :id",[
        ":id" => $projectId
    ]);
    
    header("location: /projects");
    exit();