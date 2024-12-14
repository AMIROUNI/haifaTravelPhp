<?php
require_once('item.php');
require_once('connect.php');

$update = 0;
$updateid = $_GET['id'];

$sql = "SELECT * FROM items WHERE id=:updateid";
$res = $con->prepare($sql);
$res->bindParam(':updateid', $updateid);
$res->execute();

if ($res->rowCount() > 0) {
    while ($row = $res->fetch(PDO::FETCH_ASSOC)) {
        $image_url = $row['image_url'];
        $location = $row['location'];
        $description = $row['description'];
        $rating = $row['rating'];
        $price = $row['price'];
        $discount_price = $row['discount_price'];
    }

    if (isset($_POST['submit'])) {
        $location = $_POST['location'];
        $description = $_POST['description'];
        $rating = $_POST['rating'];
        $price = $_POST['price'];
        $discount_price = $_POST['discount_price'];

        // Handle image upload if a new image is provided
        if (isset($_FILES['image']) && $_FILES['image']['size'] > 0) {
            $uploadDir = "images/";
            $uploadFile = $uploadDir. basename($_FILES['image']['name']);
            if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
                $image_url = $uploadFile;
                header('Location: itemPage.php');
            } else {
                echo "<script>alert('Failed to upload file.')</script>";
            }
        }

        $sql = "UPDATE items SET image_url=?, location=?, description=?, rating=?, price=?, discount_price=? WHERE id=?";
        $query = $con->prepare($sql);
        $query->bindParam(1, $image_url);
        $query->bindParam(2, $location);
        $query->bindParam(3, $description);
        $query->bindParam(4, $rating);
        $query->bindParam(5, $price);
        $query->bindParam(6, $discount_price);
        $query->bindParam(7, $updateid);

        $resultat = $query->execute();
        if ($resultat) {
            $update = 1;
            header('Location: ../itemPage.php');
        } else {
            $update = 0;
        }
    }
} else {
    echo "<script>alert('No item found with the given ID.');</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Item</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<?php
if ($update == 1) {
    echo "<div class='message success'>Update successful!</div>";
} elseif ($update == 0 && isset($_POST['submit'])) {
    echo "<div class='message error'>Update failed!</div>";
}
?>

<section class="book" id="book">
    <h1 class="heading">Update Item</h1>
    <div class="row">
        <form method="post" action="" enctype="multipart/form-data">
            <div class="inputdiv">
                <h3>Image</h3>
                <input type="file" name="image">
                <img src="<?php echo $image_url; ?>" alt="Current Image" style="width: 100px; height: auto;">
            </div>
            <div class="inputdiv">
                <h3>Location</h3>
                <input type="text" name="location" value="<?php echo $location; ?>" required>
            </div>
            <div class="inputdiv">
                <h3>Description</h3>
                <textarea name="description" rows="3" required><?php echo $description; ?></textarea>
            </div>
            <div class="inputdiv">
                <h3>Rating</h3>
                <input type="number" name="rating" value="<?php echo $rating; ?>" min="1" max="5" required>
            </div>
            <div class="inputdiv">
                <h3>Price</h3>
                <input type="number" name="price" value="<?php echo $price; ?>" step="0.01" required>
            </div>
            <div class="inputdiv">
                <h3>Discount Price</h3>
                <input type="number" name="discount_price" value="<?php echo $discount_price; ?>" step="0.01" required>
            </div>
            <input type="submit" class="btn" name="submit" value="Update">
        </form>
    </div>
</section>

</body>
</html>
