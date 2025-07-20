<?php  
use Core\Database;
use Core\Validator;
use Core\App;

$userId = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$project = $_POST["project"];
$deadline = $_POST["deadline"];

//validate
$errors = [];
if(! Validator::validString($project)|| 
   ! Validator::validString($deadline)){
    $errors["input"] = "Project and Deadline input should not be empty";
}

if(! empty($errors))
{
    $projects = $db->query("SELECT * FROM projects WHERE user_id = :user_id", [
        ":user_id" => $userId
    ])->fetchAll();


    require "../views/main/projects.view.php";
    exit();
}

$db->query("INSERT INTO projects (project, due_date, user_id) 
                    VALUES (:project, :due_date, :user_id)", [
                    ":project" => $project,
                    ":due_date" => $deadline,
                    ":user_id" => $userId]);

header("location: /projects");
exit();


