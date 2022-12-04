<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Contact</title>
</head>
<body>
<div id="user-form">
        <form action="note.php" method="post">
            <label>Title</label>
            <select name="role" id="role">
                <option value="ms">Ms</option>
                <option value="mr">Mr</option>
            </select>
            <label for="fname">First Name</label>
            <input type="text" name="fname" id="fname" placeholder="Jane" required>
            <label for="lname">Last Name</label>
            <input type="text" name="lname" id="lname" placeholder="Doe" required>
            <label for="email" >Email</label>
            <input type="email" name="email" id="email" placeholder="something@example.com" required>
            <label for="telephone">Telephone</label>
            <input type="tel" name="telephone" id="telephone" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" required>
            <label for="company">Company</label>
            <input type="text" name="company" id="company" required>
            <label for="type">Type</label>
            <select name="type" id="type">
                <option value="type1">Sales Lead</option>
                <option value="type1">Support</option>
            </select>
            <label for="assigned">Assigned To</label>
            <select name="assigned" id="assigned">
                <option value="name1">Adele Fraser</option>
                <option value="name2">Jan Levinson</option>  
                <option value="name3">David Wallace</option> 
                <option value="name4">Andy Bernard</option>  
                <option value="name5">Darryl Philbin</option>
                <option value="name6">Erin Hannon</option>               
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
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    
    if(isset($_GET['to-me'])){
        session_start();
        $assignedto = $_SESSION['id'];
        $id = $_GET['to-me'];
        
        $conn->beginTransaction();
        $conn->exec("UPDATE contacts SET assignedto='$assignedto' WHERE id='$id'");
        $conn->commit();

        $stmt = $conn->query("SELECT * FROM users WHERE id='$assignedto'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo $results[0]['firstname'].''.$results[0]['lastname'];
    }
    if(isset($_GET['type'])){
        $id = $_GET['type'];

        $stmt = $conn->query("SELECT * FROM contacts WHERE id='$id'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($results[0]['type']== "SUPPORT"){
            $type="SALES LEAD";
        }
        else if($results[0]['type']=="SALES LEAD"){
            $type="SUPPORT";
        }

        $conn->beginTransaction();
        $conn->exec("UPDATE contacts SET type= '$type' WHERE id='$id'");
        $conn->commit();

        $stmt = $conn->query("SELECT * FROM contacts WHERE id='$assignedto'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if($results[0]['type'] == "SUPPORT"){
            echo '<i class="fa fa-exchange" aria-hidden="true"></i>';
            echo "Switch to Support";
        }
    }
    if(isset($_GET['updated'])){
        $id = $_GET['updated'];

        $conn->beginTransaction();
        $conn->exec("UPDATE contacts SET updatedat=CURRENT_TIMESTAMP WHERE id='$id'");
        $conn->commit();

        $stmt = $conn->query("SELECT * FROM contacts WHERE id='$assignedto'");
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
?>