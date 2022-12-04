<?php
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM users");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//The unhashed password for Adele is password123
//The unhashed password for Erin is hannone7
//The unhashed password for Darryl is philbind7
//The unhashed password for Andy is bernarda6
//The unhashed password for David is wallaced5
//The unhashed password for Jan is levij4







?>