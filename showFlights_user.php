<?php
    require('./local_setting.php');
    require('./backend/fetchUser.php');
    require('./backend/fetchBooking.php');


    $arrayUser = array();
    $cosCode = $_REQUEST['cosCode'];
    $sql = "SELECT * FROM booking WHERE CUS_CODE = '$cosCode'";
    $sqlResult = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_array($sqlResult)){
        $arrayUser['CHAR_TRIP'] = $row['CHAR_TRIP'];
        $arrayUser['CUS_CODE'] = $row['CUS_CODE'];
    }

    while($row = mysqli_fetch_array($result)){
        $arrayUser['username'] = $row['username'];
    }

    // Check if the search form is submitted
    if(isset($_POST['searchDestination'])) {
        $destination = $_POST['searchDestination'];

        $sql = "SELECT * FROM charter WHERE CHAR_DESTINATION LIKE '%$destination%'";
        $result = mysqli_query($conn, $sql);
    } else {
        // If the search form is not submitted, retrieve all charters
        $sql = "SELECT * FROM charter";
        $result = mysqli_query($conn, $sql);
    }
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
        <ul class="topnav_admin">
            <li class="logo"><img src="./resources/logo.svg" width="10%"></li>
        </ul>
        <div class="button_nav">
            <h3>Welcome! <?php echo $arrayUser['username']?></h3>
            <div class="indiv_button">
                <form action="user_page.php">
                    <input type="hidden" name="cosCode" value="<?php echo $cosCode?>">
                    <button class="btn_add_admin">Booking</button>
                </form>
            </div>
            <h4>|</h4>
            <form action="showFlights_user.php">
                <input type="hidden" name="cosCode" value="<?php echo $cosCode?>">
                <button type="submit" class="btn_add_admin" id="charterBtn">Book a Flight<i class='bx bx-plus add'></i></button>
            </form>
            <div style="padding-left: 0.5%;">
                <form action="./backend/logout.php">
                    <button type="submit" class="btn_logout_admin">Logout</button>
                </form>
            </div>
        </div>
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
                    <form action="./backend/booking_user.php" method="post">
                        <input type="hidden" name="charTrip" value="<?php echo $row['CHAR_TRIP']?>">
                        <input type="hidden" name="cusCode" value="<?php echo $cosCode?>">
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
    </body>
</html>
