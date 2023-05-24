<?php 
    require('../local_setting.php');
    $charTrip = $_POST['charTrip'];
    $charDate = $_POST['charDate'];
    $acNumber = $_POST['acNumber'];
    $charDest = $_POST['charDest'];
    $charDist = $_POST['charDist'];
    $charFlown = $_POST['charFlown'];
    $charWait = $_POST['charWait'];

    $sql = "UPDATE charter SET CHAR_DATE = '{$charDate}', AC_NUMBER = {$acNumber}, CHAR_DESTINATION = '{$charDest}', 
    CHAR_DISTANCE = {$charDist}, CHAR_HOURS_FLOWN = {$charFlown}, CHAR_HOURS_WAIT = {$charWait} WHERE CHAR_TRIP = {$charTrip}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../admin_page.php");
?>