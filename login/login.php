<?php
    session_start();
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
            <a href="../products_home/products.php"><div class="ec-logo">PhoneParts.com</div></a>
        </header>
        <div class="login-landing">
            <main>
                <div class="form-user">
                    <form action="authentication.php" method="POST" class="form">
                        <p class="form-title">Login to your account</p>
                        <div class="credential_data">
                            <div class="input-container">
                                <input type="text" name="username" placeholder="Enter Email" />
                            </div>

                            <div class="input-container">
                                <input type="password" name="password" placeholder="Enter Password" />
                            </div>
                            <button type="submit" name="login" class="submit">Sign in</button>
                        </div>
                        <p class="signup-link">
                            No account?  | 
                            <a href="../signup/sign_up.php">Sign up</a>
                        </p>
                    </form>
                    
                </div>
                
            </main>
        </div>
    <style>
            body{
                background-image: url(image.png);
                background-repeat: no-repeat, repeat;
                background-size: cover;
            }
    </style>
    </body>
</html>
