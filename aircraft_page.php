<?php
    require('./local_setting.php');
    require('./backend/fetchModel.php');
    // Check if the search form is submitted
    if(isset($_POST['searchDestination'])) {
        $destination = $_POST['searchDestination'];

        $sql = "SELECT * FROM aircraft WHERE AC_NUMBER LIKE '%$destination%'";
        $resultAC = mysqli_query($conn, $sql);
    } else {
        // If the search form is not submitted, retrieve all charters
        $sql = "SELECT * FROM aircraft";
        $resultAC = mysqli_query($conn, $sql);
    }
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
                <div class="indiv_button">
                    <form action="booking_page.php">
                    <button class="btn_add_admin">Booking</button>
                    </form>
                </div>
                <h4>|</h4>
                <button type="button" class="btn_add_admin" id="aircraftBtn">Add Aircraft<i class='bx bx-plus add'></i></button>
                <div style="padding-left: 0.5%;">
                <form action="./backend/logout.php">
                <button type="submit" class="btn_logout_admin">Logout</button>
                </form>
                </div>
        </div>

        <div class="admin_container">
            <div id="aircraftModal" class="model_modal">
                <div class="model_modal_content">
                    <span class="close">&times;</span>
                    <form action="./backend/addAircraft.php" method="post">
                    <h1 style="text-align: center">Add Aircraft</h1>
                    <div class="model_container">             
                        <label>Model Code</label><br>
                        <select name="modCode" class="model_input">
                        <?php 
                            while($modelRow = mysqli_fetch_array($result)){
                        ?>
                            <option value="<?php echo $modelRow['MOD_CODE']?>"><?php echo $modelRow['MOD_CODE']?></option>
                            <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div class="model_container">
                        <label>Aircraft TTFA</label><br>
                        <input type="text" class="model_input" name="ac_TTFA">
                    </div>
                    <div class="model_container">
                        <label>Aircraft TTEL</label><br>
                        <input type="text" class="model_input" name="ac_TTEL">
                    </div>
                    <div class="model_container">
                        <label>Aircraft TTER</label><br>
                        <input type="text" class="model_input" name="ac_TTER">
                    </div>
                    <div class="model_container_button">
                        <button type="submit" class="model_btn">Add</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="search_container">
                <form action="aircraft_page.php" method="post">
                    <input type="text" name="searchDestination" class="search_bar" placeholder="Search Aircraft No.">
                    <button type="submit" class="search_button"><i class='bx bx-search bx-xs'></i></button>
                </form>
            </div>
            <table class="tb-container_admin">
                <tr>
                    <th>Aircraft No.</th>
                    <th>Model Code</th>
                    <th>Aircraft TTAF</th>
                    <th>Aircraft TTEL</th>
                    <th>Aircraft TTER</th>
                    <th>Action</th>
                </tr>
                
                <?php 
                    while($aircraftRow = mysqli_fetch_array($resultAC)) {
                        $modalId = "editAircraft_" . $aircraftRow['AC_NUMBER'];
                ?>
                <tr>
                    <td><?php echo $aircraftRow['AC_NUMBER']?></td>
                    <td><?php echo $aircraftRow['MOD_CODE']?></td>
                    <td><?php echo $aircraftRow['AC_TTAF']?></td>
                    <td><?php echo $aircraftRow['AC_TTEL']?></td>
                    <td><?php echo $aircraftRow['AC_TTER']?></td>
                    <td>
                        <div class="button_content">
                        <button class="model_btn_edit" data-modal-id="<?php echo $modalId; ?>"><i class='bx bxs-edit'></i></button>
                            <form action="./backend/deleteAircraft.php" method="post">  
                                <input type="hidden" name="acNumber" value="<?php echo $aircraftRow['AC_NUMBER'];?>">
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
                        <form action="./backend/editAircraft.php" method="post">
                        <input type="hidden" name="acNumber" value="<?php echo $aircraftRow['AC_NUMBER']?>">
                        <h1 style="text-align: center">Edit Aircraft</h1>
                        <div class="model_container">
                            
                            <label>Model Code</label><br>
                            <select name="modCode" class="model_input">
                            <?php 
                                require("./backend/fetchModel.php");
                                while($modelRow = mysqli_fetch_array($result)){
                            ?>
                                <option value="<?php echo $modelRow['MOD_CODE']?>" <?php if ($aircraftRow['MOD_CODE'] == $modelRow['MOD_CODE']) echo 'selected';?>><?php echo $modelRow['MOD_CODE']?></option>
                                <?php 
                                }
                            ?>
                            </select>
                        </div>
                        <div class="model_container">
                            <label>Aircraft TTFA</label><br>
                            <input type="text" class="model_input" name="ac_TTFA" value="<?php echo $aircraftRow['AC_TTAF']?>">
                        </div>
                        <div class="model_container">
                            <label>Aircraft TTEL</label><br>
                            <input type="text" class="model_input" name="ac_TTEL" value="<?php echo $aircraftRow['AC_TTEL']?>">
                        </div>
                        <div class="model_container">
                            <label>Aircraft TTER</label><br>
                            <input type="text" class="model_input" name="ac_TTER" value="<?php echo $aircraftRow['AC_TTER']?>">
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
        <script src="./js/editAircraft.js"></script>
        <script src="./js/aircraftModal.js"></script>
    </body>
</html>