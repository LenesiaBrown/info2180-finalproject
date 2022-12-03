<?php
    $host = 'localhost';
    $username = 'admin@project2.com';
    $password = 'password123';
    $dbname = 'schema';

    $conn= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $users = $conn->query('SELECT * FROM users');
    //if user == admin. Sessions?
   // if $_SESSION['user'][2] == 'admin':
?>
    <table>
        <th>
            <td>Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>Created</td>
        </th>
    <?php foreach($users as $user):?>
        <td><?=$user['firstname']?> <?=$user['lastname']?></td>
        <td><?=$user['email']?></td>
        <td><?=$user['role']?></td>
        <td><?=$user['creates_at']?></td>
    <?php endforeach;?>
    </table>
<?php //else:?>
    <p>Must be Logged in as Admin to view Users</p>
    <?php //header('Location: userLogin.php');?>