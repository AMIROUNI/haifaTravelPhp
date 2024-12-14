<?php
require_once('connect.php');
require_once('reservation.php');
session_start();
$username=$_SESSION['name'];
$userid=$_SESSION['id'];

if (isset($_POST['checkIn']) && isset($_POST['checkOut']) && isset($_POST['Rooms']) && isset($_POST['Adults']) && isset($_POST['Children'])) {
    if (isset($_GET['location'])) {
        $location = $_GET['location'];
    } else {
        echo "Location parameter not found in the URL.";
        exit; // Exit if location is not found
    }

    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $rooms = $_POST['Rooms'];
    $adults = $_POST['Adults'];
    $children = $_POST['Children'];

    $reservation = new Reservation($con, $checkIn, $checkOut, $rooms, $adults, $children, $location,$username,$userid);
    
    if ($reservation->createReservation()) {
        echo "<script>alert('Reservation created successfully!')</script>";
        header('location:userPage.php');
    } else {
        echo "<script>alert('Failed to create reservation.')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Booking Form HTML Template</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/style.css" />
</head>

<body>



    <div id="booking" class="section">
        <div class="section-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 col-md-push-5">
                        <div class="booking-cta">
                            <h1>Make your reservation</h1>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
                        </div>
                    </div>
                    <div class="col-md-4 col-md-pull-7">
                        <div class="booking-form">
                            <form method="post" action="">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">Check In</span>
                                            <input class="form-control" type="date" name="checkIn" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <span class="form-label">Check Out</span>
                                            <input class="form-control" name="checkOut" type="date" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Rooms</span>
                                            <select class="form-control" name="Rooms" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Adults</span>
                                            <select class="form-control" name="Adults" required>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <span class="form-label">Children</span>
                                            <select class="form-control" name="Children" required>
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                            <span class="select-arrow"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button class="submit-btn" name="submit">Reserve now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
