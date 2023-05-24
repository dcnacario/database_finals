<?php
require('./local_setting.php');
$username = $_POST['user'];
$password = $_POST['pass'];

$sql = "SELECT * FROM user";
$result = $conn->query($sql);
$isValidCredentials = false;

if (mysqli_num_rows($result) > 0) {
    while ($result_row = mysqli_fetch_array($result)) {
        if ($result_row['username'] == $username && $result_row['password'] == $password) {
            $isValidCredentials = true;
            break;
        }
    }
}

if ($isValidCredentials) {
    if($username == "admin" && $password == "admin") {
    header('Location: ./admin_page.php');
    }
    else {
    header('Location:./user_page.php');
    }
} else {
    header('Location: ./login.php?error=invalid_credentials');
    exit();
}
?>
