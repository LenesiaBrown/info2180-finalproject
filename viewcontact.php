<?php
    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if(isset($_GET['results']) && $_GET['results']='all'){
        $stmt = $conn->query("SELECT * FROM contacts");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>";
        foreach($results as $row)
        echo "<tr>
        <tr>
        <td><a> href=viewnote.php?note=".$row['title']." ".$row['firstname']." ".$row['lastname']. "</td>
        <td>".$row['email']."</td>
        <td>".$row['company']."</td>
        <td>".$row['type']."</td>   
        <td><a href=viewnote.php?note= ".$row['id']." >View</a></td>
        </tr>";
    }
    else if (isset($_GET['results']) && $_GET['results']='salesLead'){
        $stmt = $conn->query("SELECT * FROM contacts WHERE type='SALES LEAD'");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>";
        foreach($results as $row)
        echo "<tr>
        <tr>
        <td><a> href=dashboard.php?note=".$row['title']." ".$row['firstname']." ".$row['lastname']. "</td>
        <td>".$row['email']."</td>
        <td>".$row['company']."</td>
        <td>".$row['type']."</td>   
        <td><a href=dashboard.php?note= ".$row['id']." >View</a></td>
        </tr>";
    }
    else if (isset($_GET['results']) && $_GET['results']='support'){
        $stmt = $conn->query("SELECT * FROM contacts WHERE type='SUPPORT'");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>";
        foreach($results as $row)
        echo "<tr>
        <tr>
        <td><a> href=dashboard.php?note=".$row['title']." ".$row['firstname']." ".$row['lastname']. "</td>
        <td>".$row['email']."</td>
        <td>".$row['company']."</td>
        <td>".$row['type']."</td>   
        <td><a href=dashboard.php?note= ".$row['id']." >View</a></td>
        </tr>";
    }
    else if (isset($_GET['results']) && $_GET['results']='mine'){
        session_start();
        $created_by =$_SESSION['user'][0];
        $stmt = $conn->query("SELECT * FROM contacts WHERE assignedto='$created_by'");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>";
        foreach($results as $row)
        echo "<tr>
        <tr>
        <td><a> href=dashboard.php?note=".$row['title']." ".$row['firstname']." ".$row['lastname']. "</td>
        <td>".$row['email']."</td>
        <td>".$row['company']."</td>
        <td>".$row['type']."</td>   
        <td><a href=dashboard.php?note= ".$row['id']." >View</a></td>
        </tr>";
    }
    else{
        $stmt = $conn->query("SELECT * FROM contacts");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo "<table>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Company</th>
            <th>Type</th>
            <th></th>
        </tr>";
        foreach($results as $row)
        echo "<tr>
        <tr>
        <td><a> href=dashboard.php?note=".$row['title']." ".$row['firstname']." ".$row['lastname']. "</td>
        <td>".$row['email']."</td>
        <td>".$row['company']."</td>
        <td>".$row['type']."</td>   
        <td><a href=dashboard.php?note= ".$row['id']." >View</a></td>
        </tr>";
    }
?>