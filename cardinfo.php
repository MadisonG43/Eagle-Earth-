<?php
 session_start();
include "session.php";
include "connecting.php";
$co = $_POST['cardowner'];
$cn = $_POST['cardnumber'];
$cvv = $_POST['cvv'];
$customer_id= $mySQLI->insert_id;

    $sql = "INSERT INTO cardinfo (cardowner, cardnumber, cvv) VALUES ('$co','$cn', '$cvv')";
    mysqli_query($mySQLI, $sql);
    header("Location:storee.php");
 
    $mySQLI->close();
?>
