<?php

    session_start();
    if(session_destroy()){
        echo"hi";
        header("location: ../products_home/products.php");
    }
?>