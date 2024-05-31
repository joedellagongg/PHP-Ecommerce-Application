<?php

    include("../database/connection.php");


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $product_id = $html_id;
        $product_name = $html_name;
        $product_price = $html_price;
        $quantity = $_POST['quantity'];
        $totalprice = $product_price * $quantity;
        $c_id = $_SESSION['id'];
        
    if($conn){  
        $sql = "INSERT INTO `orders` (customer_id, order_id, order_ts, product_name, quantity, price)VALUES('$c_id', '$product_id','$product_name', '$quantity', '$totalprice')";
        $result = mysqli_query($conn, $sql);
        if($result){
            echo "<script>window.location.href='../products/products.php';</script>";
    
        }else{
            echo "NOTHING HAPPENED";
        }
    }
    }
?>