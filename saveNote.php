<?php 

    $host = 'localhost';
    $username = 'project2_user';
    $password = 'password123';
    $dbname = 'dolphin_crm';
    $GLOBALS['conn']= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    if (isset($_GET['id']) && isset($_GET['userId']) && isset($_GET['comment'])){
        $contactId = $_GET['id'];
        $created_by = $_GET['userId'];
        $comment =$_GET['comment'];
        $created_at = date('Y-m-d H:i:s');
        $stmt = $GLOBALS['conn']->prepare("INSERT INTO `notes` (`contact_id`, `comment`, `created_at`, `created_by`) VALUES (:contactId, :comment, :created_at, :created_by)");
        $stmt->bindParam(':contactId', $contactId, PDO::PARAM_STR);
        $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindParam(':created_by', $created_by, PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $created_at, PDO::PARAM_STR);

        if($stmt->execute()){
            echo 'Note added successfully';
        }else{
            echo 'Note not added. Please try again';
        }
    }
?>