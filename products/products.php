<?php

    // Meron na itong "session_start(). Nakalagay sa Include function sa may body ng HTML"

    include("../database/connection.php");

    $sql = "SELECT id, product_name, price, image FROM products";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="login.css" />
        <title>Product Shops | PhoneParts Shop</title>
    </head>
    <body>
    <?php 
        include("../interface/header.php");
    ?>
        <main>
            <div class="products">
            <?php while($row=$result->fetch_assoc()){ ?>
                <a style="text-decoration: none;" href="../product_details/product_wip.php?id=<?php echo $row["id"]; ?>"><div class="product">
                    <img class="product-cards" style="border: none;" src="data:image/jpg;charset=utf8;base64,<?php echo base64_encode($row['image']); ?>"  alt="">
                    <p class="product_name" style="text-decoration: none;"><?php echo $row["product_name"]; ?></p>
                    <h3>₱<?php echo $row["price"]; ?></h3>
                </div>
                </a>
                <?php }?>
            </div>
        </main>
    </body>
</html>

<style>
    .welcome{
        display: flex;
        width: 100%;
        background-color: wheat;
        height: 5%;
        text-align: center;
        padding-top: 6px;
        font-family: FontLOGO;
        font-size: 20px;
        color: black;
        }

    main {
        display: flex;
        width: 100%;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
    }
        
</style>