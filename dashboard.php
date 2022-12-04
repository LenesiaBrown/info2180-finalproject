<?php

    // session_start();
    // if(!isset($_SESSION['admin'])){
    //     header('location:login.php');
    // }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - Dolphin CRM</title>

    <link rel="stylesheet" href="dashboard.css">
    <script defer src="dashboardFilter.js"></script>

    
</head>
<body>

    <div id="dolphin-crm">
        <img src="images/dolphinLogo.png" id="dolphin-logo">
        <h4>Dolphin CRM</h4>
    </div>

    <div id="wrapper">
        <nav id="nav-bar">
            <button class="navButton"><img id="home-icon" src="images/homeIcon.png"> Home</button>
            <button class="navButton"><img id="contact-icon" src="images/newContactIcon.png"> New Contact</button>
            <button class="navButton"><img id="users-icon" src="images/usersIcon.png">Users</button>
            <hr>
            <button class="navButton"><img id="logout-icon" src="images/logoutIcon.png"> Logout</button>
        </nav>

        <div id="updating-div">
            <div id="section-header">
                <h1>Dashboard</h1>
                <button id="add-contact-button" class="headerButton">+ Add Contact</button>
            </div>
            

            <div id="results-wrapper">
                
                <div id="filter-controls">
                    <img src="images/filterIcon.png">
                    <p>Filter By:</p>
                    <button autofocus id="all-filter-button" class="filterButton">All</button>
                    <button id="sales-leads-button" class="filterButton">Sales Leads</button>
                    <button id="support-button" class="filterButton">Support</button>
                    <button id="assigned-to-me-button" class="filterButton">Assigned to me</button>
                </div>

                <br>
                <br>
                
                
                <table id="results">
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Company</th>
                        <th>Type</th>
                        <th></th>
                    </tr>

                    <?php
                    
                        $host = 'localhost';
                        $username = 'project2_user';
                        $password = 'password123';
                        $dbname = 'dolphin_crm';

                        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                        $stmt = $conn->query("SELECT * FROM `contacts`");

                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach($results as $row):
                    ?>

                        <tr>
                            <td><?=$row['title']." ".$row['firstname']." ".$row['lastname']?></td>
                            <td><?=$row['email']?></td>
                            <td><?=$row['company']?></td>

                            <?php
                                if($row['type'] === 'SALES LEAD'){
                            ?>
                                    <td><div class="salesLead">SALES LEAD</div></td>

                            <?php }else{ ?>
                                    
                                    <td><div class="support">SUPPORT</div></td>

                            <?php } ?>  
        
                            <td><a href="<?=$row['id']?>" class="view-contact-link">View</a></td>
                        </tr>

                        <?php endforeach ?>
                </table>
            </div>

        </div>
    </div>

</body>
</html>