<?php

session_start();
$created_by= intval($_SESSION['user'][0]);


$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$title =filter_var($_POST['title'],FILTER_SANITIZE_STRING);
$fname =filter_var($_POST['Fname'],FILTER_SANITIZE_STRING);
$lname =filter_var($_POST['Lname'],FILTER_SANITIZE_STRING);
$email =filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
$telephone =filter_var($_POST['telephone'],FILTER_SANITIZE_STRING);
$company =filter_var($_POST['company'],FILTER_SANITIZE_STRING);
$type =filter_var($_POST['type'],FILTER_SANITIZE_STRING);
$assignedto = intval(filter_var($_POST['assignedto'],FILTER_SANITIZE_NUMBER_INT));




$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM contacts WHERE email='$email'");
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

if(count($results)==0){
    
    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    //$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    $stmt = $conn->prepare("INSERT INTO `contacts` (`title`, `firstname`, `lastname`, `email`, `telephone`, `company`, `type`, `assigned_to`, `created_by`, `created_at`, `updated_at`) VALUES (:title, :fname, :lname, :email, :telephone, :company, :type, :assignedto, :created_by, :created_at, :updated_at)");

    $stmt->bindParam(':title', $title, PDO::PARAM_STR);
    $stmt->bindParam(':fname', $fname, PDO::PARAM_STR);
    $stmt->bindParam(':lname', $lname, PDO::PARAM_STR);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $stmt->bindParam(':company', $company, PDO::PARAM_STR);
    $stmt->bindParam(':type', $type, PDO::PARAM_STR);
    $stmt->bindParam(':assignedto', $assignedto, PDO::PARAM_INT);
    $stmt->bindParam(':created_by', $created_by, PDO::PARAM_INT);
    $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);
    $stmt->bindParam(':updated_at', $updated_at, PDO::PARAM_STR);

    if($stmt->execute()){
        echo '<script>alert("Contact Added")</script>';
        echo "<script>window.location = 'newcontact.php';</script>";

    }else{
        echo '<script>alert("Contact could not be Added")</script>';
        echo "<script>window.location = 'newcontact.php';</script>";
    }

    
}else{
    echo '<script>alert("There is already a contact with this email")</script>';
    echo "<script>window.location = 'newcontact.php';</script>";
}