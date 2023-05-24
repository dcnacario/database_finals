<?php
    require('../local_setting.php');
    $lName = $_POST['lName'];
    $fName = $_POST['fName'];
    $initial = $_POST['initial'];
    $areaCode = $_POST['areaCode'];
    $phone = $_POST['phone'];
    $charTrip = $_POST['charTrip'];
    $sql = "INSERT INTO customer VALUES ('','{$lName}','{$fName}',
    '{$initial}',{$areaCode},'{$phone}')";


    $result = mysqli_query($conn, $sql);
    $lastInsertedCusCode = mysqli_insert_id($conn);
    header("Location: booking.php?cusCode=$lastInsertedCusCode&charTrip=$charTrip");
?>

