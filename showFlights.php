<?php 
    require('local_setting.php');
    $destination = $_POST['searchDestination'];

    $sql = "SELECT * FROM charter WHERE CHAR_DESTINATION LIKE '%{$destination}%'";
    $result = mysqli_query($conn, $sql);  
?>
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
            <li class="logo"><img src="./resources/logo.svg" width="10%"></li>
            <div class="right_group">
                <li class="right_search"><input type="text" placeholder="Search" class="search_bar"></li>
                <li class="right"><a href="#">Meet the Crew</a></li>
            </div>
        </ul>
        <div class="showflight-container">
        <span class="showflight-text">The world is yours to <span class="showflight-colored">EXPLORE</span></span>
        <table class="tb-container">
            <tr>
                <th>Trip</th>
                <th>Date</th>
                <th>Aircraft Number</th>
                <th>Destination</th>
                <th>Distance</th>
                <th>Hours Flown</th>
                <th>Hours Wait</th>
                <th>Book Now</th>
            </tr>
            <?php 
                while($row = mysqli_fetch_array($result)){

            ?>
            <tr>
                <td><?php echo $row['CHAR_TRIP']?></td>
                <td><?php echo date(('Y-m-d'),strtotime($row['CHAR_DATE']))?></td>
                <td><?php echo $row['AC_NUMBER']?></td>
                <td><?php echo $row['CHAR_DESTINATION']?></td>
                <td><?php echo $row['CHAR_DISTANCE']?></td>
                <td><?php echo $row['CHAR_HOURS_FLOWN']?></td>
                <td><?php echo $row['CHAR_HOURS_WAIT']?></td>
            </tr>
            <?php 
            }
            ?>
        </table>
        <img src="./resources/clouds.svg" class="img-bg">
        </div>
    </body>
</html>