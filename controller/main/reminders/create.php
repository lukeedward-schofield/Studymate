<?php  
use Core\Database;
use Core\Validator;

$userId = $_SESSION["user"]["id"];

$config = require  "./../config.php";
$db = new Database($config["database"]);

$reminder = trim($_POST["reminder"]);
$deadline = $_POST["deadline"];

//validate
$errors = [];
if(Validator::validString($reminder) == false || 
   Validator::validString($deadline) == false){
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