<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&display=swap" rel="stylesheet">
  
  
<link rel="stylesheet" href="styles.css">
<h1 style="text-align: center;"> Welcome to the Garden Shed's Store!</h1>
<button class="logout"onclick = "window.location.href='logout.php'" >logout</button>
<body>
<span><i class="shopping-cart"> <a href=billing.php><img src='http://cdn1.iconfinder.com/data/icons/jigsoar-icons/24/_cart.png'></a></i></span>
    <div class="slideshow">
    <!--Initialize the session-->

        <!--Get all of the product stock-->
      <h4>  <?php
            include "connecting.php";
            $sql = "SELECT * FROM products";
            // Perform query
            $result = mysqli_query($mySQLI, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                while($row = mysqli_fetch_assoc($result)){
                    $productName = $row["productName"];
                    $price = $row["price"];
                    $image = $row["image"];
                    $quantity=$row["quantity"];
                    $img = "data:image/jpeg " . base64_encode( $row['image'] );
                    include "product.php";
                }
            }
            mysqli_close($mySQLI);
        ?></h4>


    </div>
   <style>
       .shopping-cart {
    display: inline-block;
    background: no-repeat 0 0;
    width: 24px;
    height: 24px;
    margin: 0 10px 0 0;
}

.button2{
    background-color:lightgreen; 
  color:black;
	justify-content: flex-end;
  border-radius: 1vw 1vw;
  font-size: 2vw;
  padding: 0vw .5vw;
  cursor:pointer;  
}

.logout{
    background-color:lightgreen;
    color: black;
    text-decoration: none;
    padding: 0vw .5vw;
    cursor:pointer; 
    font-size: 2vw;
}

span{
float: right;
}

   </style> 
</body>
</html>
