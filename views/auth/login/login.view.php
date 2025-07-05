<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
    <link rel="stylesheet" href="/style.css?v=<?= time() ?>">
</head>
<body class="login-menu">


    <div class="login-container">
        <header class="login-header">
            LOGIN
        </header>

        <form class="login-form" id="login-form" action="/login" method="POST">
            <input type="hidden" name="_method" value="POST">

            <label for="email">email</label>
            <input type="text" name="email" placeholder="email">
            <?php if(isset($errors["email"]) ?? null): ?>
                <p><?= $errors["email"]; ?></p>
            <?php endif; ?>

            <label for="password">password</label>
            <input type="text" name="password" placeholder="password">
            <?php if(isset($errors["password"]) ?? null): ?>
                <p>
                    <?= $errors["password"]; ?>
                </p>
            <?php endif; ?>

            <?php if(isset($errors["user"])): ?>
                <p><?= $errors["user"]; ?></p>
            <?php endif ?>
            
        </form>


        <footer class="login-footer">
            <nav class="go-to-register">
                <p>Don't have an account yet?</p>
                <a href="/register">Create account</a>
            </nav>

            <button form="login-form" type="submit">LOGIN</button>
        </footer>
    </div>
    
    

</body>
</html>

