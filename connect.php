<?php
$host='localhost';
$dbname='travel';
$user='root';
$password='';
try{                  //DNS
    $con=new PDO("mysql:host=$host;dbname=$dbname",$user,$password);
}
catch(PDOException $e){
    echo "Error:".$e->getMessage();
}

