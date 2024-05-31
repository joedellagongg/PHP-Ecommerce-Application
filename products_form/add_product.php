<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="authentication.php" method="POST">
        <input placeholder="Product Name" type="text" name="product_name">
        <input placeholder="Product Price" type="text" name="product_price">
        <input placeholder="Product Stocks" type="number" name="product_stocks">
        <input placeholder="Image" type="file" name="image">

        <button type='submit'>SUBMIT</button>
    </form>


    <?php
    
    include("../database/connection.php");

    $sql = "SELECT id, product_name, price, stocks, image FROM products";
    $result = $conn->query($sql);
    
    ?>
            
<form action="" method="post">

<table>
  <tr>
    <th>ID</th>
    <th>IMAGE</th>
    <th>PRODUCT</th>
    <th>QUANTITY</th>
    <th>PRICE</th>
  </tr>
  <tr>
  <?php  while($row=$result->fetch_assoc()){ ?>
        <td><input type="checkbox"></td>
        <td><?php echo $row["id"]; ?></td>
        <td><img class="product-cards" style="border: none; width: 100px; height:100px;" src="data:image/jpeg;base64,<?php echo base64_encode( $row['image'] ); ?>"  alt=""></td>            
        <td><p class="product_name"><?php echo $row["product_name"]; ?></p></td>
        <td><p class="product_stocks"><?php echo $row["stocks"]; ?></p></td>
        <td><h3>₱<?php echo $row["price"]; ?></h3></td>
    </tr>
    <?php
      }
    ?>

</table>

<button class="del" name="delete" type="submit" value="<?php echo $row["id"]; ?> "> <i class="fa-solid fa-trash" style="color: #ff0000;"></i>Delete</button>
</form>

<?php
      if(isset($_POST["delete"]) && isset($_POST["deleteId"])){
      foreach($_POST["deleteId"] as $deleteId){
        $delete = "DELETE FROM `products` WHERE id = $deleteId";
        mysqli_query($conn, $delete);
        header("Location: carts.php");
      }
    }
?>

<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

th{
 
    text-align: center;
}

td {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}

</style>
</body>
</html>