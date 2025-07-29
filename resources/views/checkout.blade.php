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
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e5e7eb;
            color: #6b7280;
            font-weight: bold;
            margin: 0 1rem;
            position: relative;
        }
        
        .step.active {
            background-color: #16a34a;
            color: white;
        }
        
        .step.completed {
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
            transition: all 0.3s ease;
        }
        
        .payment-method:hover {
            border-color: #16a34a;
        }
        
        .payment-method.selected {
            border-color: #16a34a;
            background-color: #f0fdf4;
        }
        
        .card-logos {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .card-logo {
            width: 40px;
            height: 25px;
            background-size: contain;
            background-repeat: no-repeat;
            border-radius: 4px;
        }
        
        .visa { background-color: #1a1f71; background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 32"><path fill="white" d="M18.1 11.5h-3.5l-2.1 9h3.5l2.1-9zm14.9 0h-3.2l-4.1 9h3.5l.7-1.6h4l.4 1.6h3.9l-3.4-9zm-1.4 5.8l1.5-3.7.8 3.7h-2.3zm-7.5-5.8c-.7 0-1.8.3-2.8.9l.5 2.3c.8-.4 1.6-.7 2.5-.7.9 0 1.4.4 1.4.9 0 .4-.3.9-1.6 1.7-1.7 1-2.5 1.9-2.5 3.1 0 1.7 1.2 2.8 3.2 2.8 1 0 1.9-.2 2.5-.5l-.5-2.3c-.6.3-1.2.4-1.8.4-.8 0-1.2-.4-1.2-.8 0-.5.4-.9 1.7-1.8 1.6-.9 2.4-1.8 2.4-3 0-1.9-1.4-2.9-3.8-2.9zm-10.2 0l-3.6 9h-3.5l-1.8-6.8c-.1-.4-.2-.5-.5-.7-.5-.3-1.3-.6-2-.8l.1-.4h3.4c.4 0 .8.3.9.8l1.2 6.3 2.9-7.1h3.9v-.3z"/></svg>'); }
        .mastercard { background-color: #eb001b; background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 32"><circle fill="%23eb001b" cx="15" cy="16" r="8"/><circle fill="%23f79e1b" cx="33" cy="16" r="8"/><path fill="%23ff5500" d="M24 8c-2.2 2.4-3.5 5.6-3.5 9s1.3 6.6 3.5 9c2.2-2.4 3.5-5.6 3.5-9s-1.3-6.6-3.5-9z"/></svg>'); }
        .amex { background-color: #006fcf; background-image: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 48 32"><path fill="white" d="M6.4 11.5L8.9 18l2.5-6.5h3.1v9h-2v-6.8l-2.4 6.8h-1.4l-2.4-6.8v6.8h-2v-9h3.1zm12.1 0v1.8h3.2v1.5h-3.2v1.9h3.6v1.8h-5.6v-9h5.6v1.8h-3.6zm8.9 0l1.8 3.2 1.8-3.2h2.4l-2.9 4.5 3 4.5h-2.5l-1.9-3.3-1.9 3.3h-2.4l3-4.5L24.5 11.5h2.9z"/></svg>'); }
    </style>
</head>
<body class="bg-gray-50">
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

    <!-- Page Header -->
    <div class="bg-green-600 text-white py-8">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <h1 class="text-3xl font-bold">Secure Checkout</h1>
        </div>
    </div>

    <!-- Step Indicator -->
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="step-indicator">
            <div class="step active" id="step-1">1</div>
            <div class="step-line" id="line-1"></div>
            <div class="step" id="step-2">2</div>
            <div class="step-line" id="line-2"></div>
            <div class="step" id="step-3">3</div>
        </div>
        
        <div class="text-center mb-8">
            <span id="step-text" class="text-lg font-semibold text-gray-700">Shipping Information</span>
        </div>
    </div>

    <!-- Checkout Form -->
    <div class="max-w-6xl mx-auto px-4 pb-16">
        <div class="grid lg:grid-cols-3 gap-8">
            <!-- Form Section -->
            <div class="lg:col-span-2">
                <form id="checkout-form">
                    <!-- Step 1: Shipping Information -->
                    <div class="checkout-section active bg-white rounded-lg shadow-lg p-6" id="section-1">
                        <h2 class="text-2xl font-bold mb-6">Shipping Information</h2>
                        
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">First Name *</label>
                                <input type="text" id="first-name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">Last Name *</label>
                                <input type="text" id="last-name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email *</label>
                            <input type="email" id="email" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Phone Number *</label>
                            <input type="tel" id="phone" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Address Line 1 *</label>
                            <input type="text" id="address1" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Address Line 2</label>
                            <input type="text" id="address2" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                        </div>
                        
                        <div class="grid md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">City *</label>
                                <input type="text" id="city" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">State *</label>
                                <select id="state" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                                    <option value="">Select State</option>
                                    <option value="CA">California</option>
                                    <option value="NY">New York</option>
                                    <option value="TX">Texas</option>
                                    <option value="FL">Florida</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-gray-700 text-sm font-bold mb-2">ZIP Code *</label>
                                <input type="text" id="zip" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500" required>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-end">
                            <button type="button" onclick="nextStep()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                                Continue to Payment
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 2: Payment Information -->
                    <div class="checkout-section bg-white rounded-lg shadow-lg p-6" id="section-2">
                        <h2 class="text-2xl font-bold mb-6">Payment Information</h2>
                        
                        <!-- Payment Method Selection -->
                        <div class="mb-6">
                            <label class="block text-gray-700 text-sm font-bold mb-4">Select Payment Method</label>
                            
                            <div class="payment-method mb-3" onclick="selectPaymentMethod('card')">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center">
                                        <input type="radio" name="payment-method" value="card" class="mr-3">
                                        <span class="font-semibold">Credit/Debit Card</span>
                                    </div>
                                    <div class="card-logos">
                                        <div class="card-logo visa"></div>
                                        <div class="card-logo mastercard"></div>
                                        <div class="card-logo amex"></div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="payment-method mb-3" onclick="selectPaymentMethod('paypal')">
                                <div class="flex items-center">
                                    <input type="radio" name="payment-method" value="paypal" class="mr-3">
                                    <span class="font-semibold">PayPal</span>
                                    <i class="fab fa-paypal text-blue-600 text-2xl ml-3"></i>
                                </div>
                            </div>
                            
                            <div class="payment-method mb-3" onclick="selectPaymentMethod('bank')">
                                <div class="flex items-center">
                                    <input type="radio" name="payment-method" value="bank" class="mr-3">
                                    <span class="font-semibold">Bank Transfer</span>
                                    <i class="fas fa-university text-gray-600 text-xl ml-3"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Credit Card Form -->
                        <div id="card-details" style="display: none;">
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Card Number *</label>
                                <input type="text" id="card-number" placeholder="1234 5678 9012 3456" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                            </div>
                            
                            <div class="mb-4">
                                <label class="block text-gray-700 text-sm font-bold mb-2">Cardholder Name *</label>
                                <input type="text" id="card-name" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">Expiry Date *</label>
                                    <input type="text" id="card-expiry" placeholder="MM/YY" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                                <div>
                                    <label class="block text-gray-700 text-sm font-bold mb-2">CVV *</label>
                                    <input type="text" id="card-cvv" placeholder="123" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-green-500">
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-between">
                            <button type="button" onclick="prevStep()" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
                                Back to Shipping
                            </button>
                            <button type="button" onclick="nextStep()" class="bg-green-600 text-white px-6 py-3 rounded-lg hover:bg-green-700 transition duration-300">
                                Review Order
                            </button>
                        </div>
                    </div>
                    
                    <!-- Step 3: Order Review -->
                    <div class="checkout-section bg-white rounded-lg shadow-lg p-6" id="section-3">
                        <h2 class="text-2xl font-bold mb-6">Order Review</h2>
                        
                        <div class="grid md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-lg font-semibold mb-4">Shipping Address</h3>
                                <div id="shipping-review" class="text-gray-600">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                            </div>
                            
                            <div>
                                <h3 class="text-lg font-semibold mb-4">Payment Method</h3>
                                <div id="payment-review" class="text-gray-600">
                                    <!-- Will be populated by JavaScript -->
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-8">
                            <h3 class="text-lg font-semibold mb-4">Order Items</h3>
                            <div id="order-items-review">
                                <!-- Will be populated by JavaScript -->
                            </div>
                        </div>
                        
                        <div class="mt-6 flex justify-between">
                            <button type="button" onclick="prevStep()" class="bg-gray-600 text-white px-6 py-3 rounded-lg hover:bg-gray-700 transition duration-300">
                                Back to Payment
                            </button>
                            <button type="button" onclick="placeOrder()" class="bg-green-600 text-white px-8 py-3 rounded-lg hover:bg-green-700 transition duration-300 font-bold">
                                Place Order
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-lg p-6 sticky top-24">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Order Summary</h3>
                    
                    <div id="order-summary-items" class="mb-6">
                        <!-- Will be populated by JavaScript -->
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
                    
                    <!-- Security Features -->
                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <i class="fas fa-lock mr-2 text-green-600"></i>
                            256-bit SSL encryption
                        </div>
                        <div class="flex items-center text-sm text-gray-600 mb-2">
                            <i class="fas fa-shield-alt mr-2 text-green-600"></i>
                            Secure payment processing
                        </div>
                        <div class="flex items-center text-sm text-gray-600">
                            <i class="fas fa-undo mr-2 text-green-600"></i>
                            30-day return policy
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8">
                <div>
                    <div class="flex items-center mb-4">
                        <i class="fas fa-leaf text-green-400 text-2xl mr-2"></i>
                        <span class="text-xl font-bold">GreenScape</span>
                    </div>
                    <p class="text-gray-400 mb-4">
                        Transform your space with our premium plants and professional landscaping services.
                    </p>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                    <ul class="space-y-2">
                        <li><a href="index.php" class="text-gray-400 hover:text-white transition duration-300">Home</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Plants</a></li>
                        <li><a href="landscaping.php" class="text-gray-400 hover:text-white transition duration-300">Landscaping</a></li>
                        <li><a href="services.php" class="text-gray-400 hover:text-white transition duration-300">Services</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Support</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Help Center</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Shipping Info</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Returns</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition duration-300">Contact Us</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-semibold mb-4">Contact Info</h3>
                    <div class="space-y-2 text-gray-400">
                        <p><i class="fas fa-phone mr-2"></i>+1 (555) 123-4567</p>
                        <p><i class="fas fa-envelope mr-2"></i>info@greenscape.com</p>
                        <p><i class="fas fa-clock mr-2"></i>Mon-Sat: 9AM-6PM</p>
                    </div>
                </div>
            </div>
            
            <div class="border-t border-gray-700 mt-8 pt-8 text-center text-gray-400">
                <p>&copy; 2024 GreenScape. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <script>
        let currentStep = 1;
        let orderData = {};
        let selectedPaymentMethod = '';
        
        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            loadOrderData();
            displayOrderSummary();
        });
        
        function loadOrderData() {
            const savedOrderData = localStorage.getItem('orderData');
            if (savedOrderData) {
                orderData = JSON.parse(savedOrderData);
            } else {
                // Redirect to cart if no order data
                window.location.href = '{{ route('checkout') }}';
            }
        }
        
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
                        <span class="font-semibold">${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                `;
            });
            
            itemsContainer.innerHTML = itemsHTML;
            
            document.getElementById('summary-subtotal').textContent = `${orderData.subtotal.toFixed(2)}`;
            document.getElementById('summary-tax').textContent = `${orderData.tax.toFixed(2)}`;
            document.getElementById('summary-total').textContent = `${orderData.total.toFixed(2)}`;
        }
        
        function nextStep() {
            if (validateCurrentStep()) {
                if (currentStep < 3) {
                    currentStep++;
                    updateStepIndicator();
                    showStep(currentStep);
                    
                    if (currentStep === 3) {
                        populateOrderReview();
                    }
                }
            }
        }
        
        function prevStep() {
            if (currentStep > 1) {
                currentStep--;
                updateStepIndicator();
                showStep(currentStep);
            }
        }
        
        function validateCurrentStep() {
            if (currentStep === 1) {
                // Validate shipping information
                const requiredFields = ['first-name', 'last-name', 'email', 'phone', 'address1', 'city', 'state', 'zip'];
                for (let field of requiredFields) {
                    const element = document.getElementById(field);
                    if (!element.value.trim()) {
                        element.focus();
                        showNotification('Please fill in all required fields', 'error');
                        return false;
                    }
                }
                
                // Validate email format
                const email = document.getElementById('email').value;
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(email)) {
                    document.getElementById('email').focus();
                    showNotification('Please enter a valid email address', 'error');
                    return false;
                }
                
                return true;
            } else if (currentStep === 2) {
                // Validate payment method selection
                if (!selectedPaymentMethod) {
                    showNotification('Please select a payment method', 'error');
                    return false;
                }
                
                // Validate card details if card payment is selected
                if (selectedPaymentMethod === 'card') {
                    const requiredCardFields = ['card-number', 'card-name', 'card-expiry', 'card-cvv'];
                    for (let field of requiredCardFields) {
                        const element = document.getElementById(field);
                        if (!element.value.trim()) {
                            element.focus();
                            showNotification('Please fill in all card details', 'error');
                            return false;
                        }
                    }
                }
                
                return true;
            }
            
            return true;
        }
        
        function updateStepIndicator() {
            for (let i = 1; i <= 3; i++) {
                const step = document.getElementById(`step-${i}`);
                const line = document.getElementById(`line-${i}`);
                
                if (i < currentStep) {
                    step.classList.add('completed');
                    step.classList.remove('active');
                    if (line) line.classList.add('completed');
                } else if (i === currentStep) {
                    step.classList.add('active');
                    step.classList.remove('completed');
                } else {
                    step.classList.remove('active', 'completed');
                    if (line) line.classList.remove('completed');
                }
            }
            
            // Update step text
            const stepTexts = ['Shipping Information', 'Payment Information', 'Order Review'];
            document.getElementById('step-text').textContent = stepTexts[currentStep - 1];
        }
        
        function showStep(step) {
            // Hide all sections
            document.querySelectorAll('.checkout-section').forEach(section => {
                section.classList.remove('active');
            });
            
            // Show current section
            document.getElementById(`section-${step}`).classList.add('active');
        }
        
        function selectPaymentMethod(method) {
            selectedPaymentMethod = method;
            
            // Update radio button
            document.querySelector(`input[value="${method}"]`).checked = true;
            
            // Update visual selection
            document.querySelectorAll('.payment-method').forEach(pm => {
                pm.classList.remove('selected');
            });
            event.currentTarget.classList.add('selected');
            
            // Show/hide card details
            const cardDetails = document.getElementById('card-details');
            if (method === 'card') {
                cardDetails.style.display = 'block';
            } else {
                cardDetails.style.display = 'none';
            }
        }
        
        function populateOrderReview() {
            // Populate shipping address
            const shippingInfo = `
                ${document.getElementById('first-name').value} ${document.getElementById('last-name').value}<br>
                ${document.getElementById('address1').value}<br>
                ${document.getElementById('address2').value ? document.getElementById('address2').value + '<br>' : ''}
                ${document.getElementById('city').value}, ${document.getElementById('state').value} ${document.getElementById('zip').value}<br>
                ${document.getElementById('phone').value}
            `;
            document.getElementById('shipping-review').innerHTML = shippingInfo;
            
            // Populate payment method
            let paymentInfo = '';
            if (selectedPaymentMethod === 'card') {
                const cardNumber = document.getElementById('card-number').value;
                const maskedCard = '**** **** **** ' + cardNumber.slice(-4);
                paymentInfo = `Credit/Debit Card<br>${maskedCard}`;
            } else if (selectedPaymentMethod === 'paypal') {
                paymentInfo = 'PayPal';
            } else if (selectedPaymentMethod === 'bank') {
                paymentInfo = 'Bank Transfer';
            }
            document.getElementById('payment-review').innerHTML = paymentInfo;
            
            // Populate order items
            let itemsHTML = '';
            orderData.items.forEach(item => {
                itemsHTML += `
                    <div class="flex justify-between items-center py-3 border-b border-gray-200">
                        <div>
                            <h4 class="font-semibold">${item.name}</h4>
                            <p class="text-gray-600 text-sm">Quantity: ${item.quantity}</p>
                        </div>
                        <span class="font-semibold">${(item.price * item.quantity).toFixed(2)}</span>
                    </div>
                `;
            });
            document.getElementById('order-items-review').innerHTML = itemsHTML;
        }
        
        function placeOrder() {
            // Simulate order processing
            showNotification('Processing your order...', 'info');
            
            setTimeout(() => {
                // Clear cart and order data
                localStorage.removeItem('cart');
                localStorage.removeItem('orderData');
                
                // Show success message
                showNotification('Order placed successfully!', 'success');
                
                // Redirect to order confirmation page
                setTimeout(() => {
                    window.location.href = 'order-confirmation.php';
                }, 2000);
            }, 2000);
        }
        
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            let bgColor = 'bg-blue-600';
            
            if (type === 'success') bgColor = 'bg-green-600';
            else if (type === 'error') bgColor = 'bg-red-600';
            else if (type === 'info') bgColor = 'bg-blue-600';
            
            notification.className = `fixed top-20 right-4 ${bgColor} text-white px-6 py-3 rounded-lg shadow-lg z-50`;
            notification.textContent = message;
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.remove();
            }, 4000);
        }
        
        // Format card number input
        document.addEventListener('DOMContentLoaded', function() {
            const cardNumberInput = document.getElementById('card-number');
            if (cardNumberInput) {
                cardNumberInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\s/g, '').replace(/[^0-9]/gi, '');
                    let formattedValue = value.match(/.{1,4}/g)?.join(' ') || value;
                    e.target.value = formattedValue;
                });
            }
            
            // Format expiry date input
            const expiryInput = document.getElementById('card-expiry');
            if (expiryInput) {
                expiryInput.addEventListener('input', function(e) {
                    let value = e.target.value.replace(/\D/g, '');
                    if (value.length >= 2) {
                        value = value.substring(0, 2) + '/' + value.substring(2, 4);
                    }
                    e.target.value = value;
                });
            }
        });
    </script>
</body>
</html>

<?php
// PHP session management
session_start();

// Handle order processing
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['place_order'])) {
    // Here you would typically:
    // 1. Validate all form data
    // 2. Process payment
    // 3. Save order to database
    // 4. Send confirmation email
    // 5. Clear cart
    
    // For demo purposes, we'll just redirect to confirmation
    header('Location: order-confirmation.php');
    exit;
}
?>