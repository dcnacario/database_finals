<?php
    require('../local_setting.php');
    $manufacturer = $_POST['modMan'];
    $name = $_POST['modName'];
    $seats = $_POST['modSeats'];
    $chg = $_POST['modCHG'];
    $sql = "INSERT INTO model VALUES ('','{$manufacturer}','{$name}',{$seats},{$chg})";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location:../model_page.php");
    } else {
        echo "Error: ". $sql. "<br>". mysqli_error($conn);
    }
?>