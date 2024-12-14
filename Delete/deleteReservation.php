<?php
require_once('../connect.php');
require_once('../reservation.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    reservation::deleteReservation($con,$id);
    header('location:../adminReservation.php');

    
}