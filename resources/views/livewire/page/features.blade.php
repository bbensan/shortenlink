<div>
    <!-- Link Shortening Section -->
    <section class="mt-16 pt-16 pb-16 bg-gray-900">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-center mb-12 text-white">
                Link Shortening & Sharing
            </h1>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Feature 1 - URL Shortener with GIF placeholder -->
                <div class="card card-primary bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4">
                        <div class="w-full sm:w-1/3 aspect-square flex-shrink-0">
                            <img src="https://placehold.co/150" alt="URL Shortener GIF" class="w-full h-full object-cover bg-gray-200 rounded" />
                        </div>
                        <div class="w-full sm:w-2/3 flex flex-col h-full">
                            <h3 class="text-xl font-semibold text-white mb-2">Fast & Reliable URL Shortener</h3>
                            <p class="text-gray-300 text-sm flex-grow">Transform lengthy URLs into concise, memorable links in seconds. Our lightning-fast engine processes shortening requests instantly, ensuring your links are always ready when you need them, even during high-traffic periods.</p>
                        </div>
                    </div>
                </div>
    
                <!-- Feature 2 - QR Code Generator with actual QR code -->
                <div class="card card-primary bg-gray-800 p-6 rounded-lg shadow-md border border-gray-700">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-4">
                        <div class="w-full sm:w-1/3 aspect-square flex-shrink-0">
                            <img src="{{ asset('assets/logo/qr-lovilink.webp') }}" alt="QR Code for lovilink.com" class="w-full h-full object-cover p-1 rounded" />
                        </div>
                        <div class="w-full sm:w-2/3 flex flex-col h-full">
                            <h3 class="text-xl font-semibold text-white mb-2">QR Code Generator</h3>
                            <p class="text-gray-300 text-sm flex-grow">Every shortened link comes with its own custom QR code, ready to download in high resolution. Perfect for business cards, print materials, in-store displays, and event signage — seamlessly bridge your offline and online presence.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Bio Links Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
                Professional Bio Pages
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-1 gap-8">
                <!-- Feature 3 -->
                <div class="card card-accent border-l border-b border-r border-gray-200 p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Personal Bio Links</h3>
                    <p class="text-gray-700">Create stunning, mobile-optimized landing pages that showcase all your important links in one place. With customizable templates, brand colors, and profile options, your bio page becomes a powerful extension of your digital identity. Ideal for social media profiles, creators, small businesses, and professionals looking to make a lasting impression.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Analytics Section -->
    <section class="py-16 gradient-background">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
                Powerful Analytics & Insights
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Feature 4 -->
                <div class="card card-highlight bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Comprehensive Click Tracking</h3>
                    <p class="text-gray-700">Gain valuable insights with detailed click statistics for every link. Track daily, weekly, and monthly engagement patterns to identify peak performance times and optimize your sharing schedule for maximum impact.</p>
                </div>

                <!-- Feature 5 -->
                <div class="card card-highlight bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Geo-Location & Device Analytics</h3>
                    <p class="text-gray-700">Discover exactly where your audience is located with country and city-level tracking. Understand which devices and browsers they prefer, allowing you to tailor your content strategy and technical optimizations for the platforms that matter most.</p>
                </div>

                <!-- Feature 6 -->
                <div class="card card-highlight bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Real-Time Interactive Dashboard</h3>
                    <p class="text-gray-700">Monitor performance as it happens with our intuitive, real-time dashboard. Visualize trends with interactive charts and graphs, export reports with one click, and make data-driven decisions that elevate your link sharing strategy.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Free Tools Section -->
    <section class="py-16 bg-gray-900">
        <div class="container mx-auto px-6 max-w-6xl">
            <div class="text-center mb-12">
                <h2 class="text-3xl font-bold mb-4 text-white">
                    Free Tools & Utilities
                </h2>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Discover our collection of free, powerful tools designed to simplify your digital workflow and enhance your productivity.
                </p>
            </div>

            <!-- Tools Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-8">
                <!-- QR Code Generator Card -->
                <a 
                    href="{{ route('info-tools') }}?tool=qr-code"
                    wire:navigate.hover
                    class="bg-gray-800 rounded-lg p-6 shadow-xl border border-gray-700 hover:border-purple-500 transition-all duration-300 hover:shadow-2xl group text-left block">
                    <div class="flex items-start justify-between mb-4">
                        <div class="bg-purple-500/10 p-3 rounded-lg group-hover:bg-purple-500/20 transition-colors">
                            <svg class="h-8 w-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                            </svg>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-400 bg-green-400/10 rounded-full border border-green-400/20">
                            Available
                        </span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-purple-300 transition-colors">
                        QR Code Generator
                    </h3>
                    <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                        Generate custom QR codes instantly for any URL, text, or data. Perfect for marketing materials, business cards, and sharing links offline.
                    </p>
                    <div class="flex items-center text-purple-400 text-sm font-medium group-hover:text-purple-300 transition-colors">
                        <span>Use Tool</span>
                        <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>

                <!-- Random String Generator Card -->
                <a 
                    href="{{ route('info-tools') }}?tool=string-generator"
                    wire:navigate.hover
                    class="bg-gray-800 rounded-lg p-6 shadow-xl border border-gray-700 hover:border-purple-500 transition-all duration-300 hover:shadow-2xl group text-left block">
                    <div class="flex items-start justify-between mb-4">
                        <div class="bg-purple-500/10 p-3 rounded-lg group-hover:bg-purple-500/20 transition-colors">
                            <svg class="h-8 w-8 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                            </svg>
                        </div>
                        <span class="px-3 py-1 text-xs font-semibold text-green-400 bg-green-400/10 rounded-full border border-green-400/20">
                            Available
                        </span>
                    </div>
                    <h3 class="text-xl font-semibold text-white mb-2 group-hover:text-purple-300 transition-colors">
                        Random String Generator
                    </h3>
                    <p class="text-gray-300 text-sm mb-4 leading-relaxed">
                        Generate secure random strings, passwords, and tokens with customizable length and character sets. Ideal for API keys, passwords, and unique identifiers.
                    </p>
                    <div class="flex items-center text-purple-400 text-sm font-medium group-hover:text-purple-300 transition-colors">
                        <span>Use Tool</span>
                        <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </a>

                <!-- Coming Soon -->
                <div class="bg-gray-800 rounded-lg p-6 shadow-xl border border-gray-700 opacity-75 relative overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-500/10 to-transparent rounded-full -mr-16 -mt-16"></div>
                    <div class="relative">
                        <div class="flex items-start justify-between mb-4">
                            <div class="bg-gray-700/50 p-3 rounded-lg">
                                <svg class="h-8 w-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold text-yellow-400 bg-yellow-400/10 rounded-full border border-yellow-400/20">
                                Coming Soon
                            </span>
                        </div>
                        <h3 class="text-xl font-semibold text-white mb-2">
                            More Tools
                        </h3>
                        <p class="text-gray-400 text-sm mb-4 leading-relaxed">
                            We're constantly working on new tools to help you work smarter. Stay tuned for exciting additions to our toolkit.
                        </p>
                        <div class="flex items-center text-gray-500 text-sm font-medium">
                            <span>Coming Soon</span>
                            <svg class="h-4 w-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="text-center mt-8">
                <a href="{{ route('info-tools') }}" wire:navigate.hover class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors duration-300">
                    <span>Explore All Tools</span>
                    <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    <!-- Link Management Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12 text-gray-800">
                Effortless Link Management
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Feature 7 -->
                <div class="card card-secondary bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Unified Link Dashboard</h3>
                    <p class="text-gray-700">Organize and access all your shortened links from a single, intuitive dashboard. Search, filter, and sort your links with ease, ensuring you can always find what you need without wasting valuable time scrolling through lists.</p>
                </div>

                <!-- Feature 8 -->
                <div class="card card-secondary bg-white p-6 rounded-lg shadow-md">
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Smart Link Controls</h3>
                    <p class="text-gray-700">Take command of your links with powerful management tools. Edit destinations even after creation, deactivate underperforming links temporarily, and set expiration dates for time-sensitive campaigns — all with just a few clicks.</p>
                </div>
            </div>
            
            <p class="text-center text-gray-800 mt-16 text-lg font-bold">
                And what is the best part? <strong class="gradient-text">All features above are completely free!</strong>
            </p>
        </div>
    </section>

</div>
