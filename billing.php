<?php
 session_start();
include "session.php";
include "connecting.php";
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$adr = $_POST['adr'];
$city= $_POST['city'];
$state = $_POST['state'];
$zip= $_POST['zip'];
$customer_id= $mySQLI->insert_id;

    $sql = "INSERT INTO billinginfo (customerid_id, firstname, lastname, address, city, state, zipcode) VALUES ('$customer_id','$firstname', '$lastname', '$adr', '$city', '$state', '$zip')";
    mysqli_query($mySQLI, $sql);
    header("Location:storee.php");
 
    $mySQLI->close();
?>
