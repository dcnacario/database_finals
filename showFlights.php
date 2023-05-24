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
        <div class="showflight-container">
            <div class="search_container">
                <form action="showFlights.php" method="post">
                <input type="text" name="searchDestination" class="search_bar" placeholder="Search Destination">
                <button type="submit" class="search_button"><i class='bx bx-search bx-xs'></i></button>
                </form>
            </div>
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
                if(mysqli_num_rows($result) > 0) {
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
                <td>
                    <form action="registerCustomer.php">
                        <button type="submit" class="model_btn_edit"><i class='bx bxs-calendar-check'></i></button>
                    </form>
                </td>
            </tr>
            <?php 
                }
            }
            else {
                echo "<tr><td colspan='8' style='text-align: center; font-weight: 600; color: #5F5F5F;, font-size: 24px;'>No Flights Found</td></tr>";
            }
            ?>
        </table>
        <img src="./resources/clouds.svg" class="img-bg">
        </div>
    </body>
</html>