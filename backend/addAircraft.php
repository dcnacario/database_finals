<?php 
    require('../local_setting.php');
    $modCode = $_POST['modCode'];
    $ac_ITF = $_POST['ac_TTFA'];
    $ac_TTEL = $_POST['ac_TTEL'];
    $ac_TTER = $_POST['ac_TTER'];

    $sql = "INSERT INTO aircraft VALUES ('',{$modCode},{$ac_ITF},{$ac_TTEL},{$ac_TTER})";
    $result = mysqli_query($conn,$sql);

    header("Location: ../aircraft_page.php");
?>