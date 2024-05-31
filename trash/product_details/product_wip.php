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
    <title>Document</title>
</head>


<body>
    <div class="head">
        <?php include("../interface/header.php"); ?>
    </div>

    <form method="POST" action="" class="mains">
        <main>
            <div class="picture">
            <img src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  alt="">
            </div>
            <div class="info-ctrl">
                <div class="info">
                    <h1><?php echo $html_id ?></h1>
                    <h1><?php echo $html_name ?></h1>
                    <h1><?php echo $html_price ?></h1>
                    <a href=""><button><H1>Add to Cart</H1></button></a>
                </div>
            </div>
        </main>
    </form>
</body>
</html>

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
    *{
        margin: 0;
    }

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
        justify-content: center;
        align-items: center;
        width: 100vw;

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