<?php
    session_start();

    require_once "manageLogin.php";

    $error_message = '';
    if (isset($_POST['submit'])) {
        $log = new manageLogin();
        $response = $log->checkLogin($_POST['email'], $_POST['password']);
        $error_message = '';
        if (!$response) {
            $error_message = "Incorrect username or password";
        }
        else{
            $_SESSION['user'] = $response;
            header('Location: dashboard.php');  /////////////////// page it should direct to
            //echo "signed in";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=devicewidth, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="logIn.css">
</head>
<body>
    <header class = "head-container">
        <p> Dolphin CRM </p>
    </header>
    <div class= "login-container">
        <h2> Login </h2>
        <form action="logIn.php" method="post">  
            <input type="text" name="email" placeholder="Email Address" required>
            <input type="password" name="password" placeholder="Password" required>
            <input type="submit" name="submit" value="Login" class ="logBtn" />
        </form>
    </div>

    <?php if ($error_message != "") { ?>
    <div class="error">
        <strong><?php echo $error_message; ?></strong>
    </div>
    <?php } ?>

    <footer>
        <div class="footer-container">
            <p>Copyright 2022, Dolphin CRM</p>
        </div>
    </footer>
    
</body>
</html>