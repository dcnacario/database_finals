<?php 
    require('../local_setting.php');
    $cosCode = $_REQUEST['cosCode'];
    
    $bookingId = $_POST['bookingId'];
    $searchDestination = $_POST['searchDestination'];

    $sql = "UPDATE booking SET BOOKING_STATUS = 0 WHERE BOOKING_ID = {$bookingId}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../user_page.php?cosCode=$cosCode");
?>