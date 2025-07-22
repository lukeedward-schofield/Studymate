<?php  
    use Core\App;    

    $db = App::resolve("Core/Database");
    $reminderId = $_POST["id"];

    $db->query("UPDATE reminders SET finished = 1 WHERE id = :id",[
        ":id" => $reminderId
    ]);

redirect("/reminders");