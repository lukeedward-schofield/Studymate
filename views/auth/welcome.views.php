<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href='https://fonts.googleapis.com/css?family=Josefin Slab' rel='stylesheet'>
    <link rel="stylesheet" href="style.css?v=<?= time() ?>">
</head>
<body class="welcome">

    <div class="top-design">
        <img src="/assets/two-dots.png?v=<?= time() ?>" alt="">
        <img src="/assets/paperDesigns.png?v=<?= time() ?>" alt="">
    </div>

    <div class="main">
        <img class="welcome-img" src="assets/studyMate-logo.png" alt="">

        <div class="register-btn-container">
            <div></div>
            <div></div>
            <div></div>
                <a class="register-link" href="/register">REGISTER</a>
        </div>

        <div class="login-btn-container">
            <div></div>
            <div></div>
            <div></div>
                <a class="login-link" href="/login">LOGIN</a>
        </div>            
    </div>

    <div class="bottom-design">
        <img src="/assets/paperDesigns.png?v=<?= time() ?>" alt="">
        <img src="/assets/three-dots.png?v=<?= time() ?>" alt="">
    </div>
</body>
</html>