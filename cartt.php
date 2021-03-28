<!DOCTYPE html>
<link rel="stylesheet" href="styles.css">
<div class="topnav">
     <a href=storee.php>Back to Store</a>
   </div>
<body>
    <?php 
    session_start();
    ?>
    <!--Code for the content-->
    <div class = "content txt">
        <h1>Cart</h1>
        <form method = "post">
            <button class = "button2" name = "empty" value = "submit">Empty Cart</button>
        </form>
        <?php
            include "connecting.php";
            $mail = $_SESSION['email'];
            if(isset($_POST["empty"])){
                $sql = "DELETE FROM springsale WHERE customerid = 'customerid'";
                mysqli_query($mySQLI, $sql);
                header("Location:cartt.php");
            }
            $sql = "SELECT productid, quantity, orderid FROM springsale WHERE customerid = '$customerid'";
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $quantity = $row["quantity"];
                    $productid = $row["productid"];
                    $orderid = $row["orderid"];
                    $sql = "SELECT * FROM products WHERE productid = '$productid'";
                    $result = mysqli_query($mySQLI, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $productName = $orw["productName"];
                    $price = $row["price"];
                    $show = "yes";
                    $img = "data:image/jpeg;base64, " . base64_encode($rw['image']);
                    include "cartt.php";
                }
            }else{
                echo "<br> <p>Any items you add to your cart will appear here</p> <br>";
            }
            if(isset($_GET["error"])){
                echo "<script>alert('The number of items you have ordered has exceeded the number we have in stock.')</script>";
            }
        ?>
        <?php 
        include "billing.php";
        ?>
        <br>
        <button class = "button2" onclick = "window.location.href='order.php'">Place Order</button>
    </div>

    
</body>
</html>
