<?php
    include("../database/connection.php");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT id, product_name, price, image FROM products";
    $result = $conn->query($sql);
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="login.css" />
        <title>Login | PhoneParts Shop</title>
    </head>
    <body>
    <header>
            <div class="ec-logo">PhoneParts.com</div>

            <nav>
                <a href="../signup/sign_up.php"><p class="p" style="color: white;">Signup</p></a>
                <a href="../login/login.php"><p class="p" style="color: white;">Login</p></a>
            </nav>
        </header>
        <main> 
            <div class="products">
            <?php while($row=$result->fetch_assoc()){ ?>
                <a style="text-decoration: none;" href="../login/login.php"><div class="product">
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
        nav{    
            display: flex;
            justify-content: space-between;
            margin: 33px;
            width: 113px;
            height: 20px;
            float: right;
        }

        a{
            text-decoration: none;
        }

        .p{
           font-family: WebsiteMainFont;
        }
    </style>