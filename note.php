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