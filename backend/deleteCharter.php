<?php 
        require('../local_setting.php');
    
        $charTrip = $_POST['charTrip'];
    
        $sql = "DELETE FROM charter WHERE CHAR_TRIP = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $charTrip);
        
        mysqli_stmt_execute($stmt);
        echo mysqli_stmt_error($stmt);
        
        mysqli_stmt_close($stmt);
        
        // Redirect the user to model_page.php
        header("Location: ../admin_page.php");
        exit(); // Make sure to exit after the redirect
?>