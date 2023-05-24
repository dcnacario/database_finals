<?php 
    require('../local_setting.php');
    $cusCode = $_GET['cusCode'];
    $charTrip = $_GET['charTrip'];

    $resultArray = array();

    $sqlDistance = "SELECT CHAR_DISTANCE, AC_NUMBER FROM charter WHERE CHAR_TRIP = {$charTrip}";
    $resultDistance = $conn->query($sqlDistance);
    while ($rowDistance = mysqli_fetch_array($resultDistance)){
        $resultArray['CHAR_DISTANCE'] = $rowDistance['CHAR_DISTANCE'];
        $resultArray['AC_NUMBER'] = $rowDistance['AC_NUMBER'];
    }

    $sqlPerMile = "SELECT model.MOD_CHG_MILE FROM charter
    INNER JOIN aircraft ON charter.AC_NUMBER = aircraft.AC_NUMBER
    INNER JOIN model ON aircraft.MOD_CODE = model.MOD_CODE";
    $resultPerMile = $conn->query($sqlPerMile);
    while ($rowPerMile = mysqli_fetch_array($resultPerMile)){
        $resultArray['MOD_CHG_MILE'] = $rowPerMile['MOD_CHG_MILE'];
    }

    $sql = "INSERT INTO booking VALUES('',{$cusCode},{$charTrip},({$resultArray['CHAR_DISTANCE']}*{$resultArray['MOD_CHG_MILE']}),1)";
    $resultSql = $conn->query($sql);

    header("Location: ../ticket.php");

?>