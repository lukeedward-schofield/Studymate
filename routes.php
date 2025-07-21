<?php  


$router->get("/", "../Http/controller/auth/index.php")->only("guest");

$router->get("/register", "../Http/controller/auth/register/create.php")->only("guest");
$router->post("/register", "../Http/controller/auth/register/store.php")->only("guest");

$router->get("/login", "../Http/controller/auth/session/create.php")->only("guest");
$router->post("/login", "../Http/controller/auth/session/store.php")->only("guest");
$router->delete("/logout", "../Http/controller/auth/session/delete.php")->only("auth");


$router->get("/tasks", "../Http/controller/main/tasks/show.php")->only("auth");
$router->post("/tasks", "../Http/controller/main/tasks/create.php")->only("auth");
$router->delete("/tasks", "../Http/controller/main/tasks/delete.php")->only("auth");
$router->put("/tasks", "../Http/controller/main/tasks/update.php")->only("auth");
$router->patch("/tasks", "../Http/controller/main/tasks/update.php")->only("auth");


$router->get("/projects", "../Http/controller/main/projects/show.php")->only("auth");
$router->post("/projects", "../Http/controller/main/projects/create.php")->only("auth");
$router->delete("/projects", "../Http/controller/main/projects/delete.php")->only("auth");
$router->put("/projects", "../Http/controller/main/projects/update.php")->only("auth");
$router->patch("/projects", "../Http/controller/main/projects/update.php")->only("auth");


$router->get("/reminders", "../Http/controller/main/reminders/show.php")->only("auth");
$router->post("/reminders", "../Http/controller/main/reminders/create.php")->only("auth");
$router->delete("/reminders", "../Http/controller/main/reminders/delete.php")->only("auth");
$router->put("/reminders", "../Http/controller/main/reminders/update.php")->only("auth");
$router->patch("/reminders", "../Http/controller/main/reminders/update.php")->only("auth");


// // TESTING
// $router->get("/", "../Http/controller/index.php");

// $router->get("/welcome", "../Http/controller/auth/index.php");

// $router->get("/register", "../Http/controller/auth/register/create.php");
// $router->post("/register", "../Http/controller/auth/register/store.php");

// $router->get("/login", "../Http/controller/auth/session/create.php");
// $router->post("/login", "../Http/controller/auth/session/store.php");
// $router->delete("/logout", "../Http/controller/auth/session/delete.php");


// $router->get("/tasks", "../Http/controller/main/tasks/show.php");
// $router->post("/tasks", "../Http/controller/main/tasks/create.php");
// $router->delete("/tasks", "../Http/controller/main/tasks/delete.php");
// $router->put("/tasks", "../Http/controller/main/tasks/update.php");
// $router->patch("/tasks", "../Http/controller/main/tasks/update.php");


// $router->get("/projects", "../Http/controller/main/projects/show.php");
// $router->post("/projects", "../Http/controller/main/projects/create.php");
// $router->delete("/projects", "../Http/controller/main/projects/delete.php");
// $router->put("/projects", "../Http/controller/main/projects/update.php");
// $router->patch("/projects", "../Http/controller/main/projects/update.php");


// $router->get("/reminders", "../Http/controller/main/reminders/show.php");
// $router->post("/reminders", "../Http/controller/main/reminders/create.php");
// $router->delete("/reminders", "../Http/controller/main/reminders/delete.php");
// $router->put("/reminders", "../Http/controller/main/reminders/update.php");
// $router->patch("/reminders", "../Http/controller/main/reminders/update.php");
