<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sunday.com - Project Management Made Simple</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-white">
    <!-- Navigation -->
    <nav class="fixed top-0 w-full bg-white/80 backdrop-blur-md border-b border-gray-200 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600"></div>
                    <span class="text-2xl font-bold text-gray-900">Sunday.com</span>
                </div>
                <div class="flex items-center gap-4">
                    <a href="{{ route('login') }}"
                        class="text-gray-700 hover:text-gray-900 font-medium transition">Login</a>
                    <a href="{{ route('register') }}"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-medium transition shadow-lg shadow-blue-500/30">
                        Get Started Free
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="pt-32 pb-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-b from-blue-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-5xl sm:text-6xl lg:text-7xl font-bold text-gray-900 mb-6 leading-tight">
                    A platform built for a
                    <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">new way of
                        working</span>
                </h1>
                <p class="text-xl text-gray-600 mb-8 max-w-2xl mx-auto">
                    Manage your projects, organize your team, and track progress all in one place. Sunday.com makes work
                    simple, visual, and collaborative.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center items-center">
                    <a href="{{ route('register') }}"
                        class="px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold text-lg transition shadow-xl shadow-blue-500/30 hover:shadow-2xl hover:shadow-blue-500/40 transform hover:scale-105">
                        Start Free Trial
                    </a>
                    <a href="#features"
                        class="px-8 py-4 bg-white text-gray-900 border-2 border-gray-200 rounded-lg hover:border-gray-300 font-semibold text-lg transition">
                        See How It Works
                    </a>
                </div>
                <p class="mt-6 text-sm text-gray-500">No credit card required • Free forever for small teams</p>
            </div>

            <!-- Hero Image Placeholder -->
            <div class="mt-16 relative">
                <div
                    class="absolute inset-0 bg-gradient-to-r from-blue-400 to-purple-500 rounded-2xl blur-3xl opacity-20">
                </div>
                <div class="relative bg-white rounded-2xl shadow-2xl border border-gray-200 p-8">
                    <div class="grid grid-cols-3 gap-4">
                        <div class="h-48 bg-gradient-to-br from-blue-100 to-blue-50 rounded-lg border border-blue-200">
                        </div>
                        <div
                            class="h-48 bg-gradient-to-br from-purple-100 to-purple-50 rounded-lg border border-purple-200">
                        </div>
                        <div
                            class="h-48 bg-gradient-to-br from-green-100 to-green-50 rounded-lg border border-green-200">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16">
                <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-4">Everything you need to succeed</h2>
                <p class="text-xl text-gray-600">Powerful features to keep your team organized and productive</p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Feature 1 -->
                <div
                    class="p-8 bg-white rounded-2xl border border-gray-200 hover:border-blue-300 hover:shadow-xl transition group">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 17V7m0 10a2 2 0 01-2 2H5a2 2 0 01-2-2V7a2 2 0 012-2h2a2 2 0 012 2m0 10a2 2 0 002 2h2a2 2 0 002-2M9 7a2 2 0 012-2h2a2 2 0 012 2m0 10V7m0 10a2 2 0 002 2h2a2 2 0 002-2V7a2 2 0 00-2-2h-2a2 2 0 00-2 2">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Visual Boards</h3>
                    <p class="text-gray-600">Organize and track your work visually with customizable boards, columns,
                        and
                        cards that adapt to your workflow.</p>
                </div>

                <!-- Feature 2 -->
                <div
                    class="p-8 bg-white rounded-2xl border border-gray-200 hover:border-purple-300 hover:shadow-xl transition group">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                            </path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Team Collaboration</h3>
                    <p class="text-gray-600">Work together seamlessly with real-time updates, task assignments, and
                        progress
                        tracking for your entire team.</p>
                </div>

                <!-- Feature 3 -->
                <div
                    class="p-8 bg-white rounded-2xl border border-gray-200 hover:border-green-300 hover:shadow-xl transition group">
                    <div
                        class="w-14 h-14 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">Workflow Automation</h3>
                    <p class="text-gray-600">Save time with powerful automations. Set up rules to handle repetitive
                        tasks and
                        keep projects moving forward.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-blue-600 to-purple-600">
        <div class="max-w-7xl mx-auto">
            <div class="grid md:grid-cols-3 gap-8 text-center text-white">
                <div>
                    <div class="text-5xl font-bold mb-2">10M+</div>
                    <div class="text-blue-100">Users worldwide</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">180+</div>
                    <div class="text-blue-100">Countries</div>
                </div>
                <div>
                    <div class="text-5xl font-bold mb-2">99.9%</div>
                    <div class="text-blue-100">Uptime SLA</div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 px-4 sm:px-6 lg:px-8">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl sm:text-5xl font-bold text-gray-900 mb-6">Ready to get started?</h2>
            <p class="text-xl text-gray-600 mb-8">Join thousands of teams who trust Sunday.com to manage their work</p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('register') }}"
                    class="px-8 py-4 bg-blue-600 text-white rounded-lg hover:bg-blue-700 font-semibold text-lg transition shadow-xl shadow-blue-500/30">
                    Start Free Trial
                </a>
                <a href="{{ route('login') }}"
                    class="px-8 py-4 bg-white text-gray-900 border-2 border-gray-200 rounded-lg hover:border-gray-300 font-semibold text-lg transition">
                    Sign In
                </a>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-gray-400 py-12 px-4 sm:px-6 lg:px-8">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center gap-2 mb-4 md:mb-0">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-blue-500 to-purple-600"></div>
                    <span class="text-xl font-bold text-white">Sunday.com</span>
                </div>
                <div class="text-sm">
                    © {{ date('Y') }} Sunday.com. All rights reserved.
                </div>
            </div>
        </div>
    </footer>
</body>

</html>