<?php 
    require('../local_setting.php');
    $cusCode = $_POST['cusCode'];
    $lName = $_POST['lName'];
    $fName = $_POST['fName'];
    $initial = $_POST['initial'];
    $areaCode = $_POST['areaCode'];
    $phone = $_POST['phone'];

    $sql = "UPDATE customer SET CUS_LNAME = '{$lName}',
    CUS_FNAME = '{$fName}', CUS_INITIAL = '{$initial}', CUS_AREACODE = {$areaCode}, CUS_PHONE = '{$phone}' WHERE CUS_CODE = {$cusCode}";
    $result = mysqli_query($conn, $sql);
    header("Location: ../customer_page.php");
?>