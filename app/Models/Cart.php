<?php
// In cart.php
session_start();

// When adding items to cart
$_SESSION['cart'][] = [
    'id' => $productId,
    'name' => $productName,
    'price' => $productPrice,
    'quantity' => $quantity
];

// Verify it worked
echo '<pre>Cart contents: ';
print_r($_SESSION['cart']);
echo '</pre>';
?>