
<?php
require_once('../connect.php');

$update = 0;
$updateid = $_GET['id'];

$sql = "SELECT * FROM reservations WHERE id=:updateid";
$res = $con->prepare($sql);
$res->bindParam(':updateid', $updateid);
$res->execute();

if($res->rowCount() > 0) { 
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $checkIn = $row['CheckIn'];
        $checkOut = $row['CheckOut'];
        $rooms = $row['Rooms'];
        $adults = $row['Adults'];
        $children = $row['Children'];
        $location = $row['location'];
    }

    if(isset($_POST['submit'])){
        $checkIn = $_POST['checkIn'];
        $checkOut = $_POST['checkOut'];
        $rooms = $_POST['rooms'];
        $adults = $_POST['adults'];
        $children = $_POST['children'];
        $location = $_POST['location'];
        
        $sql = "UPDATE reservations SET CheckIn=?, CheckOut=?, Rooms=?, Adults=?, Children=?, location=? WHERE id=?";
        $query = $con->prepare($sql);
        $query->bindParam(1, $checkIn);
        $query->bindParam(2, $checkOut);
        $query->bindParam(3, $rooms);
        $query->bindParam(4, $adults);
        $query->bindParam(5, $children);
        $query->bindParam(6, $location);
        $query->bindParam(7, $updateid);
        
        $resultat = $query->execute();
        if ($resultat){
            $update = 1;
            header('Location: ../adminReservation.php');
        } else {
            $update = 0;
        }
    }
} else {
    echo "No reservation found with the given ID.";
}
?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Reservation</title>
    <link rel="stylesheet" href="../css/styleGeneral.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<?php
if ($update == 1) {
    echo "<div class='message success'>Update successful!</div>";
} elseif ($update == 0) {
    echo "<div class='message error'>Update failed!</div>";
}
?>

<section class="book" id="book">
    <h1 class="heading">Update Reservation</h1>
    <div class="row">
        <form method="post" action="">
            <div class="inputdiv">
                <h3>Check In</h3>
                <input type="date" name="checkIn" value="<?php echo $checkIn; ?>" required>
            </div>
            <div class="inputdiv">
                <h3>Check Out</h3>
                <input type="date" name="checkOut" value="<?php echo $checkOut; ?>" required>
            </div>
            <div class="inputdiv">
                <h3>Rooms</h3>
                <input type="number" name="rooms" value="<?php echo $rooms; ?>" required>
            </div>
            <div class="inputdiv">
                <h3>Adults</h3>
                <input type="number" name="adults" value="<?php echo $adults; ?>" required>
            </div>
            <div class="inputdiv">
                <h3>Children</h3>
                <input type="number" name="children" value="<?php echo $children; ?>" required>
            </div>
            <div class="inputdiv">
                <h3>Location</h3>
                <input type="text" name="location" value="<?php echo $location; ?>" required>
            </div>
            <input type="submit" class="btn" name="submit" value="Update">
        </form>
    </div>
</section>

</body>
</html>
