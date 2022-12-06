<?php
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$title =filter_var($_POST['title'],FILTER_SANITIZE_STRING);
$Fname =filter_var($_POST['Fname'],FILTER_SANITIZE_STRING);
$Lname =filter_var($_POST['Lname'],FILTER_SANITIZE_STRING);
$email =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$telephone =filter_var($_POST['telephone'],FILTER_SANITIZE_STRING);
$company =filter_var($_POST['company'],FILTER_SANITIZE_STRING);
$type =filter_var($_POST['type'],FILTER_SANITIZE_STRING);
$assignedto =filter_var($_POST['assign'],FILTER_SANITIZE_STRING);

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM contacts WHERE email='$email'");
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($result)==0){
    session_start();
    $created_by =$_SESSION['user'][0];

    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $conn->beginTransaction();
    $conn->exec("INSERT INTO contacts(title, firstname, lastname, email, telephone, company, type, assignedto, created_by, created_at) VALUES ('$title', '$Fname', '$Lname', '$email', '$telephone', '$company', '$type', '$assignedto', '$created_by', Current_Timestamp)");
    $conn->commit();

    echo 'Saved';
}

