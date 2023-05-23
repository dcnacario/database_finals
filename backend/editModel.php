<?php 
    require('../local_setting.php');
    $modCode = $_POST['modCode'];
    $manufacturer = $_POST['modMan'];
    $name = $_POST['modName'];
    $seats = $_POST['modSeats'];
    $chg = $_POST['modCHG'];

    $sql = "UPDATE model SET MOD_MANUFACTURER = '{$manufacturer}', MOD_NAME = '{$name}',
    MOD_SEATS = {$seats}, MOD_CHG_MILE = {$chg} WHERE MOD_CODE = {$modCode}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../model_page.php");
?>