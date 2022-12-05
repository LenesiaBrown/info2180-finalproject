<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    
    <title>New User</title>
    <link rel="stylesheet" href="newUser.css">
    <script src="newUser.js"></script>
</head>
<body>
    <header>
        <h1>New User</h1>
    </header>

    <div id="wrapper">
        <nav id="nav-bar">
            <a href="dashboard.php">
                <button class="navButton"><img id="home-icon" src="images/homeIcon.png"> Home</button>
            </a>
            <a href="note.php">
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

    <div id="user-form">
        <form action="newUser.php" method="post">
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="Jane" required>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Doe" required>
            <label for="email" >Email</label>
            <input type="email" name="email" id="email" placeholder="something@example.com" required>
            <label for="password">Password</label>
            <input type="password" name="password" id="password" required>
            <label for="role">Role</label>
            <select name="role" id="role">
                <option value="Member">Member</option>
                <option value="Admin">Admin</option>                
            </select>

            <button type="submit" id="submit-btn">Save</button>
        </form>
        <p id="message"></p>

        
    </div>
</body>
</html>
<?php
    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    
    $GLOBALS['conn']= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $fname = filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lname = filter_input(INPUT_POST, 'lname', FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $role = $_POST['role'];
    
        if(validatePassword($_POST['password'])){
            $hashPass = password_hash($_POST['password'], PASSWORD_DEFAULT);
            addUser($fname, $lname, $hashPass, $email, $role);
        }
      }
    function validatePassword($password){
        return preg_match("/[A-Z]/", $password) && preg_match("/[0-9]/",$password) && strlen($password) > 8;
    }

    

    function addUser($fname, $lname, $hashPass, $email, $role) {
        $created_at = date('h:i a');
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO `users` (`firstname`, `lastname`, `password`, `email`, `role`, `created_at`) VALUES (:fname, :lname,:hashPass, :email, :role, :created_at)");
                        
        $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
        $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
        $stmt->bindParam(':hashPass', $hashPass, PDO::PARAM_STR);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':role', $role, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);

        if ($stmt->execute()) {
            echo("<script>alert('New user successfully added!');</script>");
        }
        else{
            echo("<script>alert('An error has occured. New user was not added');</script>");
        }
    }
?>
