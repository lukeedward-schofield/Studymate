<?php  

$router->get("/", "../controller/index.php")->only("auth");

$router->get("/welcome", "../controller/auth/index.php")->only("guest");

$router->get("/register", "../controller/auth/register/create.php")->only("guest");
$router->post("/register", "../controller/auth/register/store.php")->only("guest");

$router->get("/login", "../controller/auth/session/create.php")->only("guest");
$router->post("/login", "../controller/auth/session/store.php")->only("guest");
$router->delete("/logout", "../controller/auth/session/delete.php")->only("auth");


$router->get("/tasks", "../controller/main/tasks/show.php")->only("auth");
$router->post("/tasks", "../controller/main/tasks/create.php")->only("auth");
$router->delete("/tasks", "../controller/main/tasks/delete.php")->only("auth");
$router->put("/tasks", "../controller/main/tasks/update.php")->only("auth");
$router->patch("/tasks", "../controller/main/tasks/update.php")->only("auth");


$router->get("/projects", "../controller/main/projects/show.php")->only("auth");
$router->post("/projects", "../controller/main/projects/create.php")->only("auth");
$router->delete("/projects", "../controller/main/projects/delete.php")->only("auth");
$router->put("/projects", "../controller/main/projects/update.php")->only("auth");
$router->patch("/projects", "../controller/main/projects/update.php")->only("auth");


$router->get("/reminders", "../controller/main/reminders/show.php")->only("auth");
$router->post("/reminders", "../controller/main/reminders/create.php")->only("auth");
$router->delete("/reminders", "../controller/main/reminders/delete.php")->only("auth");
$router->put("/reminders", "../controller/main/reminders/update.php")->only("auth");
$router->patch("/reminders", "../controller/main/reminders/update.php")->only("auth");


// // TESTING
// $router->get("/", "../controller/index.php");

// $router->get("/welcome", "../controller/auth/index.php");

// $router->get("/register", "../controller/auth/register/create.php");
// $router->post("/register", "../controller/auth/register/store.php");

// $router->get("/login", "../controller/auth/session/create.php");
// $router->post("/login", "../controller/auth/session/store.php");
// $router->delete("/logout", "../controller/auth/session/delete.php");


// $router->get("/tasks", "../controller/main/tasks/show.php");
// $router->post("/tasks", "../controller/main/tasks/create.php");
// $router->delete("/tasks", "../controller/main/tasks/delete.php");
// $router->put("/tasks", "../controller/main/tasks/update.php");
// $router->patch("/tasks", "../controller/main/tasks/update.php");


// $router->get("/projects", "../controller/main/projects/show.php");
// $router->post("/projects", "../controller/main/projects/create.php");
// $router->delete("/projects", "../controller/main/projects/delete.php");
// $router->put("/projects", "../controller/main/projects/update.php");
// $router->patch("/projects", "../controller/main/projects/update.php");


// $router->get("/reminders", "../controller/main/reminders/show.php");
// $router->post("/reminders", "../controller/main/reminders/create.php");
// $router->delete("/reminders", "../controller/main/reminders/delete.php");
// $router->put("/reminders", "../controller/main/reminders/update.php");
// $router->patch("/reminders", "../controller/main/reminders/update.php");
