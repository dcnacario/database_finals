<html>
    <head>
        <title>Aerilon | Admin - Model</title>
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
                    <form action="admin_page.php">
                    <button type="submit" class="btn_add_admin" >Charter</button>
                    </form>
                </div>
                <div class="indiv_button">
                    <button class="btn_add_admin">Aircraft</button>
                </div>
                <h4>|</h4>
                <button class="btn_add_admin" id="modelBtn">Add Model<i class='bx bx-plus add'></i></button>
        </div>
        <div class="admin_container">
            <div id="modelModal" class="model_modal">
                <div class="model_modal_content">
                    <span class="close">&times;</span>
                    <form>
                    <h1 style="text-align: center">Add Model</h1>
                    <div class="model_container">
                        <label>Manufacturer</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Name</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Seats</label><br>
                        <input type="text" class="model_input">
                    </div>
                    <div class="model_container">
                        <label>Charge Mile</label><br>
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
                    <th>Model Code</th>
                    <th>Manufacturer</th>
                    <th>Name</th>
                    <th>Seats</th>
                    <th>Charge Per Mile</th>
                    <th>Action</th>
                </tr>
            </table>
        </div>
        <script src="./js/modelModal.js"></script>
    </body>
</html>