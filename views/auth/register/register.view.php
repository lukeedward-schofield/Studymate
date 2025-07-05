<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css?v=<?= time() ?>">
</head>
<body class="register-menu">



    <div class="register-container">
        <header class="register-header">
            REGISTER
        </header>

        <form class="register-form" id="register-form" action="/register" method="POST">
            <input type="hidden" name="_method" value="POST">

            <label for="username">username</label>
            <input type="text" name="username" placeholder="username">
            <?php if(isset($errors["username"])): ?>
                <p><?= $errors["username"];?></p>
            <?php endif; ?>

            <label for="email">email</label>
            <input type="text" name="email" placeholder="email">
            <?php if(isset($errors["email"])): ?>
                <p><?= $errors["email"]?></p>    
            <?php endif; ?>

            <label for="password">password</label>
            <input type="text" name="password" placeholder="password">
            <?php if(isset($errors["password"])): ?>
                <p><?= $errors["password"]?></p>
            <?php endif; ?>


            <?php if(isset($errors["user"]) ?? null): ?>
                <p><?= $errors["user"]; ?></p>
            <?php endif; ?>
            
        </form>

        <footer class="register-footer">
            <nav class="go-to-login">
                    <p>Already have an account?</p>
                    <a href="/login">Login</a>
            </nav>

            <button form="register-form" type="submit">REGISTER</button>
        </footer>
        
    </div>

    
</body>
</html>