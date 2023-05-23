<?php 
    require('../local_setting.php');
    $acNumber = $_POST['acNumber'];
    $charDate = $_POST['charDate'];
    $charDest = $_POST['charDest'];
    $charDist = $_POST['charDist'];
    $charFlown = $_POST['charFlown'];
    $charWait = $_POST['charWait'];

    $sql = "INSERT INTO charter VALUES ('','{$charDate}',{$acNumber},
    '{$charDest}',{$charDist},{$charFlown},{$charWait})";

    $result = mysqli_query($conn, $sql);
    header("Location: ../admin_page.php");
?>