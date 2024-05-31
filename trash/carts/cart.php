<?php
include_once("../database/connection.php");

$sql = "SELECT id, product_name, price FROM products";
$result = $conn->query($sql);
session_start(); // Start the session

// Initialize cart if it's not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Function to add item to cart
function addToCart($id, $name, $price, $quantity = 1) {
    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity'] += $quantity;
    } else {
        $_SESSION['cart'][$id] = ['name' => $name, 'price' => $price, 'quantity' => $quantity];
    }
}

// Function to remove item from cart
function removeFromCart($id) {
    unset($_SESSION['cart'][$id]);
}

// Function to display cart
// Function to display cart and calculate total price
function displayCart() {
    $totalPrice = 0;
    if (empty($_SESSION['cart'])) {
        echo "Your cart is empty.";
    } else {
        foreach ($_SESSION['cart'] as $id => $item) {
            $itemTotal = $item['price'] * $item['quantity'];
            $totalPrice += $itemTotal;
            echo "Product: {$item['name']} | Price: {$item['price']} | Quantity: {$item['quantity']} | Total: $itemTotal <br>";
            echo "<form method='post'><input type='hidden' name='remove_product_id' value='{$id}'><button type='submit' name='remove_from_cart'>Remove</button></form>";
        }
        echo "<strong>Total Price: $totalPrice</strong>";
    }
}

// Add to cart when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    addToCart($product_id, $product_name, $product_price);
    header("Location: ".$_SERVER['HTTP_REFERER']); // Redirect back to previous page
    exit;
}

// Remove from cart when form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove_from_cart'])) {
    $product_id = $_POST['remove_product_id'];
    removeFromCart($product_id);
    header("Location: ".$_SERVER['HTTP_REFERER']); // Redirect back to previous page
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Ecommerce Checkout</title>
</head>
<body>
    <h1>Products</h1>
    <ul>
    <?php while($row=$result->fetch_assoc()){ ?>
        <li>
            <form method="POST" >
                <input type="hidden" name="product_id" value="<?php echo $row['id']?>">
                <p><?php echo $row['product_name']?></p>
                <input type="hidden" name="product_name" value="<?php echo $row['product_name']?>">
                <?php echo $row['price']?>
                <input type="hidden" name="product_price" value="<?php echo $row['price']?>">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form>
           
        </li>
        <?php }?>
        <li>
            <!-- <form method="POST">
                <input type="hidden" name="product_id" value="2">
                <input type="hidden" name="product_name" value="Product 2">
                <input type="hidden" name="product_price" value="15.00">
                <button type="submit" name="add_to_cart">Add to Cart</button>
            </form> -->
        </li>
    </ul>

    <h1>Cart</h1>
    <?php displayCart(); ?>

    <h1>Checkout</h1>
    <form method="post" action="process_order.php">
        <label for="customer_name">Name:</label>
        <input type="text" id="customer_name" name="customer_name" required><br>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="address">Address:</label>
        <textarea id="address" name="address" required></textarea><br>
        <button type="submit" name="checkout">Checkout</button>
    </form>
</body>
</html>
