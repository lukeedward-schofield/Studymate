<?php  



use Core\Database;
use Core\Validator;
use Core\App;

$reqMethod = $_POST["_method"];

$projectNew = $_POST["project-update"];
$deadlineNew = $_POST["deadline-update"];
$projectId = $_POST["id"];

$db = App::resolve("Core/Database");


if($reqMethod === "PUT")
{
    $errors = [];

    if(! Validator::validString($projectNew) || ! Validator::validString($deadlineNew))
    {
        $errors["project-new"] = "Project and deadline input should not be empty"; 
    }

    if(! empty($errors))
    {
        $userId = $_SESSION["user"]["id"];

        $projects = $db->query("SELECT * FROM projects WHERE user_id = :user_id", [
            ":user_id" => $userId
        ]);

        require "../views/main/projects.view.php";
        exit();
    }

    $db->query("UPDATE projects SET project = :project, due_date = :due_date WHERE id = :id",[
        "project" => $projectNew,
        "due_date" => $deadlineNew,
        "id" => $projectId
    ]);

    header("location: /projects");
    exit();
}
else if($reqMethod === "PATCH")
{
    $db->query("UPDATE projects SET finished = 1 WHERE id = :id",[
        ":id" => $projectId
    ]);
    
    header("location: /projects");
    exit();
}




