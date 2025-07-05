<?php  
use Core\Database;
use Core\Validator;

$reqMethod = $_POST["_method"];

$reminderNew = trim($_POST["reminder-update"]);
$deadlineNew = $_POST["deadline-update"];

$reminderId = $_POST["id"];

$config = require"./../config.php";
$database = new Database($config["database"]);


if($reqMethod === "PUT")
{
    $errors = [];

    if(!Validator::validString($reminderNew) || !Validator::validString($deadlineNew))
    {
        $errors["reminder-new"] = "Reminder and deadline input should not be empty";
    }

    if(!empty($errors))
    {
        $userId = $_SESSION["user"]["id"];

        $reminders = $database->query("SELECT * FROM reminders WHERE user_id = :user_id", [
            ":user_id" => $userId
        ]);

        require "../views/main/reminders.view.php";
        exit();
    }

    $database->query("UPDATE reminders SET reminder = :reminder, due_date = :due_date WHERE id = :id",[
        "reminder" => $reminderNew,
        "due_date" => $deadlineNew,
        "id" => $reminderId
    ]);

    header("location: /reminders");
    exit();
}
else if($reqMethod === "PATCH")
{
    $database->query("UPDATE reminders SET finished = 1 WHERE id = :id",[
        ":id" => $reminderId
    ]);

    header("location: /reminders");
    exit();
}


