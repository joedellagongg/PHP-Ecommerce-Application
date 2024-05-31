<?php

include("../database/connection.php");


$id = $_GET["id"];
$sql = "SELECT * FROM products WHERE id='$id' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$html_id = $row["id"];
$html_price = $row['price'];
$html_name = $row['product_name'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?PHP echo $html_name ?> | PhoneParts.PH</title>
</head>

<body>

    <?php include("../interface/header.php"); ?>

    <div class="product_details">
        <main class="main">
            <form action="" method="POST">
            <?php { ?>
                <div class="pic-left">
                    <img class="main-picture" style="" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  alt="">
                </div>

                <div class="info-ctrl">
                    <h1><?php echo $html_id ?></h1>
                    <h1><?php echo $html_name ?></h1>
                    <h1><?php echo $html_price ?></h1>
                    <button><H1>Add to Cart</H1></button>
                </div>

            <?php } ?>
            </form>
        </main>
    </div>

    <?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product_id = $html_id;
        $product_name = $html_name;
        $product_price = $html_price;
        $c_id = $_SESSION['id'];
        
    if($conn){  
        $sql = "INSERT INTO `carton` (customer_id, product_id, name, price)VALUES('$c_id', '$product_id','$product_name', '$product_price')";
        $result = mysqli_query($conn, $sql);
    }
    }
    
    ?>


    <style>
        .pic-left{

        }

        main{
            display: flex;
        }
        .main-picture{
            height: 400px;

        }
    </style>

    

</body>
</html>