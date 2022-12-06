<?php

    session_start();
    $userRole = $_SESSION['user'][2];
    
    
    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';

    $conn= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $users = $conn->query('SELECT * FROM users');
   

if($userRole === "Admin"){?>
    <div id="wrapper">
        <nav id="nav-bar">
            <a href="dashboard.php">
                <button class="navButton"><img id="home-icon" src="images/homeIcon.png"> Home</button>
            </a>
            <a href="newContact.php">
                <button class="navButton"><img id="contact-icon" src="images/newContactIcon.png"> New Contact</button>
            </a>
            <a href="userList.php">
                <button class="navButton"><img id="users-icon" src="images/usersIcon.png">Users</button>
            </a>
            <hr>
            <a href="logIn.php">
            <button class="navButton"><img id="logout-icon" src="images/logoutIcon.png"> Logout</button>
            </a>
        </nav>
    </div>

    <a href="newUser.php">
        <button class="adding">+ Add User</button>
    </a>
    <table>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th>Created</th>
        </tr>
    <?php foreach($users as $user):?>
        <tr>
            <td><?=$user['firstname']?> <?=$user['lastname']?></td>
            <td><?=$user['email']?></td>
            <td><?=$user['role']?></td>
            <td><?=$user['created_at']?></td>
        </tr>        
        
    <?php endforeach;?>
    </table>
<?php }else{ ?>
    <p>Must be Logged in as Admin to view and add Users</p>
    <?php } ?>