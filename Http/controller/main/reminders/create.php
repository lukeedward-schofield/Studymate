<?php  
use Core\App;
use Core\Session;
use Http\Forms\NoteForm;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve("Core/Database");

$reminder = $_POST["reminder"];
$deadline = $_POST["deadline"];

$NoteForm = new NoteForm(); 
if(! $NoteForm->validate($reminder, $deadline))
{
    $NoteForm->error("input", "Reminder and Deadline input should not be empty");
    Session::flash("input", $NoteForm->errors());
    redirect("/reminders");
}

$db->query("INSERT INTO reminders (reminder, due_date, user_id) 
                    VALUES (:reminder, :due_date, :user_id)", [
                    ":reminder" => $reminder,
                    ":due_date" => $deadline,
                    ":user_id" => $userId]);

redirect("/reminders");