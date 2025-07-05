<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css?v=<?= time() ?>">
</head>
<body>
    
    <header class="main-header">
        <img class="main-img" src="assets/studyMate-logo.png" alt="">
        
        <form class="logout-btn" action="/logout" method="POST">
             <input type="hidden" name="_method" value="DELETE">
             <button>LOGOUT</button>
        </form>        
    </header>
    
    <nav class="main-nav">
        <div>
            <a href="/tasks">TASKS</a>
        </div>

        <div>
            <a href="/projects">PROJECTS</a>
        </div>
        
        <div>
            <a href="/reminders">REMINDERS</a>
        </div>
    
    </nav>

</body>
</html>