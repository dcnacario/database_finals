<?php 
        require('../local_setting.php');
    
        $cusCode = $_POST['cusCode'];
    
        $sql = "DELETE FROM customer WHERE CUS_CODE = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $cusCode);
        
        mysqli_stmt_execute($stmt);
        echo mysqli_stmt_error($stmt);
        
        mysqli_stmt_close($stmt);
        
        // Redirect the user to customer_page.php
        header("Location: ../customer_page.php");
        exit(); // Make sure to exit after the redirect
?>