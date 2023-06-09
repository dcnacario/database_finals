<html>
    <head>
        <title>Aerilon | Search Flights</title>
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
        <!-- Book now -->
        <div class="content-container">
            <div class="content-item" id="content-item">
                <form action="showFlights.php" method="post">
                    <div class="content-origin">
                    <span class="p-flight"><i class="material-icons">flight</i>Flight</span>
                    <span class="sp-flight-to">To</span>
                    <input type="text" placeholder="Cebu" class="content-textbox-origin" readonly>
                    </div>
                    <div class="content-destination">
                    <span class="sp-flight-to">From</span>
                    <input type="text" placeholder="Destination" class="content-textbox-destination" name="searchDestination">
                    </div>
                    <div class="content-button">
                    <button type="submit" class="btn-flight">Search flight</button>
                    </div>
                </form>
            </div> 
        </div>
        <span class="content-text">The world is yours to <span class="content-colored">EXPLORE</span></span>
        <div class="content2">
        <div class="sub-content2">      
        </div>
        </div>
    </div>
</html>