<?php
session_start(); // Start the session

// Check if the checkout form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['checkout'])) {
    // Validate form data (you might want to add more robust validation)
    $customer_name = $_POST['customer_name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    // Here you would typically save order details to a database
    // For simplicity, let's just display the order details
    echo "<h2>Order Details</h2>";
    echo "<p>Customer Name: $customer_name</p>";
    echo "<p>Email: $email</p>";
    echo "<p>Address: $address</p>";

    // Clear the cart after successful checkout
    unset($_SESSION['cart']);

    // Here you might want to send a confirmation email to the customer

    // Redirect the user to a thank you page
    // header("Location: thank_you.php");
    // exit;
} else {
    // If the form is not submitted properly, redirect the user back to the checkout page
    header("Location: checkout.php");
    exit;
}
?>
