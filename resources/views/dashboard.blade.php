<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flowering Plants - GreenScape</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
<body>    
<div class="min-h-screen bg-gray-50">
    {{-- Header --}}
    <div class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center py-6">
                <div>
                    <h1 class="text-3xl font-bold text-gray-900">Admin Dashboard</h1>
                    <p class="text-gray-600 mt-1">Welcome back, {{ Auth::user()->name }}!</p>
                </div>
                <div class="flex items-center space-x-4">
                    <div class="text-sm text-gray-500">
                        {{ now()->format('F j, Y') }}
                    </div>
                    <div class="relative">
                        <button class="flex items-center p-2 rounded-full bg-emerald-100 text-emerald-600 hover:bg-emerald-200 transition-colors">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5-5-5h5v-5h5v5z"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Stats Cards --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            {{-- Total Revenue --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-emerald-100 text-emerald-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-sm font-medium text-gray-500">Total Revenue</h3>
                        <div class="flex items-baseline">
                            <p class="text-2xl font-bold text-gray-900">$127,430</p>
                            <p class="ml-2 text-sm font-medium text-emerald-600">+12.5%</p>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Active Projects --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
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

            {{-- Total Customers --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
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

            {{-- Pending Quotes --}}
            <div class="bg-white rounded-2xl shadow-lg p-6 border border-gray-100 hover:shadow-xl transition-shadow duration-300">
                <div class="flex items-center">
                    <div class="p-3 rounded-full bg-orange-100 text-orange-600">
                        <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
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
            {{-- Recent Activity --}}
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <div class="flex justify-between items-center">
                            <h3 class="text-lg font-semibold text-gray-900">Recent Projects</h3>
                            <a href="{{ route('admin.projects') }}" class="text-emerald-600 hover:text-emerald-700 text-sm font-medium">View All</a>
                        </div>
                    </div>
                    <div class="p-6">
                        <div class="space-y-4">
                            {{-- Project Item --}}
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
                                    <span class="text-lg font-semibold text-gray-900">$8,500</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold">MB</span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Miller Business Plaza - Irrigation</h4>
                                        <p class="text-sm text-gray-500">Started 1 week ago</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                                        Completed
                                    </span>
                                    <span class="text-lg font-semibold text-gray-900">$12,300</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-purple-100 rounded-full flex items-center justify-center">
                                        <span class="text-purple-600 font-semibold">SW</span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Smith Backyard - Complete Renovation</h4>
                                        <p class="text-sm text-gray-500">Quote pending</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Quoted
                                    </span>
                                    <span class="text-lg font-semibold text-gray-900">$25,750</span>
                                </div>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-gray-50 rounded-xl hover:bg-gray-100 transition-colors">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-orange-100 rounded-full flex items-center justify-center">
                                        <span class="text-orange-600 font-semibold">LP</span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Liberty Park - Tree Installation</h4>
                                        <p class="text-sm text-gray-500">Scheduled for next week</p>
                                    </div>
                                </div>
                                <div class="flex items-center space-x-3">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                        Scheduled
                                    </span>
                                    <span class="text-lg font-semibold text-gray-900">$4,200</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Quick Actions & Stats --}}
            <div class="space-y-6">
                {{-- Quick Actions --}}
                <div class="bg-white rounded-2xl shadow-lg border border-gray-100">
                    <div class="px-6 py-4 border-b border-gray-200">
                        <h3 class="text-lg font-semibold text-gray-900">Quick Actions</h3>
                    </div>
                    <div class="p-6 space-y-3">
                        <a href="{{ route('admin.projects.create') }}" class="flex items-center p-3 bg-emerald-50 hover:bg-emerald-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-emerald-100 group-hover:bg-emerald-200 rounded-lg">
                                <svg class="w-5 h-5 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">New Project</span>
                        </a>

                        <a href="{{ route('admin.customers.create') }}" class="flex items-center p-3 bg-blue-50 hover:bg-blue-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-blue-100 group-hover:bg-blue-200 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">Add Customer</span>
                        </a>

                        <a href="{{ route('admin.quotes.create') }}" class="flex items-center p-3 bg-purple-50 hover:bg-purple-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-purple-100 group-hover:bg-purple-200 rounded-lg">
                                <svg class="w-5 h-5 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">Create Quote</span>
                        </a>

                        <a href="{{ route('admin.schedule') }}" class="flex items-center p-3 bg-orange-50 hover:bg-orange-100 rounded-xl transition-colors group">
                            <div class="p-2 bg-orange-100 group-hover:bg-orange-200 rounded-lg">
                                <svg class="w-5 h-5 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                                </svg>
                            </div>
                            <span class="ml-3 font-medium text-gray-900">View Schedule</span>
                        </a>
                    </div>
                </div>

                {{-- Monthly Revenue Chart --}}
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
                                    <span class="text-sm font-medium text-gray-900">$42,300</span>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">February</span>
                                <div class="flex items-center space-x-2">
                                    <div class="w-32 bg-gray-200 rounded-full h-2">
                                        <div class="bg-emerald-500 h-2 rounded-full" style="width: 70%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">$35,200</span>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center">
                                <span class="text-sm text-gray-600">March</span>
                                <div class="flex items-center space-x-2">
                                    <div class="w-32 bg-gray-200 rounded-full h-2">
                                        <div class="bg-emerald-500 h-2 rounded-full" style="width: 95%"></div>
                                    </div>
                                    <span class="text-sm font-medium text-gray-900">$49,930</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Team Performance --}}
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

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                                        <span class="text-blue-600 font-semibold text-sm">SL</span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Sarah Lee</h4>
                                        <p class="text-xs text-gray-500">Project Manager</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm font-semibold text-gray-900">12 Projects</div>
                                    <div class="text-xs text-blue-600">+1 this week</div>
                                </div>
                            </div>

                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-purple-100 rounded-full flex items-center justify-center">
                                        <span class="text-purple-600 font-semibold text-sm">RT</span>
                                    </div>
                                    <div>
                                        <h4 class="font-medium text-gray-900">Robert Taylor</h4>
                                        <p class="text-xs text-gray-500">Installation Lead</p>
                                    </div>
                                </div>
                                <div class="text-right">
                                    <div class="text-sm font-semibold text-gray-900">6 Projects</div>
                                    <div class="text-xs text-purple-600">+3 this week</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Recent Notifications --}}
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
                    
                    <div class="p-6 flex items-start space-x-4 hover:bg-gray-50 transition-colors">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">
                                <span class="font-medium">Project completed</span> - Miller Business Plaza irrigation system installed
                            </p>
                            <p class="text-xs text-gray-500 mt-1">1 hour ago</p>
                        </div>
                    </div>
                    
                    <div class="p-6 flex items-start space-x-4 hover:bg-gray-50 transition-colors">
                        <div class="flex-shrink-0 w-2 h-2 bg-yellow-500 rounded-full mt-2"></div>
                        <div class="flex-1">
                            <p class="text-sm text-gray-900">
                                <span class="font-medium">Payment received</span> - $8,500 from Johnson Residence project
                            </p>
                            <p class="text-xs text-gray-500 mt-1">3 hours ago</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Add some custom CSS for animations --}}
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
</style>

{{-- Alpine.js for interactive elements --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add smooth hover effects
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
            // You can add AJAX calls here to refresh stats
            console.log('Refreshing dashboard stats...');
        }, 30000);
    });
</script>
@endsection