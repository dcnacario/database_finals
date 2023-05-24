<?php
    require('./local_setting.php');
    // Check if the search form is submitted
    if(isset($_POST['searchDestination'])) {
        $destination = $_POST['searchDestination'];

        $sql = "SELECT * FROM charter WHERE CHAR_DESTINATION LIKE '%$destination%'";
        $result = mysqli_query($conn, $sql);
    } else {
        // If the search form is not submitted, retrieve all charters
        $sql = "SELECT * FROM charter";
        $result = mysqli_query($conn, $sql);
    }
?>
<html>
    <head>
        <title>Aerilon | Admin - Charter</title>
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
                <button type="submit" class="btn_add_admin" id="charterBtn">Add Charter<i class='bx bx-plus add'></i></button>
                <div style="padding-left: 0.5%;">
                <form action="./backend/logout.php">
                <button type="submit" class="btn_logout_admin">Logout</button>
                </form>
                </div>
        </div>
        <div class="admin_container">
            <div id="charterModal" class="model_modal">
                <div class="model_modal_content">
                    <span class="close">&times;</span>
                    <form action="./backend/addCharter.php" method="post">
                    <h1 style="text-align: center">Add Charter</h1>
                    <div class="model_container">
                        <label>Date</label><br>
                        <input type="date" class="model_input" name="charDate">
                    </div>
                    <div class="model_container">
                        
                        <label>Aircraft Number</label><br>
                        <select name="acNumber" class="model_input">
                        <?php 
                            require('./backend/fetchAircraft.php');
                            while($aircraftRow = mysqli_fetch_array($resultAircraft)){
                        ?>
                            <option value="<?php echo $aircraftRow['AC_NUMBER']?>"><?php echo $aircraftRow['AC_NUMBER']?></option>
                            <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div class="model_container">
                        <label>Destination</label><br>
                        <input type="text" class="model_input" name="charDest">
                    </div>
                    <div class="model_container">
                        <label>Distance</label><br>
                        <input type="text" class="model_input" name="charDist">
                    </div>
                    <div class="model_container">
                        <label>Hours Flown</label><br>
                        <input type="text" class="model_input" name="charFlown">
                    </div>
                    <div class="model_container">
                        <label>Hours Wait</label><br>
                        <input type="text" class="model_input" name="charWait">
                    </div>
                    <div class="model_container_button">
                        <button type="submit" class="model_btn">Add</button>
                    </div>
                    </form>
                </div>
            </div>
            <div class="search_container">
                <form action="admin_page.php" method="post">
                    <input type="text" name="searchDestination" class="search_bar" placeholder="Search Destination">
                    <button type="submit" class="search_button"><i class='bx bx-search bx-xs'></i></button>
                </form>
            </div>
            <table class="tb-container_admin">
                <tr>
                    <th>Trip</th>
                    <th>Date</th>
                    <th>Aircraft No.</th>
                    <th>Destination</th>
                    <th>Distance</th>
                    <th>Hours Flown</th>
                    <th>Hours Wait</th>
                    <th>Action</th>
                </tr>
                <?php 
                    while($charterRow = mysqli_fetch_array($result)){
                        $modalId = "editCharter" . $charterRow['CHAR_TRIP'];
                ?>
                <tr>
                    <td><?php echo $charterRow['CHAR_TRIP']?></td>
                    <td><?php 
                    $charDate =  $charterRow['CHAR_DATE'];
                    $formattedDate = date('Y-m-d', strtotime($charDate));
                    echo $formattedDate;
                    ?></td>
                    <td><?php echo $charterRow['AC_NUMBER']?></td>
                    <td><?php echo $charterRow['CHAR_DESTINATION']?></td>
                    <td><?php echo $charterRow['CHAR_DISTANCE']?></td>
                    <td><?php echo $charterRow['CHAR_HOURS_FLOWN']?></td>
                    <td><?php echo $charterRow['CHAR_HOURS_WAIT']?></td>
                    <td>
                        <div class="button_content">
                        <button class="model_btn_edit" data-modal-id="<?php echo $modalId; ?>"><i class='bx bxs-edit'></i></button>
                            <form action="./backend/deleteCharter.php" method="post">  
                                <input type="hidden" name="charTrip" value="<?php echo $charterRow['CHAR_TRIP'];?>">
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
                        <form action="./backend/editCharter.php" method="post">
                    <h1 style="text-align: center">Edit Charter</h1>
                    <div class="model_container">
                        <label>Date</label><br>
                        <?php 
                        $charDate = $charterRow['CHAR_DATE'];
                        $formattedDate = date('Y-m-d', strtotime($charDate));
                        ?>
                        <input type="date" class="model_input" name="charDate" value="<?php echo $formattedDate;?>">
                    </div>
                    <div class="model_container">
                        
                        <label>Aircraft Number</label><br>
                        <select name="acNumber" class="model_input" value="<?php echo $charterRow['AC_NUMBER']?>">
                        <?php 
                            require('./backend/fetchAircraft.php');
                            while($aircraftRow = mysqli_fetch_array($resultAircraft)){
                        ?>
                            <option value="<?php echo $aircraftRow['AC_NUMBER']?>" <?php if ($charterRow['AC_NUMBER'] == $aircraftRow['AC_NUMBER']) echo 'selected';?>><?php echo $aircraftRow['AC_NUMBER']?></option>
                            <?php 
                            }
                        ?>
                        </select>
                    </div>
                    <div class="model_container">
                        <label>Destination</label><br>
                        <input type="text" class="model_input" name="charDest" value="<?php echo $charterRow['CHAR_DESTINATION']?>">
                    </div>
                    <div class="model_container">
                        <label>Distance</label><br>
                        <input type="text" class="model_input" name="charDist" value="<?php echo $charterRow['CHAR_DISTANCE']?>">
                    </div>
                    <div class="model_container">
                        <label>Hours Flown</label><br>
                        <input type="text" class="model_input" name="charFlown" value="<?php echo $charterRow['CHAR_HOURS_FLOWN']?>">
                    </div>
                    <div class="model_container">
                        <label>Hours Wait</label><br>
                        <input type="text" class="model_input" name="charWait" value="<?php echo $charterRow['CHAR_HOURS_WAIT']?>">
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
        <script src="./js/editCharter.js"></script>
        <script src="./js/charterModal.js"></script>
    </body>
</html>