<?php
    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';

    $conn= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $users = $conn->query('SELECT * FROM users');
    //if user == admin. Sessions?
   // if $_SESSION['user'][2] == 'admin':
?>
    <a href="newUser.php">
        <button class="adding">+ Add User</button>
    </a>
    <table>
        <th>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Created</td>
        </th>
    <?php foreach($users as $user):?>
        <tr>
            <td><?=$user['firstname']?> <?=$user['lastname']?></td>
            <td><?=$user['email']?></td>
            <td><?=$user['role']?></td>
            <td><?=$user['created_at']?></td>
        </tr>        
        
    <?php endforeach;?>
    </table>
<?php //else:?>
    <p>Must be Logged in as Admin to view Users</p>
    <?php //header('Location: userLogin.php');?>