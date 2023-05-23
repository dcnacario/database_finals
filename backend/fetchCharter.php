<?php 
    require('./local_setting.php');

    $sql = "SELECT * FROM charter";
    $resultCharter = $conn->query($sql);
?>