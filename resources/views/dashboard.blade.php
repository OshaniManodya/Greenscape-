<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
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
        
        .animation-delay-200 {
            animation-delay: 0.2s;
            animation-fill-mode: both;
        }
        
        .animation-delay-400 {
            animation-delay: 0.4s;
            animation-fill-mode: both;
        }
        
        .scrollbar-hide::-webkit-scrollbar {
            display: none;
        }
        
        .scrollbar-hide {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }
    </style>
</head>
<body class="bg-gray-50 font-sans antialiased">
    <!-- Navigation Sidebar -->
    <div class="fixed inset-y-0 left-0 w-64 bg-white shadow-lg z-50">
        <div class="flex items-center justify-center h-16 px-4 border-b border-gray-200">
            <div class="flex items-center">
                <i class="fas fa-leaf text-emerald-600 text-2xl mr-2"></i>
                <span class="text-xl font-bold text-gray-800">GreenScape</span>
            </div>
        </div>
        <nav class="px-4 py-6">
            <div class="space-y-1">
                <a href="#" class="flex items-center px-4 py-3 bg-emerald-50 text-emerald-600 rounded-lg font-medium">
                    <i class="fas fa-tachometer-alt mr-3"></i>
                    Dashboard
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-project-diagram mr-3"></i>
                    Projects
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-users mr-3"></i>
                    Customers
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-file-invoice-dollar mr-3"></i>
                    Quotes
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-calendar-alt mr-3"></i>
                    Schedule
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-chart-line mr-3"></i>
                    Reports
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-gray-600 hover:bg-gray-100 rounded-lg transition-colors">
                    <i class="fas fa-cog mr-3"></i>
                    Settings
                </a>
            </div>
            
            <div class="mt-12 pt-6 border-t border-gray-200">
                <div class="px-4">
                    <div class="flex items-center">
                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                            <span class="text-emerald-600 font-semibold text-sm">AD</span>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm font-medium text-gray-900">Admin User</p>
                            <p class="text-xs text-gray-500">admin@greenscape.com</p>
                        </div>
                    </div>
                    <button class="mt-4 w-full flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition-colors">
                        <i class="fas fa-sign-out-alt mr-2"></i>
                        Sign Out
                    </button>
                </div>
            </div>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="ml-64">
        <!-- Top Navigation -->
        <div class="bg-white shadow-sm border-b border-gray-200">
            <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-6">
                    <div>
                        <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
                        <p class="text-gray-600 mt-1">Welcome back, Admin!</p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-sm text-gray-500">
                            <i class="far fa-calendar-alt mr-1"></i>
                            <span id="current-date">June 15, 2023</span>
                        </div>
                        <div class="relative">
                            <button class="flex items-center p-2 rounded-full bg-emerald-100 text-emerald-600 hover:bg-emerald-200 transition-colors">
                                <i class="fas fa-bell"></i>
                                <span class="absolute top-0 right-0 w-2 h-2 bg-red-500 rounded-full"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Dashboard Content -->
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Total Revenue -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300 animate-fade-in-up">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-emerald-100 text-emerald-600">
                            <i class="fas fa-dollar-sign fa-lg"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-sm font-medium text-gray-500">Total Revenue</h3>
                            <div class="flex items-baseline">
                                <p class="text-2xl font-bold text-gray-900">Rs.150,000,000</p>
                                <p class="ml-2 text-sm font-medium text-emerald-600">+12.5%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Active Projects -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300 animate-fade-in-up animation-delay-200">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                            <i class="fas fa-project-diagram fa-lg"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-sm font-medium text-gray-500">Active Projects</h3>
                            <div class="flex items-baseline">
                                <p class="text-2xl font-bold text-gray-900">23</p>
                                <p class="ml-2 text-sm font-medium text-blue-600">+3 new</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Customers -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300 animate-fade-in-up animation-delay-400">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                            <i class="fas fa-users fa-lg"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-sm font-medium text-gray-500">Total Customers</h3>
                            <div class="flex items-baseline">
                                <p class="text-2xl font-bold text-gray-900">1,247</p>
                                <p class="ml-2 text-sm font-medium text-purple-600">+8.2%</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pending Quotes -->
                <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300 animate-fade-in-up animation-delay-600">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                            <i class="fas fa-file-invoice-dollar fa-lg"></i>
                        </div>
                        <div class="ml-4 flex-1">
                            <h3 class="text-sm font-medium text-gray-500">Pending Quotes</h3>
                            <div class="flex items-baseline">
                                <p class="text-2xl font-bold text-gray-900">15</p>
                                <p class="ml-2 text-sm font-medium text-orange-600">Urgent</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                <!-- Recent Activity -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <div class="flex justify-between items-center">
                                <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
                                <a href="#" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All</a>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <!-- Project Item -->
                                <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-12 h-12 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <span class="text-emerald-600 font-semibold">JD</span>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">Johnson Residence - Garden Design</h4>
                                            <p class="text-sm text-gray-500">Started 2 days ago</p>
                                        </div>
                                    </div>
                                    <div class="flex items-center space-x-3">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                            In Progress
                                        </span>
                                        <span class="text-lg font-semibold text-gray-900">Rs.150,000</span>
                                    </div>
                                </div>

                                <!-- More project items... -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Actions & Stats -->
                <div class="space-y-6">
                    <!-- Quick Actions -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                        </div>
                        <div class="p-6 space-y-3">
                            <a href="#" class="flex items-center p-3 bg-emerald-50 hover:bg-emerald-100 rounded-xl transition-colors group">
                                <div class="p-2 bg-emerald-100 group-hover:bg-emerald-200 rounded-lg">
                                    <i class="fas fa-plus text-emerald-600"></i>
                                </div>
                                <span class="ml-3 font-medium text-gray-900">New Project</span>
                            </a>

                            <!-- More quick actions... -->
                        </div>
                    </div>

                    <!-- Monthly Revenue Chart -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Monthly Revenue</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex justify-between items-center">
                                    <span class="text-sm text-gray-600">January</span>
                                    <div class="flex items-center space-x-2">
                                        <div class="w-32 bg-gray-200 rounded-full h-2">
                                            <div class="bg-emerald-500 h-2 rounded-full" style="width: 85%"></div>
                                        </div>
                                        <span class="text-sm font-medium text-gray-900">Rs.650,000</span>
                                    </div>
                                </div>
                                
                                <!-- More months... -->
                            </div>
                        </div>
                    </div>

                    <!-- Team Performance -->
                    <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                        <div class="px-6 py-4 border-b border-gray-200">
                            <h3 class="text-lg font-semibold text-gray-900">Team Performance</h3>
                        </div>
                        <div class="p-6">
                            <div class="space-y-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-10 h-10 bg-emerald-100 rounded-full flex items-center justify-center">
                                            <span class="text-emerald-600 font-semibold text-sm">MJ</span>
                                        </div>
                                        <div>
                                            <h4 class="font-medium text-gray-900">Mike Johnson</h4>
                                            <p class="text-xs text-gray-500">Lead Designer</p>
                                        </div>
                                    </div>
                                    <div class="text-right">
                                        <div class="text-sm font-semibold text-gray-900">8 Projects</div>
                                        <div class="text-xs text-emerald-600">+2 this week</div>
                                    </div>
                                </div>

                                <!-- More team members... -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Notifications -->
            <div class="mt-8">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Notifications</h3>
                            <button class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">Mark All Read</button>
                        </div>
                    </div>
                    <div class="divide-y divide-gray-100">
                        <div class="p-6 flex items-start space-x-4 hover:bg-gray-50 transition-colors">
                            <div class="flex-shrink-0 w-2 h-2 bg-emerald-500 rounded-full mt-2"></div>
                            <div class="flex-1">
                                <p class="text-sm text-gray-900">
                                    <span class="font-medium">New quote request</span> from Johnson Residence for garden design project
                                </p>
                                <p class="text-xs text-gray-500 mt-1">2 minutes ago</p>
                            </div>
                        </div>
                        
                        <!-- More notifications... -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Set current date
        document.addEventListener('DOMContentLoaded', function() {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            const today = new Date().toLocaleDateString('en-US', options);
            document.getElementById('current-date').textContent = today;
            
            // Add hover effects to cards
            const cards = document.querySelectorAll('.hover\\:shadow-xl');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.classList.add('transform', 'scale-105');
                });
                card.addEventListener('mouseleave', function() {
                    this.classList.remove('transform', 'scale-105');
                });
            });
            
            // Auto-refresh stats every 30 seconds
            setInterval(() => {
                console.log('Refreshing dashboard stats...');
                // You would typically make an AJAX call here to update stats
            }, 30000);
        });
    </script>
</body>
</html>