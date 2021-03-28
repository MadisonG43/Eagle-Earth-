<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="styles.css">
<div class="topnav">
     <a href=storee.php>Back to Store</a>
   </div>
<body>
</div>
           <div class="cart">
              <div class="col-25">
    <div class="container">
      <h4>Cart
        <span class="price" style="color:black">
          <b><?php include("connecting.php");
          
          $sqlcart="SELECT * FROM springsale WHERE customerid='customerid'";

if ($result=mysqli_query($mySQLI,$sqlcart))
  {
  $rowcount=mysqli_num_rows($result);
  printf($rowcount);
  }
          ?></b>
        </span>
      </h4>
      <?php $sql = "SELECT * FROM products";
                $result = $mySQLI->query($sqlcart);

                if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<p>";
                echo $row["productName"];
                echo '<span class="price">';
                echo "$". $row['price'];
                }
                } else {
                    echo "Empty Cart";
                }
                ?></span></p>
      <hr>
      <p>Total <span class="price" style="color:black"><b>
          <?php $total = "SELECT SUM(price) AS total FROM products";
                $result = $mySQLI->query($total);
          $row = mysqli_fetch_assoc($result); 

          $sum = $row['total'];

          echo ("$$sum");
	?></b></span></p>
    </div>
  </div>
</div>


    <?php

$firstname = "";
$lastname = "";
$adr ="";
$city="";
$state = "";
$zip= "";

    $sql = "SELECT * FROM billinginfo";
    // Perform query
    $result = mysqli_query($mySQLI, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $firstname = $row["firstName"];
            $lastname = $row["lastName"];
            $adr = $row["address"];
            $city=$row["city"];
            $state = $row["state"];
            $zip=$row["zipcode"];  
        }
    }

    $sql = "INSERT INTO billing (firstName, lastName, address, city, state, zipcode) VALUES ('$firstname', '$lastname', '$adr', '$city', '$state', '$zip')";

 
$mySQLI->close();

?>
    

                <div class="row">
    <div class="container">
      <form action="store.php" method="post">

        <div class="row">
            <h3>Billing Address</h3>
            <label for="user">First Name</label>
            <input type="text" name="first name" value="<?php if (isset($firstname)) { echo $firstname; } ?>" required/>
            <label for="fullname">Last Name</label>
            <input type="text" name="last name" value="<?php if (isset($lastname)) { echo $lastname; } ?>" required/>
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
          
          
              <?php
include("connecting.php");

$sql = "SELECT * FROM cardinfo";
    // Perform query
    $result = mysqli_query($mySQLI, $sql);
    $count = mysqli_num_rows($result);
    if ($count > 0) {
        while($row = mysqli_fetch_assoc($result)){
            $cardowner = $row["cardOwner"];
            $cardnumber = $row["cardNumber"];
            $cardexp= $row["cardExpiration"];
            $cvv=$row["cvv"]; 
        }
    }

 
    mysqli_close($mySQLI);

?>

          <div class="col-50">
            <h3>Payment</h3>
            </div>
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
    </head>
</html>
