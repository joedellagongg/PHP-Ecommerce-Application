<?php 

$lifetime=10;
session_start();
setcookie(session_name(),session_id(),time()+$lifetime); 
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="login.css" />
    </head>
    <body>
        <header>
            <a href="../products/products.php"><div class="ec-logo">PhoneParts.com</div></a>
            
            <nav>
                <a href="../products/products.php"><p class="p" style="color: white;">Home</p></a>
                <a href="../product_form/add_product.php"><p class="p" style="color: white;">Seller Centre</p></a>
                <a href="../orders/order.php"><p class="p" style="color: white;">Orders</p></a>
                <a href="../carts/carts.php"><p class="p" style="color: white;">Carts</p></a>
                <a href="../logout/logout.php"><p class="p" style="color: white;">Logout</p></a>
            </nav>
        </header>
        
    <style>
        nav{    
            display: flex;
            justify-content: space-between;
            margin: 33px;
            width: 400px;
            height: 20px;
            float: right;
        }

        /* body::-webkit-scrollbar {
        display: none;
        } */

        a{
            text-decoration: none;
        }

        .p{
           font-family: WebsiteMainFont;
        }
    </style>

    </body>
</html>

<style>
    * {
    margin: 0;
    box-sizing: border-box;
}

h1 {
    font-family: Calibri;
}

header {
    background-color: #61b336;
    width: 100%;
    height: 85px;
}

.ec-logo {
    position: absolute;
    width: 22rem;
}

main {
    /* margin-top: 60px; */
    width: 90%;
    /* background-color: black; */
    display: flex;
    justify-content: right;
    align-items: center;
}

.login-landing{
    /* background-color: #000; */
    height: 35rem;
}

.credential_data {
    margin-top: 2rem;
}


.form {
    background-color: #61b336;
    margin-top: 58px;
    display: block;
    padding: 1rem;
    width: 30rem;
    height: 30rem;
    border-radius: 0.5rem;
    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
}

.form-title {
    margin-top: 25px;
    font-size: 1.5rem;
    line-height: 1.75rem;
    font-weight: 600;
    text-align: center;
    color: #000;
}

.input-container {
    position: relative;
}

.input-container input,
.form button {
    outline: none;
    border: 1px solid #e5e7eb;
    margin: 8px 0;
}

.input-container input {
    background-color: #fff;
    padding: 1rem;
    padding-right: 3rem;
    font-size: 0.875rem;
    line-height: 1.25rem;
    width: 444px;
    border-radius: 0.5rem;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
}

.submit {
    display: block;
    padding-top: 0.75rem;
    padding-bottom: 0.75rem;
    padding-left: 1.25rem;
    padding-right: 1.25rem;
    background-color: #4f46e5;
    color: #ffffff;
    font-size: 0.875rem;
    line-height: 1.25rem;
    font-weight: 500;
    width: 100%;
    border-radius: 0.5rem;
    text-transform: uppercase;
}

.signup-link {
    /* margin-top: 10px; */
    color:antiquewhite;
    font-size: 0.875rem;
    line-height: 1.25rem;
    text-align: center;
}

.signup-link a {
    text-decoration: underline;
}

@font-face {
    font-family: WebsiteMainFont;
    src: url(../fonts/Roboto-Condensed.ttf);
}

@font-face {
    font-family: FontLOGO;
    src: url(../fonts/coolvetica\ rg\ it.otf);
}
</style>