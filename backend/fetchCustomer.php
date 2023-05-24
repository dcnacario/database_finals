<?php 
    require('./local_setting.php');

    $sql = "SELECT * FROM customer";
    $resultCustomer = $conn->query($sql);
?>