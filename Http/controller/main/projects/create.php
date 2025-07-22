<?php  
use Core\App;
use Core\Session;
use Http\Forms\NoteForm;


$userId = $_SESSION["user"]["id"];

$db = App::resolve("Core/Database");

$project = $_POST["project"];
$deadline = $_POST["deadline"];

//validate
$NoteForm = new NoteForm(); 
if(! $NoteForm->validate($project, deadline: $deadline))
{
    $NoteForm->error("input", "Project and Deadline input should not be empty");
    Session::flash("input", $NoteForm->errors());
    redirect("/projects");
}

$db->query("INSERT INTO projects (project, due_date, user_id) 
                    VALUES (:project, :due_date, :user_id)", [
                    ":project" => $project,
                    ":due_date" => $deadline,
                    ":user_id" => $userId]);

redirect("/projects");


