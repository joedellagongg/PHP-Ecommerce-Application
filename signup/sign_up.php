<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="login.css" />
        <title>Sign-up | PhoneParts Shop</title>
    </head>
    <body>
        <header>
            <a href="../products_home/products.php"><div class="ec-logo">PhoneParts.com</div></a>
        </header>

        <div class="login-landing">
            <main>
                <div class="form-user">
                    <form action="authentication.php" method="POST" class="form">
                        <p class="form-title">Create a New Account</p>
                        <div class="credential_data">
                            <p>Email Address</p>
                            <div class="input-container">
                                <input type="text" name="username" placeholder="Enter Email Address"  required/>
                            </div>
                            <p>Mobile Number</p>
                            <div class="input-container">
                                <input type="text" name="mobile-number" placeholder="PH 🇵🇭 (+63) Enter 11-Digit Mobile Number" required/>
                            </div>
                            <p>Password</p>
                            <div class="input-container">
                                <input type="password" name="password" placeholder="Enter Password" />
                            </div>
                            <button type="submit" class="submit">CREATE ACCOUNT</button>
                        </div>
                        <p class="signup-link">
                            Have an Account?  | 
                            <a href="../login/login.php">Login</a>
                        </p>
                    </form>
                </div>
            </main>
        </div>
    </body>
</html>
