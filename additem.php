<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">
    <link rel = "stylesheet" type = "text/css" href = "styles.css" />
</head>
<body>
    <!--PHP for adding an item to the cart-->
    <?php
        include "session.php";
        include "connecting.php";
        $customerid = $_SESSION['customerid'];
        $product = $_GET["product"];
        $quantity = $_POST["quantity"];
        if($quantity>0){
            $sql = "INSERT INTO springsale (productID, quantity, customerID) VALUES ('$productid', '$quantity', '$customerid')";
            mysqli_query($mySQLI, $sql);
        }
        header("Location: billing.php");
        exit();
    ?>
</body>
</html>
