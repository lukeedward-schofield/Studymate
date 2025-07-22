<?php  
use Core\App;
use Core\Session;
use Http\Forms\UpdateForm;

$reqMethod = $_POST["_method"];

$projectNew = $_POST["project-update"];
$deadlineNew = $_POST["deadline-update"];
$projectId = $_POST["id"];

$db = App::resolve("Core/Database");


$UpdateForm = new UpdateForm();
if(! $UpdateForm->validate($projectNew, $deadlineNew))
{
    $UpdateForm->error("project-new", "Project and deadline input should not be empty");
    Session::flash("project-new", $UpdateForm->errors());
    redirect("/projects");
}


$db->query("UPDATE projects SET project = :project, due_date = :due_date WHERE id = :id",[
    "project" => $projectNew,
    "due_date" => $deadlineNew,
    "id" => $projectId
]);

redirect("/projects");







