<?php 
    require('../local_setting.php');
    $modCode = $_POST['modCode'];
    $acNumber = $_POST['acNumber'];
    $ac_TTFA = $_POST['ac_TTFA'];
    $ac_TTEL = $_POST['ac_TTEL'];
    $ac_TTER = $_POST['ac_TTER'];

    $sql = "UPDATE aircraft SET MOD_CODE = {$modCode}, AC_TTAF = {$ac_TTFA},
    AC_TTEL = {$ac_TTEL}, AC_TTER = {$ac_TTER} WHERE AC_NUMBER = {$acNumber}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../aircraft_page.php");
?>