<?php session_start();
    if (isset ($_SESSION['user'][0])){
        $host = 'localhost';
        $username = 'project2_user';
        $password = 'password123';
        $dbname = 'dolphin_crm';
        $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
    
        $id = $_GET['user'][0];
        $stmt = $conn->query("SELECT * FROM contacts WHERE id='$id'");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);

        $assignedid =$results[0]['assignedto'];
        $stmt = $conn->query("SELECT * FROM contacts WHERE id='assignedid'");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $creator_id =$results[0]['created_by'];
        $stmt = $conn->query("SELECT * FROM contacts WHERE id='creator_id'");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $stmt = $conn->query("SELECT * FROM users, notes WHERE notes.contact.contact_id='$id' AND notes.created_by=users.id");
        $results= $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Notes</title>
    <link rel ="stylesheet" href="viewnote.css">
    <script src="viewnote.js"></script>
    </head>
    <body>
        <?php include 'index.php';?>
            <div class="container">
                <div class="back">
                    <div class="buttons">
                        <div><a href="dashboard.php"><i class ="home" aria-hidden="true"></i>Home</a></div>
                        <div><a href="createcontact.php"><i class ="add-new-contact" aria-hidden="true"></i>New Contact</a></div>
                        <div><a href="userList.php"><i class ="users" aria-hidden="true"></i>Users</a></div>
                        <hr>
                    <div><a href=""><i class ="logout" aria-hidden="true"></i>Logout</a></div>
                </div>
            </div>
            <div class= "background">
                <div class= "overhead">
                    <div class= "top">
                        <i class= "user" aria-hidden ="true"></i>
                            <div class= "contact_name">
                                <h1>
                                    <?php echo $resuts[0]['title']." ".$results[0]['firstname']." ".$results[0]['lastname'];?>
                                </h1>
                                <p> Created on:
                                    <?php echo date('F j,Y',strtotime($results[0]['created_at']))."by".$user[0]['firstname']." ".$user[0]['lastname']?>
                                </p>
                                <div id= "result"><p><?php if(isset($results[0]['updatedat'])){?>Upadted on:
                                    <?php echo date('F j,Y',strtotime($results[0]['created_at']))."by".$user[0]['firstname']." ".$user[0]['lastname']?></p><?php }?>
                                </div>
                            </div>
                            <div class= "btns">
                                <button value="<?php echo $results[0]['id']?>" class="btn" id="assign"><i class="hand" aria-hidden="true"></i>Assign to me </button>
                                <button value="<?php echo $results[0]['id']?>" class="btn" id="sales"><i class="result1"><i class="exchange" aria-hidden="true"></i>Sales</button>
                                <?php if($results[0]['type']== "SALES LEAD"){ echo "Switch to Support";}
                                      else if($results[0]['type']== "SUPPORT"){ echo "Switch to Sales Lead";}?>
                             </div>
                            </div>
                            <div class= "container1">
                                <div class= "container2">
                                    <div class= "telemail">
                                        <p><b>Email</p></b>
                                        <?php echo $results[0]['email'];?>
                                        <br><br>
                                        <p><b>Telephone</p></b>
                                        <?php echo $results[0]['telephone'];?>
                                    </div>
                                    <div class= "company">
                                        <p><b>Company</p></b>
                                        <?php echo $results[0]['company'];?>
                                        <br><br>
                                        <p><b>Assigned To</p></b>
                                        <div id= "result1"><?php echo $assigned[0]['firstname']." ".$assigned[0]['lastname'];?></div>
                                        </div>
                                     </div>
                                     <div class= "container1">
                                        <div class= "container3">
                                            <h3><i class="square" aria-hidden="true"></i>Notes</h3>
                                            <div class= "noteload">
                                                <?php foreach ($contact as $row)
                                                        echo "<hr><br><b><p>".$row['firstname']." ".$row['lastname']."</b><p>".$row['comment']."</p>".date('F j,Y',strtotime($row['created_at']))." at ".date("ha",strtotime($row['created_at']))."<br><br>" ;?>
                                            </div>
                                        </div>
                                    </div>
                                    <div class= "container1">
                                        <div class= "container4">
                                            <div class="note" >
                                                <p><b>Add a note about <?php echo $results[0]['firstname'];?></p></b>
                                                <form method = "get">
                                                    <textarea id="area" name="area" placeholder="Enter details here" required></textarea>
                                                    <div class="saveNote">
                                                        <button value="<?php echo $results[0]['id']?>" name="save" id="save">Save</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php include 'newUser.php';?>
                        </body>
                    </html>
<?php }
 else{
     header('location:dashboardFilter.php');    
 }?>

