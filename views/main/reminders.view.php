<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css?v=<?= time() ?>"/>
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

    <main>
      <form class="input-form" action="/reminders" method="POST">
        <div class="input-form-container" id="reminder-form-container">

          <input type="hidden" name="_method" value="POST">
          <input type="text" name="reminder" class="input" placeholder="Enter a reminder...">
          <input type="date" name="deadline" class="deadline-input">

          <?php if(isset($errors["input"])): ?>
            <p class="error">
              <?= $errors["input"]; ?>
            </p>
          <?php endif ?>

        </div>
        <button type="submit" class="create-btn">Add Reminder</button>
      </form>

      <?php foreach($reminders as $reminder): ?>
        <li class="list" id="reminder">
        <!-- UPDATE FORM -->
          <form action="/reminders" method="POST" class="update-form" id="update">
              <input type="hidden" name="_method" value="PUT">
              <input type="text" name="reminder-update"  class="update-input <?= $reminder["finished"] == 1 ? "strikethrough" : "" ?>" 
                      value="<?= htmlspecialchars($reminder["reminder"])?>" disabled>
              <input type="date" name="deadline-update" class="update-deadline-input" 
                      value="<?= htmlspecialchars($reminder["due_date"])?>" disabled>

              <?php if(isset($errors["reminder-new"])): ?>
                <p class="error"> <?= $errors["reminder-new"]; ?></p>
              <?php endif; ?>

              <input type="hidden" name="id" value=<?= $reminder["id"]?>>  
          </form>
          <!-- UPDATE FORM -->


          <!-- COMPLETE FORM -->
          <form action="/reminders" method="POST" class="complete-form" id="complete">
            
            <input type="hidden" name="_method" value="PATCH">
            <input type="hidden" name="id" value= <?= $reminder["id"]?>>          
          </form>
          <!-- COMPLETE FORM -->

          
          <!-- DELETE FORM -->
          <form action="/reminders" method="POST" id="delete">          
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="id" value=<?= $reminder["id"]?>>
          </form>
          <!-- DELETE FORM -->

                    
          <!--SUBMISSION BUTTONS -->
          <div class="buttons">
            <?php if($reminder["finished"] === 0): ?>
              <button type="button" name="edit" class="edit-btn">Edit</button>
              <button type="submit" form="update"  name="update" class="hidden-update">Update</button>
            <?php endif; ?>
            
            <button type="submit" form="delete" name="delete" class="delete-btn">Delete</button>

            <?php if($reminder["finished"] === 0): ?>
              <button type="submit" form="complete" name="status" class="complete-btn">Completed</button>
            <?php endif; ?> 
          </div>
          <!--SUBMISSION BUTTONS -->

        </li>
      <?php endforeach ?>
    </main>
        
    <script src="script.js?v=<?= time() ?>"></script>

  </body>
</html>
