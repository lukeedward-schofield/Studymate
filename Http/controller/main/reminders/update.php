<?php  
use Core\App;
use Core\Session;
use Http\Forms\UpdateForm;

$reqMethod = $_POST["_method"];

$reminderNew = $_POST["reminder-update"];
$deadlineNew = $_POST["deadline-update"];
$reminderId = $_POST["id"];

$db = App::resolve("Core/Database");

$UpdateForm = new UpdateForm();
if(! $UpdateForm->validate($reminderNew, $deadlineNew))
{
    $UpdateForm->error("reminder-new", "Reminder and deadline input should not be empty");
    Session::flash("reminder-new", $UpdateForm->errors());
    redirect("/reminders");
}

    $db->query("UPDATE reminders SET reminder = :reminder, due_date = :due_date WHERE id = :id",[
        "reminder" => $reminderNew,
        "due_date" => $deadlineNew,
        "id" => $reminderId
    ]);

redirect("/reminders");




