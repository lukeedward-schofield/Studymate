<?php  



use Core\Database;
use Core\Validator;

$method = $_POST["_method"];

$projectNew = trim($_POST["project-update"]);
$deadlineNew = $_POST["deadline-update"];
$projectId = $_POST["id"];

$config = require"./../config.php";
$database = new Database($config["database"]);


if($method === "PUT")
{
    if(!Validator::validString($projectNew) || !Validator::validString($deadlineNew))
    {
        $errors["project-new"] = "Project and deadline input should not be empty"; 
    }

    if(!empty($errors))
    {
        $userId = $_SESSION["user"]["id"];

        $projects = $database->query("SELECT * FROM projects WHERE user_id = :user_id", [
            ":user_id" => $userId
        ]);

        require "../views/main/projects.view.php";
        exit();
    }

    $database->query("UPDATE projects SET project = :project, due_date = :due_date WHERE id = :id",[
        "project" => $projectNew,
        "due_date" => $deadlineNew,
        "id" => $projectId
    ]);

    header("location: /projects");
    exit();
}
else if($method === "PATCH")
{
    $database->query("UPDATE projects SET finished = 1 WHERE id = :id",[
        ":id" => $projectId
    ]);
    
    header("location: /projects");
    exit();
}




