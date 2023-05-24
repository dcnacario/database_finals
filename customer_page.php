<?php 
    require('./backend/fetchCustomer.php')
?>
<html>
    <head>
        <title>Aerilon | Admin - Aircraft</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" type="image-x-icon" href="./resources/favicon.ico">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,400;0,500;1,400;1,500&display=swap" rel="stylesheet">
    </head>
    <body>
        <ul class="topnav_admin">
            <li class="logo"><img src="./resources/logo.svg" width="10%"></li>
        </ul>
        <div class="button_nav">
                <h3>Welcome! Admin</h3>
                <div class="indiv_button">
                    <form action="admin_page.php">
                    <button class="btn_add_admin">Charter</button>
                    </form>
                </div>
                <div class="indiv_button">
                    <form action="model_page.php">
                    <button class="btn_add_admin">Model</button>
                    </form>
                </div>
                <div class="indiv_button">
                    <form action="aircraft_page.php">
                    <button class="btn_add_admin">Aircraft</button>
                    </form>
                </div>
                <div class="indiv_button">
                    <form action="customer_page.php">
                    <button class="btn_add_admin">Customer</button>
                    </form>
                </div>
                <h4>|</h4>
                <div style="padding-left: 0.5%;">
                <form action="./backend/logout.php">
                <button type="submit" class="btn_logout_admin">Logout</button>
                </form>
                </div>
        </div>
            <table class="tb-container_admin">
                <tr>
                    <th>Customer No.</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Initial</th>
                    <th>Area Code</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
                
                <?php 
                    require('./backend/fetchCustomer.php');

                    while($customerRow = mysqli_fetch_array($resultCustomer)) {
                        $modalId = "editCustomer_" . $customerRow['CUS_CODE'];
                ?>
                <tr>
                    <td><?php echo $customerRow['CUS_CODE']?></td>
                    <td><?php echo $customerRow['CUS_LNAME']?></td>
                    <td><?php echo $customerRow['CUS_FNAME']?></td>
                    <td><?php echo $customerRow['CUS_INITIAL']?></td>
                    <td><?php echo $customerRow['CUS_AREACODE']?></td>
                    <td><?php echo $customerRow['CUS_PHONE']?></td>
                    <td>
                        <div class="button_content">
                        <button class="model_btn_edit" data-modal-id="<?php echo $modalId; ?>"><i class='bx bxs-edit'></i></button>
                            <form action="./backend/deleteCustomer.php" method="post">  
                                <input type="hidden" name="cusCode" value="<?php echo $customerRow['CUS_CODE'];?>">
                                <button type="submit" class="model_btn_delete"><i class='bx bx-trash' ></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <!-- Edit Model Modal -->
                <div id="<?php echo $modalId; ?>" class="model_modal">
                    <!-- Modal content -->
                    <div class="model_modal_content">
                        <span class="close">&times;</span>
                        <form action="./backend/editCustomer.php" method="post">
                        <input type="hidden" name="cusCode" value="<?php echo $customerRow['CUS_CODE']?>">
                        <h1 style="text-align: center">Edit Customer</h1>
                        <div class="model_container">
                            
                            <label>Customer No.</label><br>
                            <input type="text" class="model_input" value="<?php echo $customerRow['CUS_CODE']?>" readonly>
                        </div>
                        <div class="model_container">
                            <label>Last Name</label><br>
                            <input type="text" class="model_input" name="lName" value="<?php echo $customerRow['CUS_LNAME']?>">
                        </div>
                        <div class="model_container">
                            <label>First Name</label><br>
                            <input type="text" class="model_input" name="fName" value="<?php echo $customerRow['CUS_FNAME']?>">
                        </div>
                        <div class="model_container">
                            <label>Initial</label><br>
                            <input type="text" class="model_input" name="initial" value="<?php echo $customerRow['CUS_INITIAL']?>">
                        </div>
                        <div class="model_container">
                            <label>Area Code</label><br>
                            <input type="text" class="model_input" name="areaCode" value="<?php echo $customerRow['CUS_AREACODE']?>">
                        </div>
                        <div class="model_container">
                            <label>Phone</label><br>
                            <input type="text" class="model_input" name="phone" value="<?php echo $customerRow['CUS_PHONE']?>">
                        </div>
                        <div class="model_container_button">
                            <button type="submit" class="model_btn">Save</button>
                        </div>
                        </form>
                    </div>
                </div>
                <?php 
                    }
               ?>
            </table>
        </div>
        <script src="./js/editCustomer.js"></script>
    </body>
</html>