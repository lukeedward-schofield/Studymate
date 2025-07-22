<?php  
use Core\App;
use Core\Session;
use Http\Forms\UpdateForm;

$reqMethod = $_POST["_method"];

$taskNew = $_POST["task-update"];
$deadlineNew = $_POST["deadline-update"];
$taskId = $_POST["id"];

$db = App::resolve("Core/Database");

$UpdateForm = new UpdateForm();
if(! $UpdateForm->validate($taskNew, $deadlineNew))
{
    $UpdateForm->error("task-new", "Task and deadline input should not be empty");
    Session::flash("task-new", $UpdateForm->errors());
    redirect("/tasks");
}

$db->query("UPDATE tasks SET task = :task, due_date = :due_date WHERE id = :id",[
    "task" => $taskNew,
    "due_date" => $deadlineNew,
    "id" => $taskId
]);

redirect("/tasks");
