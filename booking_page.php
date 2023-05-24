<?php 
    require('./backend/fetchBooking.php');


    $sqlTicket = "SELECT charter.CHAR_DESTINATION, charter.CHAR_TRIP, charter.CHAR_DATE, customer.CUS_LNAME, customer.CUS_FNAME, 
    customer.CUS_INITIAL, booking.PAYMENT, charter.AC_NUMBER, booking.BOOKING_ID, booking.BOOKING_STATUS FROM customer
    INNER JOIN booking ON customer.CUS_CODE = booking.CUS_CODE
    INNER JOIN charter ON booking.CHAR_TRIP = charter.CHAR_TRIP";

    $sqlTicketResult = mysqli_query($conn, $sqlTicket);
?>
<html>
    <head>
        <title>Aerilon | Admin - Bookings</title>
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
                    <button class="btn_add_admin">Charter</button>
                    </form>
                </div>
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
                <div class="indiv_button">
                    <form action="customer_page.php">
                    <button class="btn_add_admin">Customer</button>
                    </form>
                </div>
                <div class="indiv_button">
                    <form action="booking_page.php">
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
                                <input type="hidden" name="cusCode" value="<?php echo $customerRow['CUS_CODE'];?>">
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
                        <form action="./backend/editBooking.php" method="post">
                        <input type="hidden" name="bookingId" value="<?php echo $bookingRow['BOOKING_ID']?>">
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
                            <input type="text" class="model_input" name="phone" value="<?php  echo($bookingRow['BOOKING_STATUS'] == 1) ? "Booked":  "Cancelled"?>" readonly>
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