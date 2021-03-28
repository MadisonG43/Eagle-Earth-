<?php
$servername= "localhost:3306";
$db_username="cchs_mgranger";
$db_password="eagles";
$db_database="cchs_mgranger";

$mySQLI = new mysqli($servername, $db_username, $db_password, $db_database);
if($mySQLI->connect_error){
    echo("Failed to connect: ".$mySQLI->connect_error);
    exit();
}
?>
