<?php
    require('../local_setting.php');
    $lName = $_POST['lName'];
    $fName = $_POST['fName'];
    $initial = $_POST['initial'];
    $areaCode = $_POST['areaCode'];
    $phone = $_POST['phone'];
    $username = $_POST['user'];
    $password = $_POST['pass'];
    $sql = "INSERT INTO customer VALUES ('','{$lName}','{$fName}',
    '{$initial}',{$areaCode},'{$phone}')";


    $result = mysqli_query($conn, $sql);
    $lastInsertedCusCode = mysqli_insert_id($conn);

    $sqlUser = "INSERT INTO user VALUES ('',{$lastInsertedCusCode},'{$username}','{$password}')";

    $resultUser = mysqli_query($conn,$sqlUser);
    header("Location: ../user_page.php?cosCode=$lastInsertedCusCode");
?>

