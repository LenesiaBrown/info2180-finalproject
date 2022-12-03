<?php
$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$stmt = $conn->query("SELECT * FROM users");

$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo "Hashed password using bcrypt: ",
password_hash($password, PASSWORD_DEFAULT);

//The hashed password is $2y$10$mHDmVc0q0vfPAX1k0H1.AuRjFLFwV.iABGr.RXOrrMfYw8KoQzjya


?>