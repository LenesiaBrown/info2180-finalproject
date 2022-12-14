<script src="viewcontact.js"></script>
<?php
    if (!isset($_GET['results']) &&is_numeric($_GET['results'])) {
        Header("Location: dashboard.php");
    }
    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

    if (isset($_GET['results']) &&is_numeric($_GET['results'])) {
        $stmt = $conn->query("SELECT * FROM contacts");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt_users = $conn->query("SELECT * FROM users");
        $users= $stmt_users->fetchAll(PDO::FETCH_ASSOC);
        foreach($results as $result){
            if($result['id'] ==$_GET['results'] ){
            $GLOBALS['fname'] = $result['firstname'];
                echo "
                    <div id='contact-heading'>
                        <p>".$result['title']." ".$result['firstname']." ".$result['lastname']."</p>
                        <p>Created on ".$result['created_at']."</p>
                        <p>Updated at on ".$result['updated_at']."</p>
                        <button id = 'assign-me'> Assign to me</button>
                        <button id = 'switch-to-sale'>Switch to Sales Lead </button>
                    </div>
                    <div id = 'contact-details'>
                        <label for = 'email'>Email</email>
                        <p name = 'email' >".$result['email']."</p> 
                        <label for = 'tel'>Telephone</label>
                        <p name = 'tel' >".$result['telephone']."</p> 
                        <label for = 'company'>Company</label>
                        <p name = 'company' >".$result['company']."</p> 
                        <label for = 'assigned_to'>Assigned To</label>
                        ";
                foreach ($users as $user) {
                    if ($result['assigned_to'] == $user['id']) {
                        $assigned_to = $user['firstname'] . " " . $user['lastname'];
                        echo "<p name = 'assigned_to' >" . $assigned_to . "</p> 
                                </div>";
                    }
                }
            }
        }
    }

    else if(isset($_GET['results']) && $_GET['results'] = 'all'){
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
    else if (isset($_GET['results']) && $_GET['results']='sales'){
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

<div id="notes">
<p>Notes</p>
<?php

    if (isset($_GET['results'])) {
        $contact_id = $_GET['results'];
    $stmt = $conn->query("SELECT * FROM notes WHERE contact_id = $contact_id");
    $results = $stmt->fetchAll();
    $stmt_users = $conn->query("SELECT * FROM users");
    $users= $stmt_users->fetchAll(PDO::FETCH_ASSOC);
    foreach($results as $result){
        foreach($users as $user){
            if ($result['created_by'] == $user['id']){
                $name = $user['firstname']. " ". $user['lastname'];
                echo $name;
                echo "<p><?=$name?></p>
                    <p>".$result['comment']."</p>
                    <p>Created at</p>
                    <p>".$result['created_at']."</p>";
            }
        }
    }
}
?>
<label for="new-note">Add a note about <?=$GLOBALS['fname']?></label>
<textarea name="new-note" id="new-note" cols="30" rows="10" placeholder="Enter details here"></textarea>
<button id="save-note" itemid="<?=$_GET['results']?>">Add Note</button>
<p id="error-msg"></p>
</div>