<?php
include '../connect.php';
require_once('../user.php');
if(isset($_GET['id'])){
    $id=$_GET['id'];
    echo $deleteid;
    user::deleteUser($con,$id);
    header('location:../adminPage.php');

    
}



