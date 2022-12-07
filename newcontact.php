<?php session_start();
     if (isset ($_SESSION['user'][0])){
?>
<html>
    <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>New Contact</title>
    <script src="createcontact.js"></script>
    </head>
    <body>
        <?php include 'index.php';?>
        <div class = "container">
            <div class ="screen">
                <div class ="buttons">
                    <div><a href="dashboard.php"><i class ="home" aria-hidden="true"></i>Home</a></div>
                    <div><a href="createcontact.php"><i class ="add-new-contact" aria-hidden="true"></i>New Contact</a></div>
                    <div><a href="userList.php"><i class ="users" aria-hidden="true"></i>Users</a></div>
                    <hr>
                    <div><a href=""><i class ="logout" aria-hidden="true"></i>Logout</a></div>
                </div>
            </div>
            <div class= "background">
                <div class= "records">
                    <h1>New Contact</h1>
                    <div class="record2">
                        <form method="post" id="form" action="">
                            <div class="table">
                                <div class="cell">
                                    <label for="title">Title</label><br>
                                    <select id="title" name="title">
                                        <option value="Mr."></option>
                                        <option value="Mrs."></option>
                                        <option value="Ms."></option>
                                        <option value="Dr."></option>
                                        <option value="Prof."></option>
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
                                             <input type="text" name="telephone" id="telephone" pattern ="[0-9]{3}-[0-9]{3}-[0-9]{4}" title="Telephone number must be in the format: XXX-XXX-XXXX"required/>
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
                                             <select id="type" name="type">
                                                <option value="1">Michael Scott</option>
                                                <option value="2">Dwight Shrute</option>
                                                <option value="3">Pam Beesley</option>
                                                <option value="4">Angela Martin</option>
                                                <option value="5">Kelly Kapoor</option>
                                                <option value="6">Jim Halpert</option>
                                            </select>
                                        </div><br>
                                    <div class ="cell"></div>
                                    </div><br>
                                    <div class="save-button">
                                        <button id="save">Save</button>
                                    </div>
                                 </form>
                            </div>
                            </div>
                            </div>
                            </div
                            <?php include 'note.php';?>
    </body>
</html>
<?php }
 else{
     header('location:dashboardFilter.php');    
 }?>