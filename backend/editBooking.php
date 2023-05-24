<?php 
    require('../local_setting.php');
    $charTrip = $_POST['charTrip'];
    $bookingId = $_POST['bookingId'];
    $payment = $_POST['payment'];

    $resultArray = array();

    $sqlDistance = "SELECT CHAR_DISTANCE, AC_NUMBER FROM charter WHERE CHAR_TRIP = {$charTrip}";
    $resultDistance = $conn->query($sqlDistance);
    while ($rowDistance = mysqli_fetch_array($resultDistance)){
        $resultArray['CHAR_DISTANCE'] = $rowDistance['CHAR_DISTANCE'];
        $resultArray['AC_NUMBER'] = $rowDistance['AC_NUMBER'];
    }

    $sqlPerMile = "SELECT model.MOD_CHG_MILE FROM charter
    INNER JOIN aircraft ON charter.AC_NUMBER = aircraft.AC_NUMBER
    INNER JOIN model ON aircraft.MOD_CODE = model.MOD_CODE
    WHERE charter.CHAR_TRIP = {$charTrip}";
    $resultPerMile = $conn->query($sqlPerMile);
    while ($rowPerMile = mysqli_fetch_array($resultPerMile)){
        $resultArray['MOD_CHG_MILE'] = $rowPerMile['MOD_CHG_MILE'];
    }


    $sql = "UPDATE booking SET CHAR_TRIP = {$charTrip}, PAYMENT = ({$resultArray['CHAR_DISTANCE']}*{$resultArray['MOD_CHG_MILE']}) WHERE BOOKING_ID = {$bookingId}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../booking_page.php");
?>