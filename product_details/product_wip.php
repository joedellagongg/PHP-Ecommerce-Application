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
    <title><?php echo $html_name ?></title>
</head>


<body>
    
    <div class="head">
        <?php include("../interface/header.php"); ?>
    </div>

   
        <main>
            <div class="picture">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  alt="">
            </div>
            <div class="info-ctrl">
            <div class="textest">
            <form method="POST" action="" class="mains">
                <div class="info">
                    <h1 class="title"><?php echo $html_name ?></h1>
                    <h1 class="price"><?php echo $html_price ?></h1>
                    <!-- <input name="quantity" value="1" type="number"> -->
                    <form  method="POST" action="" class="mains">
                    <input class="qty" name="quantity" value="1" type="number">

                    <button><p>Add to Cart</p></button>
                    </form> 
                </div>
                <form class="info" action="">
                    <a href="../orders/order.php"><button><H1>Buy Now</H1></button></a>
                </form>
                </div>
            </div>
        </main>
    
</body>
</html>

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product_id = $html_id;
        $product_name = $html_name;
        $product_price = $html_price;
        $quantity = $_POST['quantity'];
        $totalprice = $product_price * $quantity;
        $c_id = $_SESSION['id'];
        
    if($conn){  
        $sql = "INSERT INTO `carton` (customer_id, product_id, name, quantity, price)VALUES('$c_id', '$product_id','$product_name', '$quantity', '$totalprice')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>window.location.href='../products/products.php';</script>";
    
        }else{
            echo "NOTHING HAPPENED";
        }
    }
    }
?>

<style>
    *{
        margin: 0;
    }

    .textest{
        margin-left: 20px;
        margin-top: 30px;

    }

    h1{
        font-family: WebsiteMainFont;
    }

    /* .qty{
        width: 50px;
        height: 40px
    }

    .title{
        margin-left: 20px;
        margin-top: 30px;
    }

    .price{
        margin-left: 20px;
        margin-top: 30px;
    } */

    head{
        display: flex;
        align-items: center;
        justify-content: center;
    }

    img{
        width: 505px;
        height: 500px;
    }

    main{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 100vw;
        height: 100vh;
    }

    .mains{
        display: flex;
        /* justify-content: center; */
        align-items: center;
        width: 100% ;

    }

    .picture{
        width: 500px;
        height: 500px; 
    }

    .info{
      margin: 10px;
      
    }

    .info-ctrl{
        width: 700px;
        height: 500px;
        background-color: #f2f2f2;

        
    }
</style>