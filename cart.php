<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="styles.css">
<div class="topnav">
     <a href=storee.php>Back to Store</a>
   </div>
<body>
</div>
 
<?php
            
            include "connecting.php";
            $_SESSION['customerid'] = $cid ;
            $sql="SELECT * FROM springsale WHERE customerID= '$cid'";
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    $quantity = $row["quantity"];
                    $product = $row["item"];
                    $id = $row["orderid"];
                    $sql = "SELECT * FROM products WHERE productID = '$pid'";
                    $rslt = mysqli_query($mySQLI, $sql);
                    $rw = mysqli_fetch_assoc($rslt);
                    $productType = $rw["productType"];
                    $price = $rw["price"];
                    $show = "yes";
                    $img = "data:image/jpeg;base64, " . base64_encode($rw['image']);
                }
            }else{
                echo "<br> <h2>Any items you add to your cart will appear here</h2> <br>";
            }
?>
          <style>
          h2{
            font-size: 3vw;
          }
          </style>

                <div class="row">
    <div class="container">
      <form action="billing.php" method="post">

        <div class="row">
            <h3>Billing Address</h3>
            <label for="user">First Name</label>
            <input type="text" name="firstname" placeholder="firstname" required/>
            <label for="fullname">Last Name</label>
            <input type="text" name="lastname" value="<?php if (isset($lastname)) { echo $lastname; } ?>" required/>
            <label for="adr">Address</label>
            <input type="text" name="adr" value="<?php if (isset($adr)) { echo $adr;} ?>" required/>
            <label for="city">City</label>
            <input type="text" name="city" value="<?php if (isset($city)) { echo $city;} ?>" required/>
                <label for="state">State</label>
                <input type="text" name="state" value="<?php if (isset($state)) { echo $state;} ?>" required/>
                <label for="zip">Zipcode</label>
                <input type="text" name="zip" value="<?php if (isset($zip)) { echo $zip;} ?>" required/>
            </div>
          </div>
          </form>
          

          <div class="col-50">
            <h3>Payment</h3>
            </div>
            <form action="cardinfo.php" method="post">
            <label for="cardOwner">Name on Card</label>
            <input type="text" name="cardOwner"  value= "<?php echo "DO NOT USE REAL INFO"?>" />
            <label for="cardNumber">Credit card number</label>
            <input type="text" name="cardNumber" value= "<?php echo "DO NOT USE REAL INFO"?>" />
            <label for="cardExpiration">Exp</label>
            <input type="text" name="cardExpiration" value= "<?php echo "DO NOT USE REAL INFO"?>" />

              <div class="col-50">
                <label for="cvv">CVV</label>
                <input type="text" name="cvv" value= "<?php echo "DO NOT USE REAL INFO"?>" />
              </div>
            </div>
          </div>

        </div>
        <label>
          <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
        </label>
        <button type="submit" name="cont_checkout" class="btn"  onclick="window.location.href='storee.php'">Continue to Checkout</button>
      </form>
    </div>
  </div>
  </div>

       </body> 
</html>
