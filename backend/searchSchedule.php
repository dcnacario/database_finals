<?php 
    require('../local_setting.php');
    $destination = $_POST['searchDestination'];

    $sql = "SELECT * FROM charter WHERE CHAR_DESTINATION LIKE '%{$destination}%'";
    $result = mysqli_query($conn, $sql);
?>