<?php  
use Core\Database;
use Core\Validator;
use Core\App;

$reqMethod = $_POST["_method"];

$taskNew = $_POST["task-update"];
$deadlineNew = $_POST["deadline-update"];
$taskId = $_POST["id"];

$db = App::resolve("Core/Database");


if($reqMethod === "PUT")
{
    $errors = [];

    if(! Validator::validString($taskNew) || !Validator::validString($deadlineNew))
    {
        $errors["task-new"] = "Task and deadline input should not be empty";
    }

    if(! empty($errors))
    {
        $userId = $_SESSION["user"]["id"];
    
        $tasks = $db->query("SELECT * FROM tasks WHERE user_id = :user_id",[
            ":user_id" => $userId
        ]);

        require "../views/main/tasks.view.php";
        exit();
    }

    $db->query("UPDATE tasks SET task = :task, due_date = :due_date WHERE id = :id",[
        "task" => $taskNew,
        "due_date" => $deadlineNew,
        "id" => $taskId
    ]);

    header("location: /tasks");
    exit();
}
else if($reqMethod === "PATCH"){

    $db->query("UPDATE tasks SET finished = 1 WHERE id = :id",[
        ":id" => $taskId
    ]);

    header("location: /tasks");
    exit();
}