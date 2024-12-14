<?php
require_once('../connect.php');
$update = 0;
$updateid = $_GET['id'];
$sql = "SELECT * FROM users WHERE id=:updateid";
$res = $con->prepare($sql);
$res->bindParam(':updateid', $updateid);
$res->execute();

if($res->rowCount() > 0) { 
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $name = $row['name'];
        $email = $row['email'];
        $tel = $row['tel'];
        $password = $row['password'];
    }

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $password = $_POST['password'];
        
        $sql ="UPDATE `users` SET `name`=?, `email`=?, `tel`=?, `password`=? WHERE id=?";
        $query = $con->prepare($sql);
        $query->bindParam(1, $name);
        $query->bindParam(2, $email);
        $query->bindParam(3, $tel);
        $query->bindParam(4, $password);
        $query->bindParam(5, $updateid);
        
        $resultat = $query->execute();
        if ($resultat){
             $update = 1;
             header('location:../adminPage.php');
        } else {
            $update = 0;
        }
    }
} else {
    echo "No user found with the given ID.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update User</title>
    <link rel="stylesheet" href="../css/styleGeneral.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
</head>
<body>

<?php
if ($update == 1) {
    echo "<div class='message success'>Update success!</div>";
} elseif ($update == 0) {
    echo "<div class='message error'>Update failed!</div>";
}
?>

<section class="book" id="book">
    <h1 class="heading">Update User</h1>
    <div class="row">
        <form method="post" action="">
            <div class="inputdiv">
                <h3>User name</h3>
                <input type="text" placeholder="User name" name="name" value="<?php echo $name;?>">
            </div>
            <div class="inputdiv">
                <h3>User email</h3>
                <input type="text" placeholder="User email" name="email" value="<?php echo $email;?>">
            </div>
            <div class="inputdiv">
                <h3>User phone number</h3>
                <input type="text" placeholder="User phone number" name="tel" value="<?php echo $tel;?>">
            </div>
            <div class="inputdiv">
                <h3>User password</h3>
                <input type="text" placeholder="User password" name="password" value="<?php echo $password;?>">
            </div>
            <input type="submit" class="btn" name="submit" value="Update">
        </form>
    </div>
</section>

</body>
</html>
