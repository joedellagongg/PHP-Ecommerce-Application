<?php
    include("../database/connection.php");
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="login.css" />
        <title>Carts | PhoneParts.PH</title>
    </head>
    <body>

      <?php 


      $sql = "SELECT id, product_name, stocks, price FROM products";
      $result = $conn->query($sql);

      if(isset($_POST["delete"]) && isset($_POST["deleteId"])){
        foreach($_POST["deleteId"] as $deleteId){
          $delete = "DELETE FROM `carton` WHERE id = $deleteId";
          mysqli_query($conn, $delete);
          header("Location: carts.php");
        }
      }
       ?>

        <form action="" method="post">            
            <main>
                <div class="cart-div">
                    <table>
                    <tr>
                        <th>ID</th>
                        <th>Carts</th>
                        <th>Quantity</th>
                    </tr>
                    <?php 
                        while($row=$result->fetch_assoc()){ 
                    ?>
                        <tr>    
                        <td><input name="deleteId[]" type="checkbox" value="<?php echo $row["id"]?>"></td>
                        <td><?php echo $row["product_name"]; ?></td>
                        <td><input type="number" value="<?php echo $row["stocks"]; ?>"></td>                    
                    </tr>
                    <?php }?>
                    </table>
                </div>
            </main>
            <div style="width:500px; height:500px" class="haha">
                <?php
                while($row=$result->fetch_assoc()){?>
                    <h1><?php echo $row["name"]; ?></h1>
                    <h1><?php echo $row["quantity"]; ?></h1>
                    <h1><?php echo $row["price"]; ?></h1>
                <?php }?>
            </div>      
            <?php
                $result = mysqli_query($conn, 'SELECT SUM(price) AS price FROM carton'); 
                $row = mysqli_fetch_assoc($result); 
                $sum = $row['price'];
            ?>


                <button class="del" name="delete" type="submit"> <i class="fa-solid fa-trash" style="color: #ff0000;"></i>Delete</button>

            </form>


            <form action="">
                    <input type="text" value="">
                    

            </form>

          </body>
        
    <style>

        .details{
            display:flex;
            justify-content: space-around;
        }

        main{
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100vw;
        }
        
        body::-webkit-scrollbar { 
            display: none;  /* Safari and Chrome */
        }

        .details{
            position: absolute;
            top: 100vh;
            width: 100vw;
            height: 100px;
            background-color: #dddddd;
        }

        .cart-div{
            margin-top: 20px;
            width: 70%;
        }

        .del{
            width: 100px;
            height: 50px;
        }

        a{
            text-decoration: none;
        }

        .p{
           font-family: WebsiteMainFont;
        }
        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
