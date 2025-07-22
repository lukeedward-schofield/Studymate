<?php  
use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve("Core/Database");

$task = $_POST["task"];
$deadline = $_POST["deadline"];

$NoteForm = new NoteForm(); 
if(! $NoteForm->validate($task, $deadline))
{
    $NoteForm->error("input", "Task and Deadline input should not be empty");
    Session::flash("input", $NoteForm->errors());
    redirect("/tasks");
}

$db->query("INSERT INTO tasks (task, due_date, user_id) 
                    VALUES (:task, :due_date, :user_id)", [
                    ":task" => $task,
                    ":due_date" => $deadline,
                    ":user_id" => $userId]);

redirect("/tasks");




