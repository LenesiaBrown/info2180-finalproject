<?php

$userId = 5;

$host = 'localhost';
$username = 'project2_user';
$password = 'password123';
$dbname = 'dolphin_crm';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


// if(isset($_SESSION['email'])){
//     $email = $_SESSION['email'];
//     $stmt = $conn->prepare("SELECT * FROM `user` WHERE `email` = :email");
//     $stmt->bindParam(':email', $email, PDO::PARAM_INT);
//     $stmt->execute();

//     $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

//     $userId = $results[0]['id'];
    
// }

if (isset($_GET['filter'])) {
    $filter = strip_tags(stripslashes(strval($_GET['filter'])));
    
} ?>


<tr>
    <th>Name</th>
    <th>Email</th>
    <th>Company</th>
    <th>Type</th>
    <th></th>
</tr>

<?php

switch($filter){
    case 'all':
        $stmt = $conn->query("SELECT * FROM `contacts`");
        
        break;
    case 'salesperson':
        $stmt = $conn->query("SELECT * FROM `contacts` WHERE `type` = 'SALES LEAD'");

        break;
    case 'support':
        $stmt = $conn->query("SELECT * FROM `contacts` WHERE `type` = 'SUPPORT'");
        break;
    case 'my_assigned':
        $stmt = $conn->prepare("SELECT * FROM `contacts` WHERE `assigned_to` = :userId");
        $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmt->execute();
        break;
    default:
        break;

}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $row) :
?>

    <tr>
        <td><?= $row['title'] . " " . $row['firstname'] . " " . $row['lastname'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['company'] ?></td>

        <?php
        if ($row['type'] === 'SALES LEAD') {
        ?>
            <td>
                <div class="salesLead">SALES LEAD</div>
            </td>

        <?php } else { ?>

            <td>
                <div class="support">SUPPORT</div>
            </td>

        <?php } ?>

        <td><a href="<?= $row['id'] ?>" class="view-contact-link">View</a></td>
    </tr>

<?php endforeach ?>