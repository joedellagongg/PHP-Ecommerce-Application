<?php
    include('../database/connection.php');

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_stocks = $_POST['product_stocks'];
        $image = $_POST['image'];

    if($conn){  
        $sql = "INSERT INTO `products` (product_name, price, stocks, image)VALUES('$product_name', '$product_price', $product_stocks, '$image')";
        $result = mysqli_query($conn, $sql);
        if($result){
            header("location: add_product.php");

        }else{
            echo "NOTHING HAPPENED";
        }
    }
    }
