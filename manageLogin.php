<?php
    //require "DBManager.php";

    class manageLogin{
        private $host;
        private $email;
        private $password;
        private $dbname;
        private $stmt;
        private $db;
        private $users;
        private $result;
        
        function __construct(){
            $this->host = 'localhost';
            $this->username = 'project2_user';
            $this->password = 'password123';
            $this->dbname = 'dolphin_crm';

            // $conn = new mysqli($host, $username, $password, $dbname);
            // // Check connection
            // if ($conn->connect_error) {
            // die("Connection failed: " . $conn->connect_error);
            // }

            // if (!function_exists('mysqli_result')) {
            //     function mysqli_result($res, $row, $field=0) {
            //       $res->data_seek($row);
            //       $datarow = $res->fetch_array();
            //       return $datarow[$field];
            //     }
            //   }

            // $stmt = $conn->query("SELECT * FROM users");
            // $users = $stmt->fetchAll();

           // try {
                $this->conn = new PDO("mysql:host=localhost;dbname=dolphin_crm", 'project2_user', 'password123');
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->stmt = $this->conn->prepare("SELECT * FROM users");
                $this->stmt->execute();
              
                // set the resulting array to associative
                $this->result = $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
                $this->users = $this->stmt->fetchAll();
            //     } catch(PDOException $e) {
            //     echo "Error: " . $e->getMessage();
            //   }
              

        }

        function getLogInInfo(){
            return $this->users;
        }

        function checkLogin($email, $password){
            foreach($this->users as $user){
                $hashPass = hash("md5", $password);
                if (hash_equals($user['password'], $hashPass) && $email==$user["email"]){                
                    return [$user["id"], $user["email"], []];
                }
            }
            return false;
        }

    }
?>