<!DOCTYPE html>
<html lang="en">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:600|Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="styles.css">
<body>
<div class = "product">
    <img src = "<?php echo $img?>" class = "image" alt="<?php echo $productName;?>">
    <h4 class = "pc"><?php echo $productName;?></h4>
    
    <form class = "pc" method = "post" class = "logincontent" action = "additem.php?product=<?php echo $product;?>">
        <input class = "pc" type = "text" name = "quantity" placeholder="Quantity"required="required"><br>
        <button class = "button2 pc">Add to cart</button>
    </form><br>
</div>
<br>

<style>
    body{
    background-image:url("https://i.postimg.cc/zBy1h1D1/IMG-8019-1.jpg");
    background-size: cover;
    
    }

    h4 {
     font-size: 6vw;
     color: black;
     font-family: 'PT Sans Narrow', sans-serif;
   }

   .product {
    border: 5px solid white;
    position: relative;
}

.pc {
    position: relative;
    z-index: 5;
}

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


    </style>
    </body>
    </html>
