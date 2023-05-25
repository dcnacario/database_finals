<html>
    <head>
        <title>Aerilon | Login</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image-x-icon" href="./resources/favicon.ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    </head>
    <body>
        <ul class="topnav">
        <li class="logo"><a href="./index.php"><img src="./resources/logo.svg" width="10%"></a></li>
            <div class="right_group">
                <li class="right"><a href="login.php">Login</a></li>
            </div>
        </ul>
        <div class="login_container">
        <?php
        // Check if an error message is present in the URL
        if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
            echo '<p style="color: red; text-align: center;">Invalid credentials. Please try again.</p>';
        }
        ?>
            <h2 style="text-align: center;">Login</h2>
            <form method="post" action="./authentication.php">
                <div class="inner_login_container">
                    <div class="username_container">
                        <label>Username</label>
                        <input type="text" name="user" class="login_container"><br>
                    </div>
                    <div class="password_container">
                        <label>Password</label>
                        <input type="password" name="pass" class="login_container"><br>
                    </div>
                    <div class="btn_container">
                        <button type="submit" class="btn_login">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </body>
</html>