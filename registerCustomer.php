<html>
    <head>
        <title>Aerilon | Search Flights</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image-x-icon" href="./resources/favicon.ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
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
        <div class="customer_container">
            <div class="customer_content">
                <form action="./backend/addCustomer.php" method="post">
                    <h1 style="text-align: center;">Register Customer</h1>
                    <div class="model_container">
                        <label>Last Name</label><br>
                        <input type="text" class="model_input" required name="lName">
                    </div>
                    <div class="model_container">
                        <label>First Name</label><br>
                        <input type="text" class="model_input" required name="fName">
                    </div>
                    <div class="model_container">
                        <label>Initial</label><br>
                        <input type="text" class="model_input" required name="initial">
                    </div>
                    <div class="model_container">
                        <label>Area Code</label><br>
                        <input type="text" class="model_input" required name="areaCode">
                    </div>
                    <div class="model_container">
                        <label>Phone No.</label><br>
                        <input type="text" class="model_input" required name="phone">
                    </div>
                    <div class="model_container_button">
                        <button type="submit" class="model_btn">Register</button>
                    </div>
                </form>
            </div>
        </div>

        <img src="./resources/clouds.svg" class="img-bg">
    </body>
</html>