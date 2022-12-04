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
        <form action="addnote.php" method="post">
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
            <input type="tel" name="telephone" id="telephone" required>
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

    if(isset($_POST['view']) && isset($_POST['comment'])){
        $id = $_POST['view'];
        $notes = filter_var($_POST['comment'],FILTER_SANITIZE_STRING);

        session_start();
        $created_by =$_SESSION['id'];

        $conn->beginTransaction();
        $conn->exec("INSERT INTO notes (id, contact_id, comment, created_by, created_at) VALUES ('$id','$id','$notes','$created_by', Current_Timestamp)");
        $conn->commit();

        $stmt = $conn->query("SELECT * FROM users, notes WHERE notes.id='$id' AND notes.contact_id='$id' AND  notes.created_by=users.id");
        $contact = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach($contact as $row)
            echo "<hr><br><b><p>".$row['firstname']." ".$row['lastname']."</b><p>".$row['comment']."</p>".date('F j, Y',strtotime($row['created_at']))."at".date("ha",strtotime($row['created_at']))."<br><br>";
    }
?>