<?php
require_once('item.php');
require_once('connect.php');

if ($_SERVER["REQUEST_METHOD"] == "POST" &&
    isset($_FILES['image']) && isset($_POST['location']) && isset($_POST['description']) &&
    isset($_POST['rating']) && isset($_POST['price']) && isset($_POST['discount_price'])) {

    $image = $_FILES['image'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $rating = $_POST['rating'];
    $price = $_POST['price'];
    $discount = $_POST['discount_price'];

    $uploadDir = "images/";
    $uploadFile = $uploadDir . basename($_FILES['image']['name']);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $item = new Item($con, $uploadFile, $location, $description, $rating, $price, $discount);

        if (!$item->itemIsExist()) {
            if ($item->addItem()) {
                echo "<script>alert('Item added successfully.')</script>";
            } else {
                echo "<script>alert('Failed to add item.')</script>";
            }
        } else {
            echo "<script>alert('This item already exists')</script>";
        }
    } else {
        echo "<script>alert('Failed to upload file.')</script>";
    }
}
?>


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Item</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<header>
    <div id="menu-bar" class="fas fa-bars" onclick="showmenu()"></div>
    <nav class="navbar">
        <a href="index.php">home</a>
        <a href="adminPage.php">Users</a>
        <a href="adminReservation.php">reservation</a>
        <a href="logout.php">logout</a>
    </nav>
</header>

<section class="book" id="book">
    <h1 class="heading">
        <span>A</span>
        <span>d</span>
        <span>d</span>
        &nbsp;
        &nbsp;
        <span>I</span>
        <span>T</span>
        <span>E</span>
        <span>M</span>
    </h1>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header">
                        Upload Item
                    </div>
                    <div class="card-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="image">Image:</label>
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <label for="location">Location:</label>
                                <input type="text" class="form-control" id="location" name="location">
                            </div>
                            <div class="form-group">
                                <label for="description">Description:</label>
                                <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="rating">Rating:</label>
                                <input type="number" class="form-control" id="rating" name="rating" min="1" max="5">
                            </div>
                            <div class="form-group">
                                <label for="price">Price:</label>
                                <input type="number" class="form-control" id="price" name="price" step="0.01">
                            </div>
                            <div class="form-group">
                                <label for="discount_price">Discount Price:</label>
                                <input type="number" class="form-control" id="discount_price" name="discount_price" step="0.01">
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container mt-5">
    <h1 class="heading">Items Table</h1>
    <?php
        item::displayItemsTable($con);
    ?>
</div>

<!-- Bootstrap JS (optional) -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>

