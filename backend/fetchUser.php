<?php 
    require('./local_setting.php');

    $sql = "SELECT * FROM user";

    $result = mysqli_query($conn, $sql);
?>