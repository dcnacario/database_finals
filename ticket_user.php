<?php 
    require('./local_setting.php');
    $bookId = $_GET['bookId'];
    $cusCode = $_GET['cusCode'];

    $sqlTicket = "SELECT charter.CHAR_DESTINATION, charter.CHAR_TRIP, charter.CHAR_DATE, customer.CUS_LNAME, customer.CUS_FNAME, 
    customer.CUS_INITIAL, booking.PAYMENT, charter.AC_NUMBER FROM customer
    INNER JOIN booking ON customer.CUS_CODE = booking.CUS_CODE
    INNER JOIN charter ON booking.CHAR_TRIP = charter.CHAR_TRIP 
    WHERE booking.BOOKING_ID = '{$bookId}'";

    $sqlTicketResult = mysqli_query($conn, $sqlTicket);


?>
<html>
    <head>
        <title>Aerilon | Your Ticket</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image-x-icon" href="./resources/favicon.ico">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    </head>
    <body>
        <ul class="topnav">
            <li class="logo"><a href="./index.php"><img src="./resources/logo.svg" width="10%"></a></li>
            <div class="right_group">
            </div>
        </ul>
        <div class="container_ticket">
            <div class="subcontainer_ticket">
            <span class="container_h2">Ticket</span>
            <span class="container_icon"><i class='bx bxs-plane bx-rotate-90 bx-md' ></i></i></span>
            <span class="container_from">Cebu</span>
            <span class="container_from_large">CEBU</span>
            <?php 
            while($rowTicket = mysqli_fetch_array($sqlTicketResult)){
        
            ?>
            <span class="container_to"><?php echo $rowTicket['CHAR_DESTINATION']?></span>
            <span class="container_to_large"><?php echo $rowTicket['CHAR_DESTINATION']?></span>
            </div>
            <div class="subcontainer_bottom">
                <span class="container_charter">Charter No.</span>
                <span class="container_charter_content"><?php echo $rowTicket['CHAR_TRIP']?></span>
                <span class="container_passenger">Passenger</span>
                <span class="container_passenger_content"><?php echo $rowTicket['CUS_FNAME']?> <?php echo $rowTicket['CUS_INITIAL']?> <?php echo $rowTicket['CUS_LNAME']?></span>
                <span class="container_date">Date</span>
                <span class="container_date_content">
                    <?php 
                        $date = $rowTicket['CHAR_DATE'];
                        $formatteddate = date('Y-m-d',strtotime($date));
                        echo $formatteddate;
                    ?>
                </span>
                <span class="container_payment">Payment</span>
                <span class="container_payment_content">₱<?php echo $rowTicket['PAYMENT']?></span>
                <span class="container_aircraft">Aircraft No.</span>
                <span class="container_aircraft_content"><?php echo $rowTicket['AC_NUMBER']?></span>
            </div>
            <div class="ticket_btn_container">
            <form action="user_page.php">
                <input type="hidden" name="cosCode" value="<?php echo $cusCode?>">
                <button type="submit" class="btn_ticket">OK</button>
            </form>
            </div>
            <?php 
                }
            ?>
        </div>
    </body>
</html>