<html>
    <head>
        <title>Aerilon | Admin - Charter</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image-x-icon" href="./resources/favicon.ico">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    </head>
    <body>
        <ul class="topnav_admin">
            <li class="logo"><img src="./resources/logo.svg" width="10%"></li>
        </ul>
        <div class="button_nav">
                <h3>Welcome! Admin</h3>
                <div class="indiv_button">
                    <form action="model_page.php">
                    <button class="btn_add_admin">Model</button>
                    </form>
                </div>
                <div class="indiv_button">
                    <form action="aircraft_page.php">
                    <button class="btn_add_admin">Aircraft</button>
                    </form>
                </div>
                <h4>|</h4>
                <button type="submit" class="btn_add_admin" id="charterBtn">Add Charter<i class='bx bx-plus add'></i></button>
        </div>
        <div class="admin_container">
            <div id="charterModal" class="model_modal">
                <div class="model_modal_content">
                    <span class="close">&times;</span>
                    <form>
                    <h1 style="text-align: center">Add Charter</h1>
                    <div class="model_container">
                        <label>Date</label><br>
                        <input type="date" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Aircraft No.</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Destination</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Hours Flown</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Hours Wait</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container_button">
                        <button type="submit" class="model_btn">Add</button>
                    </div>
                    </form>
                </div>
            </div>
            <table class="tb-container_admin">
                <tr>
                    <th>Trip</th>
                    <th>Date</th>
                    <th>Aircraft No.</th>
                    <th>Destination</th>
                    <th>Distance</th>
                    <th>Hours Flown</th>
                    <th>Hours Wait</th>
                    <th>Action</th>
                </tr>
            </table>
        </div>
        <script src="./js/charterModal.js"></script>
    </body>
</html>