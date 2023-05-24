<?php 
    require('./local_setting.php');
    require('./backend/fetchUser.php');
    $arrayUser = array();
    $cosCode = $_REQUEST['cosCode'];
    while($row = mysqli_fetch_array($result)){
        $arrayUser['username'] = $row['username'];
    }
    
    // Check if the search form is submitted
    if(isset($_POST['searchDestination'])) {
        $searchDestination = $_POST['searchDestination'];

        $sqlTicket = "SELECT charter.CHAR_DESTINATION, charter.CHAR_TRIP, charter.CHAR_DATE, customer.CUS_LNAME, customer.CUS_FNAME, 
        customer.CUS_INITIAL, booking.PAYMENT, charter.AC_NUMBER, booking.BOOKING_ID, booking.BOOKING_STATUS 
        FROM customer
        INNER JOIN booking ON customer.CUS_CODE = booking.CUS_CODE
        INNER JOIN charter ON booking.CHAR_TRIP = charter.CHAR_TRIP
        WHERE booking.CUS_CODE = '$cosCode'";
    } else {
        $sqlTicket = "SELECT charter.CHAR_DESTINATION, charter.CHAR_TRIP, charter.CHAR_DATE, customer.CUS_LNAME, customer.CUS_FNAME, 
        customer.CUS_INITIAL, booking.PAYMENT, charter.AC_NUMBER, booking.BOOKING_ID, booking.BOOKING_STATUS 
        FROM customer
        INNER JOIN booking ON customer.CUS_CODE = booking.CUS_CODE
        INNER JOIN charter ON booking.CHAR_TRIP = charter.CHAR_TRIP
        WHERE booking.CUS_CODE = '$cosCode'";
    }

    $sqlTicketResult = mysqli_query($conn, $sqlTicket);
?>
<html>
    <head>
        <title>Aerilon | Hello! <?php echo $arrayUser['username']?></title>
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
                <h3>Welcome! <?php echo $arrayUser['username']?></h3>
                <div class="indiv_button">
                    <form action="user_page.php">
                    <button class="btn_add_admin">Booking</button>
                    </form>
                </div>
                <h4>|</h4>
                <div style="padding-left: 0.5%;">
                <form action="./backend/logout.php">
                <button type="submit" class="btn_logout_admin">Logout</button>
                </form>
                </div>
        </div>
        <table class="tb-container_admin">
                <tr>
                    <th>Booking ID.</th>
                    <th>Trip No.</th>
                    <th>Aircraft No.</th>
                    <th>Date</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Destination</th>
                    <th>Payment</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
                <div class="search_container">
                    <form action="booking_page.php" method="post">
                        <input type="text" name="searchDestination" class="search_bar" placeholder="Search Booking ID">
                        <button type="submit" class="search_button"><i class='bx bx-search bx-xs'></i></button>
                    </form>
                </div>
                
                <?php 

                    while($bookingRow = mysqli_fetch_array($sqlTicketResult)) {
                        $modalId = "editBooking_" . $bookingRow['BOOKING_ID'];
                ?>
                <tr>
                    <td><?php echo $bookingRow['BOOKING_ID']?></td>
                    <td><?php echo $bookingRow['CHAR_TRIP']?></td>
                    <td><?php echo $bookingRow['AC_NUMBER']?></td>
                    <td>
                        <?php
                        $date = $bookingRow['CHAR_DATE'];
                        $formatteddate = date('Y-m-d',strtotime($date));
                        echo $formatteddate;
                        ?>
                    </td>
                    <td><?php echo $bookingRow['CUS_LNAME']?></td>
                    <td><?php echo $bookingRow['CUS_FNAME']?></td>
                    <td><?php echo $bookingRow['CHAR_DESTINATION']?></td>
                    <td><?php echo $bookingRow['PAYMENT']?></td>
                    <td>
                        <?php  
                            if($bookingRow['BOOKING_STATUS'] == 1){
                                echo "Booked";
                            }
                            else {
                                echo "Cancelled";
                            }
                        ?>
                    </td>
                    <td>
                        <div class="button_content">
                        <button class="model_btn_edit" data-modal-id="<?php echo $modalId; ?>"><i class='bx bxs-edit'></i></button>
                            <form action="./backend/deleteBooking.php" method="post">  
                                <input type="hidden" name="searchDestination" class="search_bar" placeholder="Search Booking ID">
                                <input type="hidden" name="bookingId" value="<?php echo $bookingRow['BOOKING_ID'];?>">
                                <button type="submit" class="model_btn_delete"><i class='bx bx-trash' ></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- Edit Model Modal -->
                <div id="<?php echo $modalId; ?>" class="model_modal">
                    <!-- Modal content -->
                    <div class="model_modal_content">
                        <span class="close">&times;</span>
                        <form action="./backend/editBooking_user.php?cosCode=<?php echo $cosCode?>" method="post">
                        <input type="hidden" name="bookingId" value="<?php echo $bookingRow['BOOKING_ID']?>">
                        <input type="hidden" name="cosCode" value="<?php echo $cosCode?>">
                        <h1 style="text-align: center">Edit Booking</h1>
                        <div class="model_container">
                            <label>Charter No.</label><br>
                            <select name="charTrip" class="model_input">
                            <?php 
                                require("./backend/fetchCharter.php");
                                while($charterRow = mysqli_fetch_array($resultCharter)){
                            ?>
                                <option value="<?php echo $charterRow['CHAR_TRIP']?>" <?php if ($bookingRow['CHAR_TRIP'] == $charterRow['CHAR_TRIP']) echo 'selected';?>><?php echo $charterRow['CHAR_TRIP']?></option>
                                <?php 
                                }
                            ?>
                            </select>
                        </div>
                        <div class="model_container">
                            <label>Aircraft No.</label><br>
                            <input type="text" class="model_input" name="lName" value="<?php echo $bookingRow['AC_NUMBER']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>Date</label><br>
                            <input type="text" class="model_input" name="fName" value="<?php echo $bookingRow['CHAR_DATE']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>Last Name</label><br>
                            <input type="text" class="model_input" name="initial" value="<?php echo $bookingRow['CUS_LNAME']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>First Name</label><br>
                            <input type="text" class="model_input" name="areaCode" value="<?php echo $bookingRow['CUS_FNAME']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>Destination</label><br>
                            <input type="text" class="model_input" name="phone" value="<?php echo $bookingRow['CHAR_DESTINATION']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>Payment</label><br>
                            <input type="text" class="model_input" name="phone" value="<?php echo $bookingRow['PAYMENT']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>STATUS</label><br>
                            <select name="status" class="model_input">
                                <option value="0">Cancelled</option>
                                <option value="1">Booked</option>
                            </select>
                        </div>
                        <div class="model_container_button">
                            <button type="submit" class="model_btn">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
                <?php 
                    }
               ?>
            </table>
        </div>
        <script src="./js/editCustomer.js"></script>
    </body>
</html>