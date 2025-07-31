<?php
// checkout.php
session_start();

// Debugging - remove in production
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if cart exists and has items
if (!isset($_SESSION['cart'])) {
    // Cart was never initialized
    $_SESSION['cart'] = [];
    header('Location: cart.blade.php');
    exit;
}

if (empty($_SESSION['cart'])) {
    // Cart exists but is empty
    $_SESSION['checkout_error'] = 'Your cart is empty. Please add items before checkout.';
    header('Location: cart.blade.php');
    exit;
}

// Calculate order totals
$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['price'] * $item['quantity'];
}
$tax = $subtotal * 0.08; // Example tax
$total = $subtotal + $tax;

// Prepare order data for JavaScript
$orderData = json_encode([
    'items' => $_SESSION['cart'],
    'subtotal' => $subtotal,
    'tax' => $tax,
    'total' => $total
]);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .step-indicator {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 2rem;
        }
        
        .step {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e5e7eb;
            color: #6b7280;
            font-weight: bold;
            margin: 0 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .step.active, .step.completed {
            background-color: #16a34a;
            color: white;
        }
        
        .step-line {
            width: 100px;
            height: 2px;
            background-color: #e5e7eb;
        }
        
        .step-line.completed {
            background-color: #16a34a;
        }
        
        .checkout-section {
            display: none;
        }
        
        .checkout-section.active {
            display: block;
        }
        
        .payment-method {
            border: 2px solid #e5e7eb;
            border-radius: 8px;
            padding: 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .payment-method.selected {
            border-color: #16a34a;
            background-color: #f0fdf4;
        }
        
        .card-logo {
            width: 40px;
            height: 25px;
            border-radius: 4px;
        }
        
        .error-message {
            display: none;
            background-color: #fee2e2;
            border: 1px solid #fca5a5;
            color: #dc2626;
            padding: 1rem;
            border-radius: 0.5rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Error Message Container -->
    <div id="error-message" class="error-message max-w-6xl mx-auto mt-4"></div>

    <!-- Navigation -->
    <nav class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                    <a href="index.php" class="text-xl font-bold text-green-800">GreenScape</a>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-600">Secure Checkout</span>
                    <i class="fas fa-lock text-green-600"></i>
                </div>
            </div>
        </div>
    </nav>

    <!-- Page Content -->
    <div class="max-w-6xl mx-auto px-4 pb-16">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <!-- Your form sections here -->
                <div class="bg-white rounded-lg shadow p-6">
                    <h2 class="text-2xl font-bold mb-6">Checkout Form</h2>
                    <p>Your checkout form content goes here...</p>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow p-6 sticky top-4">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h3>
                    <div id="order-summary-items" class="mb-6">
                        <!-- Items will be populated by JavaScript -->
                    </div>
                    <div class="space-y-3 border-t pt-4">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-semibold" id="summary-subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="font-semibold text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax:</span>
                            <span class="font-semibold" id="summary-tax">$0.00</span>
                        </div>
                        <div class="flex justify-between text-lg font-bold border-t pt-3">
                            <span>Total:</span>
                            <span class="text-green-600" id="summary-total">$0.00</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2024 GreenScape. All rights reserved.</p>
        </div>
    </footer>

    <script>
        // Initialize with data from PHP
        const orderData = <?php echo $orderData; ?>;
        let currentStep = 1;
        let selectedPaymentMethod = '';
        
        document.addEventListener('DOMContentLoaded', function() {
            // Display order summary
            displayOrderSummary();
            
            // Set up event listeners
            document.querySelectorAll('.payment-method').forEach(el => {
                el.addEventListener('click', function() {
                    selectPaymentMethod(this.dataset.method);
                });
            });
            
            // Check for any error messages from PHP
            if (sessionStorage.getItem('checkoutError')) {
                showError(sessionStorage.getItem('checkoutError'));
                sessionStorage.removeItem('checkoutError');
            }
        });
        
        function displayOrderSummary() {
            const itemsContainer = document.getElementById('order-summary-items');
            let itemsHTML = '';
            
            orderData.items.forEach(item => {
                itemsHTML += `
                    <div class="flex justify-between items-center mb-3">
                        <div class="flex-1">
                            <h4 class="font-semibold text-sm">${item.name}</h4>
                            <p class="text-gray-600 text-xs">Qty: ${item.quantity}</p>
                        </div>
                        <span class="font-semibold">$${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                `;
            });
            
            itemsContainer.innerHTML = itemsHTML;
            
            document.getElementById('summary-subtotal').textContent = `$${orderData.subtotal.toFixed(2)}`;
            document.getElementById('summary-tax').textContent = `$${orderData.tax.toFixed(2)}`;
            document.getElementById('summary-total').textContent = `$${orderData.total.toFixed(2)}`;
        }
        
        function selectPaymentMethod(method) {
            selectedPaymentMethod = method;
            document.querySelectorAll('.payment-method').forEach(el => {
                el.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
        }
        
        function showError(message) {
            const errorContainer = document.getElementById('error-message');
            errorContainer.textContent = message;
            errorContainer.style.display = 'block';
            
            // Auto-hide after 5 seconds
            setTimeout(() => {
                errorContainer.style.display = 'none';
            }, 5000);
        }
        
        // Form validation before submission
        function validateForm() {
            if (!selectedPaymentMethod) {
                showError('Please select a payment method');
                return false;
            }
            return true;
        }
    </script>
</body>
</html>