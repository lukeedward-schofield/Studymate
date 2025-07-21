<?php  
use Core\Database;
use Core\Validator;
use COre\App;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve("Core/Database");

$task = $_POST["task"];
$deadline = $_POST["deadline"];

//validate
$errors = [];
if(! Validator::validString($task)|| 
   ! Validator::validString($deadline)){
    $errors["input"] = "Task and Deadline input should not be empty";
}

if(! empty($errors))
{
    $tasks = $db->query("SELECT * FROM tasks WHERE user_id = :user_id", [
        ":user_id" => $userId
    ])->fetchAll();


    require "../views/main/tasks.view.php";
    exit();
}

$db->query("INSERT INTO tasks (task, due_date, user_id) 
                    VALUES (:task, :due_date, :user_id)", [
                    ":task" => $task,
                    ":due_date" => $deadline,
                    ":user_id" => $userId]);

header("location: /tasks");
exit();




