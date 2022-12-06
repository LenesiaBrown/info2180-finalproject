
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>New Contact</title>
        <link rel ="stylesheet" href="">
        <script src=""></script>
        <link rel ="stylesheet" href="">
        <!-- <script src="createcontact.js"></script> -->
    </head>
    <body>
        
        <div class = "container">
            <!-- <div class ="screen">
                <div class ="buttons">
                    <div><a href="dashboard.php"><i class ="home" aria-hidden="true"></i>Home</a></div>
                    <div><a href="createcontact.php"><i class ="add-new-contact" aria-hidden="true"></i>New Contact</a></div>
                    <div><a href="newUser.php"><i class ="users" aria-hidden="true"></i>Users</a></div>
                    <hr>
                    <div><a href=""><i class ="home" aria-hidden="true"></i>Logout</a></div>
                </div>
            </div> -->
            <div id="wrapper">
        <nav id="nav-bar">
            <a href="dashboard.php">
                <button class="navButton"><img id="home-icon" src="images/homeIcon.png"> Home</button>
            </a>
            <a href="newContact.php">
                <button class="navButton"><img id="contact-icon" src="images/newContactIcon.png"> New Contact</button>
            </a>
            <a href="userList.php">
                <button class="navButton"><img id="users-icon" src="images/usersIcon.png">Users</button>
            </a>
            <hr>
            <a href="logIn.php">
                <button class="navButton"><img id="logout-icon" src="images/logoutIcon.png"> Logout</button>
            </a>
        </nav>
            <div class= "background">
                <div class= "records">
                    <h1>New Contact</h1>
                    <div class="record2">
                        <form method="post" id="form" action="createcontact.php">
                            <div class="table">
                                <div class="cell">
                                    <label for="title">Title</label><br>
                                    <select id="title" name="title">
                                        <option value="Mr.">Mr.</option>
                                        <option value="Mrs.">Mrs.</option>
                                        <option value="Ms.">Ms.</option>
                                        <option value="Dr.">Dr.</option>
                                        <option value="Prof.">Prof.</option>
                                    </select>
                                </div>
                                <div class="cel1"> 
                                </div>
                                    <div class="table">
                                         <div class="cell"> 
                                             <label for= "Fname">First Name</label>
                                             <input type="text" name="Fname" id="Fname" required/>
                                        </div>
                                    </div>
                                         <div class="cell"> 
                                             <label for= "Lname">Last Name</label>
                                             <input type="text" name="Lname" id="Lname" required/>
                                        </div>
                                    </div>
                                    <div class="table">
                                         <div class="cell"> 
                                             <label for= "email">Email</label>
                                             <input type="email" name="email" id="email" required/>
                                        </div>
                                    </div>
                                         <div class="cell"> 
                                             <label>Telephone number</label>
                                             <input type="text" name="telephone" id="telephone" placeholder="XXX-XXX-XXXX" pattern ="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Telephone number must be in the format: XXX-XXX-XXXX"required/>
                                        </div>
                                    </div>
                                    <div class="table">
                                         <div class="cell"> 
                                             <label for= "company">Company</label>
                                             <input type="text" name="company" id="company" required/>
                                        </div>
                                    </div>
                                    <div class="cell">
                                        <label for="type">Type</label><br>
                                            <select id="type" name="type">
                                                <option value="SALES LEAD">Sales Lead</option>
                                                <option value="SUPPORT">Support</option>
                                            </select>    
                                            </div>
                                    </div>
                                    <div class="table">
                                         <div class="cell"> 
                                             <label for= "assignedto">Assign To</label><br>
                                             <select id="assignedto" name="assignedto">
                                             <?php
                                                $host = 'localhost';
                                                $username = 'project2_user';
                                                $password = 'password123';
                                                $dbname = 'dolphin_crm';
                                            
                                                $conn= new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
                                                $users = $conn->query('SELECT * FROM users');

                                                foreach($users as $user):
                                            ?>
                                                <option value="<?=$user['id']?>"><?=$user['firstname']." ".$user['lastname']?></option>
                                                
                                                <?php endforeach; ?>
                                            </select>
                                        </div><br>
                                    <div class ="cell"></div>
                                    </div><br>
                                    <div class="save-button">
                                        <input type="submit" value="Save" id="save"></input>
                                    </div>
                                 </form>
                            </div>
                            </div>
                            </div>
                            </div
    </body>
</html>
