<?php  
use Core\Database;
use Core\Validator;
use Core\App;

$userId = $_SESSION["user"]["id"] ?? null;

$db = App::resolve("Core/Database");

$reminder = $_POST["reminder"];
$deadline = $_POST["deadline"];

//validate
$errors = [];
if(! Validator::validString($reminder)|| 
   ! Validator::validString($deadline)){
    $errors["input"] = "Reminder and Deadline input should not be empty";
}


if(! empty($errors))
{
    $reminders = $db->query("SELECT * FROM reminders WHERE user_id = :user_id", [
        ":user_id" => $userId
    ])->fetchAll();


    require "../views/main/reminders.view.php";
    exit();
}

$db->query("INSERT INTO reminders (reminder, due_date, user_id) 
                    VALUES (:reminder, :due_date, :user_id)", [
                    ":reminder" => $reminder,
                    ":due_date" => $deadline,
                    ":user_id" => $userId]);

header("location: /reminders");
exit();