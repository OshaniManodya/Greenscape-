<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Profile - GreenScape</title>
    <meta name="description" content="Manage your GreenScape account, view project history, and update your landscaping preferences.">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gradient-to-br from-emerald-50 via-teal-50 to-cyan-50 min-h-screen">
    <!-- Header Section -->
    <header class="bg-white shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center">
                    <i class="fas fa-leaf text-green-600 text-2xl mr-2"></i>
                    <span class="text-xl font-bold text-green-800">GreenScape</span>
                </div>
                
                <nav class="hidden md:flex space-x-8">
                    <a href="/home" class="text-gray-700 hover:text-green-600 transition duration-300">Home</a>
                    <a href="/plants" class="text-gray-700 hover:text-green-600 transition duration-300">Plants</a>
                    <a href="/landscaping" class="text-gray-700 hover:text-green-600 transition duration-300">Landscaping</a>
                    <a href="/service" class="text-gray-700 hover:text-green-600 transition duration-300">Services</a>
                </nav>
                
                <div class="flex items-center space-x-4">
                    <div class="relative group">
                        <button class="flex items-center space-x-1 text-gray-700 hover:text-green-600">
                            <span>John Doe</span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden group-hover:block">
                            <a href="#" class="block px-4 py-2 text-gray-700 hover:bg-green-50">Profile</a>
                            <form method="POST" action="/logout">
                                <input type="hidden" name="_token" value="YOUR_CSRF_TOKEN">
                                <button type="submit" class="block w-full text-left px-4 py-2 text-gray-700 hover:bg-green-50">
                                    Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Profile Hero Section -->
    <div class="relative overflow-hidden bg-gradient-to-r from-emerald-600 via-teal-600 to-cyan-600">
        <div class="absolute inset-0 bg-black/20"></div>
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23ffffff" fill-opacity="0.1"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-30"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="flex items-center space-x-6">
                <!-- Profile Avatar -->
                <div class="relative">
                    <div class="w-32 h-32 rounded-full bg-white/20 backdrop-blur-sm border-4 border-white/30 flex items-center justify-center overflow-hidden">
                        <div class="w-full h-full bg-gradient-to-br from-emerald-400 to-teal-500 flex items-center justify-center">
                            <span class="text-4xl font-bold text-white">J</span>
                        </div>
                    </div>
                    <button class="absolute bottom-2 right-2 w-8 h-8 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-gray-50 transition-colors">
                        <svg class="w-4 h-4 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                    </button>
                </div>
                
                <!-- Profile Info -->
                <div class="flex-1 text-white">
                    <h1 class="text-4xl font-bold mb-2">John Doe</h1>
                    <p class="text-emerald-100 text-lg mb-4">john.doe@example.com</p>
                    <div class="flex items-center space-x-6 text-sm">
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                            </svg>
                            <span>Member since March 2024</span>
                        </div>
                        <div class="flex items-center space-x-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            </svg>
                            <span>New York, NY</span>
                        </div>
                    </div>
                </div>
                
                <!-- Edit Profile Button -->
                <div>
                    <button onclick="toggleEditMode()" class="inline-flex items-center px-6 py-3 bg-white text-emerald-600 font-semibold rounded-full hover:bg-emerald-50 transform hover:scale-105 transition-all duration-300 shadow-lg">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit Profile
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Main Content Column -->
            <div class="lg:col-span-2 space-y-8">
                <!-- Account Overview Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-emerald-500 to-teal-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Account Overview
                        </h2>
                    </div>
                    
                    <div class="p-8">
                        <!-- Stats Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                            <!-- Active Projects -->
                            <div class="text-center p-6 bg-emerald-50 rounded-2xl">
                                <div class="w-16 h-16 bg-emerald-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                    </svg>
                                </div>
                                <div class="text-2xl font-bold text-emerald-600">3</div>
                                <div class="text-gray-600">Active Projects</div>
                            </div>
                            
                            <!-- Completed Projects -->
                            <div class="text-center p-6 bg-blue-50 rounded-2xl">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="text-2xl font-bold text-blue-600">8</div>
                                <div class="text-gray-600">Completed Projects</div>
                            </div>
                            
                            <!-- Average Rating -->
                            <div class="text-center p-6 bg-purple-50 rounded-2xl">
                                <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                    </svg>
                                </div>
                                <div class="text-2xl font-bold text-purple-600">4.9</div>
                                <div class="text-gray-600">Average Rating</div>
                            </div>
                        </div>
                        
                        <!-- Profile Form -->
                        <form id="profileForm" class="space-y-6">
                            <input type="hidden" name="_token" value="YOUR_CSRF_TOKEN">
                            
                            <!-- Form Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Name Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                                    <input type="text" name="name" value="John Doe" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                           disabled>
                                </div>
                                
                                <!-- Email Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Email Address</label>
                                    <input type="email" name="email" value="john.doe@example.com" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                           disabled>
                                </div>
                                
                                <!-- Phone Field -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Phone Number</label>
                                    <input type="tel" name="phone" value="(555) 123-4567" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                           disabled>
                                </div>
                                
                                <!-- Property Type -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Property Type</label>
                                    <select name="property_type" 
                                            class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                            disabled>
                                        <option value="">Select Property Type</option>
                                        <option value="residential" selected>Residential</option>
                                        <option value="commercial">Commercial</option>
                                        <option value="industrial">Industrial</option>
                                    </select>
                                </div>
                            </div>
                            
                            <!-- Address Field -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Address</label>
                                <input type="text" name="address" value="123 Green Street" 
                                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                       disabled>
                            </div>
                            
                            <!-- Location Fields -->
                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                <!-- City -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">City</label>
                                    <input type="text" name="city" value="New York" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                           disabled>
                                </div>
                                
                                <!-- State -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">State</label>
                                    <input type="text" name="state" value="NY" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                           disabled>
                                </div>
                                
                                <!-- ZIP Code -->
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">ZIP Code</label>
                                    <input type="text" name="zip_code" value="10001" 
                                           class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                           disabled>
                                </div>
                            </div>
                            
                            <!-- Preferences -->
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Landscaping Preferences</label>
                                <textarea name="preferences" rows="4" 
                                          class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-emerald-500 focus:ring-2 focus:ring-emerald-200 transition-colors bg-gray-50"
                                          placeholder="Tell us about your landscaping preferences, style, and any specific requirements..."
                                          disabled>I prefer native plants and sustainable landscaping with minimal water requirements. Would love a small vegetable garden area.</textarea>
                            </div>
                            
                            <!-- Form Buttons (Hidden by default) -->
                            <div id="editButtons" class="hidden justify-end space-x-4 pt-6">
                                <button type="button" onclick="toggleEditMode()" 
                                        class="px-6 py-3 border border-gray-300 rounded-xl text-gray-700 font-medium hover:bg-gray-50 transition-colors">
                                    Cancel
                                </button>
                                <button type="submit" 
                                        class="px-6 py-3 bg-emerald-600 text-white rounded-xl font-medium hover:bg-emerald-700 transition-colors">
                                    Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Recent Projects Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-blue-500 to-cyan-600 px-8 py-6">
                        <h2 class="text-2xl font-bold text-white flex items-center">
                            <svg class="w-7 h-7 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                            </svg>
                            Recent Projects
                        </h2>
                    </div>
                    
                    <div class="p-8">
                        <!-- Projects List -->
                        <div class="space-y-6">
                            <!-- Project 1 -->
                            <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-emerald-100 rounded-2xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Backyard Garden Design</h4>
                                        <p class="text-gray-600">Complete landscape renovation with native plants</p>
                                        <p class="text-sm text-gray-500 mt-1">Started: March 15, 2024</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                        In Progress
                                    </span>
                                    <p class="text-lg font-bold text-gray-900 mt-2">$8,500</p>
                                </div>
                            </div>

                            <!-- Project 2 -->
                            <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Front Yard Irrigation System</h4>
                                        <p class="text-gray-600">Smart irrigation installation with weather sensors</p>
                                        <p class="text-sm text-gray-500 mt-1">Completed: February 28, 2024</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                    <p class="text-lg font-bold text-gray-900 mt-2">$3,200</p>
                                </div>
                            </div>

                            <!-- Project 3 -->
                            <div class="flex items-center justify-between p-6 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-16 h-16 bg-purple-100 rounded-2xl flex items-center justify-center">
                                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <h4 class="text-lg font-semibold text-gray-900">Patio & Outdoor Lighting</h4>
                                        <p class="text-gray-600">Stone patio with LED landscape lighting</p>
                                        <p class="text-sm text-gray-500 mt-1">Completed: January 10, 2024</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                        Completed
                                    </span>
                                    <p class="text-lg font-bold text-gray-900 mt-2">$12,750</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- View All Button -->
                        <div class="mt-8 text-center">
                            <a href="/projects" class="inline-flex items-center px-6 py-3 bg-blue-600 text-white rounded-xl font-medium hover:bg-blue-700 transition-colors">
                                View All Projects
                                <svg class="ml-2 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div class="space-y-6">
                <!-- Quick Actions Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-purple-500 to-pink-600 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Quick Actions</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <!-- Request Quote -->
                        <a href="/quotes/request" class="flex items-center p-4 bg-emerald-50 hover:bg-emerald-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-emerald-100 group-hover:bg-emerald-200 rounded-lg">
                                <svg class="w-6 h-6 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">Request Quote</span>
                        </a>

                        <!-- Book Consultation -->
                        <a href="/appointments/book" class="flex items-center p-4 bg-blue-50 hover:bg-blue-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-blue-100 group-hover:bg-blue-200 rounded-lg">
                                <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">Book Consultation</span>
                        </a>

                        <!-- Browse Services -->
                        <a href="/services" class="flex items-center p-4 bg-purple-50 hover:bg-purple-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-purple-100 group-hover:bg-purple-200 rounded-lg">
                                <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">Browse Services</span>
                        </a>

                        <!-- Contact Support -->
                        <a href="/support" class="flex items-center p-4 bg-orange-50 hover:bg-orange-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-orange-100 group-hover:bg-orange-200 rounded-lg">
                                <svg class="w-6 h-6 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M12 2.25a9.75 9.75 0 11-7.5 0 9.75 9.75 0 017.5 0z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">Contact Support</span>
                        </a>
                    </div>
                </div>

                <!-- Account Settings Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-gray-600 to-gray-800 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Account Settings</h3>
                    </div>
                    <div class="p-6 space-y-4">
                        <!-- Email Notifications Toggle -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5z"></path>
                                </svg>
                                <span class="font-medium text-gray-900">Email Notifications</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer" checked>
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            </label>
                        </div>

                        <!-- SMS Updates Toggle -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                <span class="font-medium text-gray-900">SMS Updates</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            </label>
                        </div>

                        <!-- Two-Factor Auth Toggle -->
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <svg class="w-5 h-5 text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                </svg>
                                <span class="font-medium text-gray-900">Two-Factor Auth</span>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" value="" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-emerald-300 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-600"></div>
                            </label>
                        </div>

                        <hr class="my-4">

                        <!-- Account Links -->
                        <div class="space-y-3">
                            <a href="/password/change" class="flex items-center text-gray-700 hover:text-emerald-600 transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 7a2 2 0 012 2m4 0a6 6 0 01-7.743 5.743L11 17H9v2H7v2H4a1 1 0 01-1-1v-2.586a1 1 0 01.293-.707l5.964-5.964A6 6 0 1121 9z"></path>
                                </svg>
                                Change Password
                            </a>

                            <a href="/privacy/settings" class="flex items-center text-gray-700 hover:text-emerald-600 transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                                Privacy Settings
                            </a>

                            <a href="/billing/history" class="flex items-center text-gray-700 hover:text-emerald-600 transition-colors">
                                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                </svg>
                                Billing History
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Loyalty Program Card -->
                <div class="bg-gradient-to-br from-yellow-400 via-orange-500 to-red-500 rounded-3xl shadow-xl overflow-hidden">
                    <div class="p-6 text-white">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold">GreenRewards</h3>
                            <svg class="w-8 h-8 text-yellow-200" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                            </svg>
                        </div>
                        
                        <div class="mb-4">
                            <div class="flex justify-between text-sm mb-2">
                                <span>Points Progress</span>
                                <span>2,450 / 5,000</span>
                            </div>
                            <div class="w-full bg-white/20 rounded-full h-3">
                                <div class="bg-white h-3 rounded-full" style="width: 49%"></div>
                            </div>
                        </div>
                        
                        <p class="text-yellow-100 text-sm mb-4">
                            Earn points with every project and unlock exclusive rewards!
                        </p>
                        
                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center">
                                <div class="text-lg font-bold">2,450</div>
                                <div class="text-xs text-yellow-100">Total Points</div>
                            </div>
                            <div class="bg-white/10 backdrop-blur-sm rounded-xl p-3 text-center">
                                <div class="text-lg font-bold">Gold</div>
                                <div class="text-xs text-yellow-100">Current Tier</div>
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <a href="/rewards" class="block w-full text-center bg-white text-orange-600 font-semibold py-2 rounded-xl hover:bg-gray-50 transition-colors">
                                View Rewards
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Recent Activity Card -->
                <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden">
                    <div class="bg-gradient-to-r from-indigo-500 to-blue-600 px-6 py-4">
                        <h3 class="text-xl font-bold text-white">Recent Activity</h3>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            <!-- Activity 1 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-emerald-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 font-medium">Quote approved</p>
                                    <p class="text-xs text-gray-500">Backyard renovation project - 2 hours ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 2 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 font-medium">Consultation scheduled</p>
                                    <p class="text-xs text-gray-500">March 25, 2024 at 2:00 PM - 1 day ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 3 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-purple-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 font-medium">Project completed</p>
                                    <p class="text-xs text-gray-500">Front yard irrigation system - 3 days ago</p>
                                </div>
                            </div>
                            
                            <!-- Activity 4 -->
                            <div class="flex items-start space-x-3">
                                <div class="w-2 h-2 bg-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                                <div>
                                    <p class="text-sm text-gray-900 font-medium">Payment processed</p>
                                    <p class="text-xs text-gray-500">$3,200 for irrigation project - 3 days ago</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <a href="/activity" class="text-center block text-indigo-600 hover:text-indigo-700 font-medium text-sm">
                                View All Activity
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript -->
    <script>
        let isEditing = false;
        
        function toggleEditMode() {
            isEditing = !isEditing;
            const form = document.getElementById('profileForm');
            const inputs = form.querySelectorAll('input, select, textarea');
            const editButtons = document.getElementById('editButtons');
            
            inputs.forEach(input => {
                input.disabled = !isEditing;
                if (isEditing) {
                    input.classList.add('bg-white');
                    input.classList.remove('bg-gray-50');
                } else {
                    input.classList.add('bg-gray-50');
                    input.classList.remove('bg-white');
                }
            });
            
            if (isEditing) {
                editButtons.classList.remove('hidden');
            } else {
                editButtons.classList.add('hidden');
            }
        }
        
        // Handle form submission
        document.getElementById('profileForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Show loading state
            const submitButton = this.querySelector('button[type="submit"]');
            const originalText = submitButton.textContent;
            submitButton.textContent = 'Saving...';
            submitButton.disabled = true;
            
            // Simulate API call
            setTimeout(() => {
                // Show success message
                showNotification('Profile updated successfully!', 'success');
                
                // Reset button
                submitButton.textContent = originalText;
                submitButton.disabled = false;
                
                // Exit edit mode
                toggleEditMode();
            }, 1500);
        });
        
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 px-6 py-3 rounded-xl shadow-lg z-50 transform translate-x-full transition-transform duration-300 ${
                type === 'success' ? 'bg-emerald-500 text-white' : 
                type === 'error' ? 'bg-red-500 text-white' : 
                'bg-blue-500 text-white'
            }`;
            notification.textContent = message;
            
            document.body.appendChild(notification);
            
            // Slide in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Slide out and remove
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 3000);
        }
        
        // Add smooth scrolling for internal links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth'
                });
            });
        });
        
        // Add hover effects to project cards
        document.querySelectorAll('.hover\\:bg-gray-100').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.classList.add('transform', 'scale-105');
            });
            card.addEventListener('mouseleave', function() {
                this.classList.remove('transform', 'scale-105');
            });
        });
    </script>

    <!-- Custom CSS -->
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #10b981;
            border-radius: 10px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #059669;
        }
        
        /* Smooth transitions for all interactive elements */
        * {
            transition: all 0.2s ease-in-out;
        }
        
        /* Focus styles */
        input:focus, select:focus, textarea:focus {
            outline: none;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
        }
    </style>
</body>
</html>