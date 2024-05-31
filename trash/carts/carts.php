<?php

include("../database/connection.php");


$sql = "SELECT product_id FROM carts  ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
echo "".$row["product_id"]."";  
?>

<?php include("../interface/header.php"); ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="login.css" />
        <title>Login | PhoneParts Shop</title>
    </head>
    <body>

        <?php { ?>

            <img style="border: none;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  alt="">
            <h1><?php echo $row['price'] ?></h1>
            <h1><?php echo $row['product_name'] ?></h1>

        <?php } ?>

        
  </div>
        <!-- <style>
            body{
                background-image: url(phone.jpg);
                background-repeat: no-repeat, repeat;
                background-size: cover;
            }
        </style>        -->
    </body>
</html>
