<?php 
        require('../local_setting.php');
    
        $modCode = $_POST['modCode'];
    
        $sql = "DELETE FROM model WHERE MOD_CODE = ?";
        
        $stmt = mysqli_prepare($conn, $sql);
        
        mysqli_stmt_bind_param($stmt, "i", $modCode);
        
        mysqli_stmt_execute($stmt);
        echo mysqli_stmt_error($stmt);
        
        mysqli_stmt_close($stmt);
        
        // Redirect the user to model_page.php
        header("Location: ../model_page.php");
        exit(); // Make sure to exit after the redirect
?>