<?php
require_once('../connect.php');
require_once('../item.php');

if(isset($_GET['id'])){
    $id=$_GET['id'];
    item::deleteItem($con,$id);
    header('location:../itemPage.php');

    
}