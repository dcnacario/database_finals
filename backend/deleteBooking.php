<?php 
    require('../local_setting.php');

    $bookingId = $_POST['bookingId'];

    $sql = "UPDATE booking SET BOOKING_STATUS = 0 WHERE BOOKING_ID = {$bookingId}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../booking_page.php");
?>