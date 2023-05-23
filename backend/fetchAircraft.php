<?php 
    require('./local_setting.php');
    
    $sql = "SELECT * FROM aircraft";
    $resultAircraft = $conn->query($sql);
?> 