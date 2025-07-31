<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0,0,0,0.5);
        }
        
        .modal-content {
            background-color: #fefefe;
            margin: 15% auto;
            padding: 20px;
            border: none;
            border-radius: 10px;
            width: 80%;
            max-width: 400px;
        }
        
        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }
        
        .close:hover {
            color: black;
        }
        
        .quantity-input {
            width: 60px;
            text-align: center;
        }
        
        .cart-item {
            transition: all 0.3s ease;
        }
        
        .cart-item:hover {
            background-color: #f9fafb;
        }
        
        .empty-cart {
            min-height: 400px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;
        }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    @include('partial.navbar')

    <!-- Page Header -->
    <div class="bg-green-600 text-white py-16">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Shopping Cart</h1>
            <p class="text-xl">Review your selected plants before checkout</p>
        </div>
    </div>

    <!-- Cart Content -->
    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Cart Items -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                    <div class="p-6 border-b border-gray-200">
                        <h2 class="text-2xl font-bold text-gray-800">Cart Items</h2>
                    </div>
                    
                    <div id="cart-items">
                        <!-- Cart items will be populated by JavaScript -->
                    </div>
                    
                    <!-- Empty Cart State -->
                    <div id="empty-cart" class="empty-cart p-6 text-center" style="display: none;">
                        <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
                        <h3 class="text-xl font-semibold text-gray-600 mb-2">Your cart is empty</h3>
                        <p class="text-gray-500 mb-6">Add some beautiful plants to get started!</p>
                        <a href="{{ route('plants.indoor') }}" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                            Start Shopping
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h3>
                    
                    <div class="space-y-3 mb-6">
                        <div class="flex justify-between">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-semibold" id="subtotal">$0.00</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Shipping:</span>
                            <span class="font-semibold text-green-600">Free</span>
                        </div>
                        <div class="flex justify-between">
                            <span class="text-gray-600">Tax:</span>
                            <span class="font-semibold" id="tax">$0.00</span>
                        </div>
                        <div class="border-t pt-3">
                            <div class="flex justify-between">
                                <span class="text-lg font-bold">Total:</span>
                                <span class="text-lg font-bold text-green-600" id="total">$0.00</span>
                            </div>
                        </div>
                    </div>
                    
                    <button onclick="proceedToCheckout()" id="checkout-btn" class="w-full bg-green-600 text-white py-3 rounded-lg hover:bg-green-700 transition duration-300 mb-4" disabled>
                        Proceed to Checkout
                    </button>
                    
                    <div class="text-center">
                        <a href="{{ route('plants.indoor') }}" class="text-green-600 hover:text-green-700 transition duration-300">
                            <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
                        </a>
                    </div>
                    
                    <!-- Promo Code Section -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <h4 class="text-lg font-semibold mb-3">Promo Code</h4>
                        <div class="flex space-x-2">
                            <input type="text" id="promo-code" placeholder="Enter code" class="flex-1 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                            <button onclick="applyPromoCode()" class="bg-gray-600 text-white px-4 py-2 rounded-lg hover:bg-gray-700 transition duration-300">
                                Apply
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    @include('partial.footer')

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('loginModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-4 text-center">Login</h2>
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <button type="submit" name="login" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Login
                </button>
            </form>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal('registerModal')">&times;</span>
            <h2 class="text-2xl font-bold mb-4 text-center">Register</h2>
            <form method="POST">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Full Name</label>
                    <input type="text" name="name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" name="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                    <input type="password" name="password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Confirm Password</label>
                    <input type="password" name="confirm_password" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                </div>
                <button type="submit" name="register" class="w-full bg-green-600 text-white py-2 rounded-lg hover:bg-green-700 transition duration-300">
                    Register
                </button>
            </form>
        </div>
    </div>

    <script>
        // Cart functionality
        let cart = JSON.parse(localStorage.getItem('cart')) || [];
        let promoDiscount = 0;
        
        function displayCartItems() {
            const cartItemsContainer = document.getElementById('cart-items');
            const emptyCartContainer = document.getElementById('empty-cart');
            
            if (cart.length === 0) {
                cartItemsContainer.innerHTML = '';
                emptyCartContainer.style.display = 'block';
                document.getElementById('checkout-btn').disabled = true;
                updateOrderSummary();
                return;
            }
            
            emptyCartContainer.style.display = 'none';
            document.getElementById('checkout-btn').disabled = false;
            
            let cartHTML = '';
            cart.forEach((item, index) => {
                cartHTML += `
                    <div class="cart-item p-6 border-b border-gray-200">
                        <div class="flex items-center space-x-4">
                            <img src="https://images.unsplash.com/photo-1485955900006-10f4d324d411?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=200&q=80" 
                                 alt="${item.name}" class="w-20 h-20 object-cover rounded-lg">
                            <div class="flex-1">
                                <h3 class="text-lg font-semibold text-gray-800">${item.name}</h3>
                                <p class="text-gray-600">Indoor Plant</p>
                                <p class="text-green-600 font-bold text-lg">${item.price.toFixed(2)}</p>
                            </div>
                            <div class="flex items-center space-x-3">
                                <button onclick="updateQuantity(${index}, -1)" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-300">
                                    <i class="fas fa-minus text-sm"></i>
                                </button>
                                <input type="number" value="${item.quantity}" min="1" max="10" 
                                       class="quantity-input border border-gray-300 rounded-lg px-2 py-1 focus:outline-none focus:border-green-500"
                                       onchange="setQuantity(${index}, this.value)">
                                <button onclick="updateQuantity(${index}, 1)" class="w-8 h-8 bg-gray-200 rounded-full flex items-center justify-center hover:bg-gray-300 transition duration-300">
                                    <i class="fas fa-plus text-sm"></i>
                                </button>
                            </div>
                            <div class="text-right">
                                <p class="text-lg font-bold text-gray-800">${(item.price * item.quantity).toFixed(2)}</p>
                                <button onclick="removeFromCart(${index})" class="text-red-500 hover:text-red-700 transition duration-300 mt-2">
                                    <i class="fas fa-trash"></i> Remove
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            });
            
            cartItemsContainer.innerHTML = cartHTML;
            updateOrderSummary();
        }
        
        function updateQuantity(index, change) {
            if (cart[index]) {
                cart[index].quantity = Math.max(1, Math.min(10, cart[index].quantity + change));
                localStorage.setItem('cart', JSON.stringify(cart));
                displayCartItems();
                updateCartCount();
            }
        }
        
        function setQuantity(index, quantity) {
            const qty = parseInt(quantity);
            if (cart[index] && qty >= 1 && qty <= 10) {
                cart[index].quantity = qty;
                localStorage.setItem('cart', JSON.stringify(cart));
                displayCartItems();
                updateCartCount();
            }
        }
        
        function removeFromCart(index) {
            if (confirm('Are you sure you want to remove this item from your cart?')) {
                cart.splice(index, 1);
                localStorage.setItem('cart', JSON.stringify(cart));
                displayCartItems();
                updateCartCount();
                showNotification('Item removed from cart');
            }
        }
        
        function updateCartCount() {
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            document.getElementById('cart-count').textContent = totalItems;
        }
        
        function updateOrderSummary() {
            const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
            const tax = subtotal * 0.08; // 8% tax
            const discount = subtotal * promoDiscount;
            const total = subtotal + tax - discount;
            
            document.getElementById('subtotal').textContent = `${subtotal.toFixed(2)}`;
            document.getElementById('tax').textContent = `${tax.toFixed(2)}`;
            document.getElementById('total').textContent = `${total.toFixed(2)}`;
        }
        
        function applyPromoCode() {
            const promoCode = document.getElementById('promo-code').value.toUpperCase();
            const validCodes = {
                'WELCOME10': 0.10,
                'SAVE15': 0.15,
                'PLANTS20': 0.20
            };
            
            if (validCodes[promoCode]) {
                promoDiscount = validCodes[promoCode];
                showNotification(`Promo code applied! ${(promoDiscount * 100)}% discount`);
                updateOrderSummary();
            } else {
                showNotification('Invalid promo code', 'error');
            }
        }
        
        function proceedToCheckout() {
            if (cart.length === 0) {
                showNotification('Your cart is empty!', 'error');
                return;
            }
            
            // Store order summary for checkout page
            const orderData = {
                items: cart,
                subtotal: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0),
                tax: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * 0.08,
                discount: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * promoDiscount,
                total: cart.reduce((sum, item) => sum + (item.price * item.quantity), 0) * (1 + 0.08 - promoDiscount)
            };
            
            localStorage.setItem('orderData', JSON.stringify(orderData));
            window.location.href = '{{ route('checkout') }}';
        }
        
        function showNotification(message, type = 'success') {
            const notification = document.createElement('div');
            const bgColor = type === 'error' ? 'bg-red-600' : 'bg-green-600';
            notification.className = `fixed top-20 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 3000);
        }
        
        // Modal Functions
        function openModal(modalId) {
            document.getElementById(modalId).style.display = 'block';
        }
        
        function closeModal(modalId) {
            document.getElementById(modalId).style.display = 'none';
        }
        
        // Close modal when clicking outside
        window.onclick = function(event) {
            const modals = document.querySelectorAll('.modal');
            modals.forEach(modal => {
                if (event.target === modal) {
                    modal.style.display = 'none';
                }
            });
        }
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            displayCartItems();
            updateCartCount();
        });
    </script>
</body>
</html>

<?php
// PHP session management
session_start();

// Handle login
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Here you would typically validate against a database
    $_SESSION['user_email'] = $email;
    $_SESSION['logged_in'] = true;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}

// Handle registration
if (isset($_POST['register'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    // Here you would typically save to a database
    $_SESSION['user_name'] = $name;
    $_SESSION['user_email'] = $email;
    $_SESSION['logged_in'] = true;
    
    header('Location: ' . $_SERVER['PHP_SELF']);
    exit;
}
?>