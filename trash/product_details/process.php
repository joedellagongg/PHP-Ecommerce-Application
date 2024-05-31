<?php 

session_start();

include("../database/connection.php");

echo $_SESSION["id"];

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $product_id = $_POST["p_id"];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    // $customer_id = $_SESSION["id"];
    
if($conn){  
    $sql = "INSERT INTO `carton` (customer_id, product_id, name, price)VALUES('$product_id', '$product_id','$product_name', '$product_price')";
    $result = mysqli_query($conn, $sql);
    if($result){
        header("location: ../products/products.php");

    }else{
        echo "NOTHING HAPPENED";
    }
}
}
