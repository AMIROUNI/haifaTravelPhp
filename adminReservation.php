
<?php
require_once('connect.php');
require_once('reservation.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $rooms = $_POST['rooms'];
    $adults = $_POST['adults'];
    $children = $_POST['children'];
    $location = $_POST['location'];

    $reservation = new Reservation($con, $checkIn, $checkOut, $rooms, $adults, $children, $location,'admin',0);
    
    if ($reservation->createReservation()) {
        echo "<script>alert('Reservation created successfully!');</script>";
    } else {
        echo "<script>alert('Failed to create reservation.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign_Up</title>
    <link rel="stylesheet" href="css/styleGeneral.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@8/swiper-bundle.min.css"/>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
</head>
<body>



<header>
        <div id="menu-bar" class="fas fa-bars" onclick="showmenu()"></div>
     
        <nav class="navbar">
            <a href="#home">home</a>
            <a href="#book">book</a>
            <a href="#packages">packages</a>
            <a href="#services">services</a>
            <a href="itemPage.php">Items</a>
            <a href="adminPage.php">Users</a>
            <a href="logout.php">Logout</a>

      </div>
</header>
      

    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

    <section class="book" id="book">
        <h1 class="heading">
            <span>A</span>
            <span>d</span>
            <span>d</span>
            &nbsp;
            &nbsp;
            <span>R</span>
            <span>e</span>
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>a</span>
            <span>t</span>
            <span>i</span>
            <span>o</span>
            
        </h1>

        <div class="row">
            <div class="image">
                <img src="images/book-img.svg" alt="">
            </div>
            <form method="post">
            <div class="inputdiv">
                <h3>Check In</h3>
                <input type="date" name="checkIn" required>
            </div>
            <div class="inputdiv">
                <h3>Check Out</h3>
                <input type="date" name="checkOut" required>
            </div>
            <div class="inputdiv">
                <h3>Rooms</h3>
                <input type="number" name="rooms" required>
            </div>
            <div class="inputdiv">
                <h3>Adults</h3>
                <input type="number" name="adults" required>
            </div>
            <div class="inputdiv">
                <h3>Children</h3>
                <input type="number" name="children" required>
            </div>
            <div class="inputdiv">
                <h3>Location</h3>
                <input type="text" name="location" required>
            </div>
            <div class="inputdiv">
                <input type="submit" class="btn" value="Reserve now">
            </div>
        </form>
        </div>
    </section>
    <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>

     <section  class="displayUser">
     <h1 class="heading">
            <span>D</span>
            <span>I</span>
            <span>S</span>
            <span>P</span>
            <span>L</span>
            <span>A</span>
            <span>Y</span>
            &nbsp;
            &nbsp;
            &nbsp;
            <span>R</span>
            <span>e</span>
            <span>s</span>
            <span>e</span>
            <span>r</span>
            <span>v</span>
            <span>a</span>
            <span>t</span>
            <span>i</span>
            <span>o</span>
            
        </h1>
        <div class="container">
  <h2>Striped Rows</h2>
  <p>The .table-striped class adds zebra-stripes to a table:</p>            
  <table class="table table-striped">
  <thead>
                <tr>
                    <th>ID</th>
                    <th>Check In</th>
                    <th>Check Out</th>
                    <th>Rooms</th>
                    <th>Adults</th>
                    <th>Children</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
                <tbody>
                <?php
                Reservation::displayReservations($con);
                ?>
            </tbody>
        </table>
    </div>
</section>
 
       <!------------------------------------------------------------------------------------>
    <!------------------------------------------------------------------------------------>