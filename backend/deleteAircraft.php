<?php 
        require('../local_setting.php');
    
        $acNumber = $_POST['acNumber'];
    
        $sql = "DELETE FROM aircraft WHERE AC_NUMBER = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $acNumber);
        
        mysqli_stmt_execute($stmt);
        echo mysqli_stmt_error($stmt);
        
        mysqli_stmt_close($stmt);
        
        // Redirect the user to model_page.php
        header("Location: ../aircraft_page.php");
        exit(); // Make sure to exit after the redirect
?>