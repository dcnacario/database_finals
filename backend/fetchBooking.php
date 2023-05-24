<?php 
    require('./local_setting.php');
    
    $sql = "SELECT * FROM booking";
    $resultBooking = $conn->query($sql);
?> 