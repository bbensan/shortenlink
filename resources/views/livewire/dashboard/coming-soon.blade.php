<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
            Coming <span class="gradient-text">Soon</span>
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Exciting new features are on the way! Stay tuned for updates.
        </p>
    </div>

    <!-- Coming Soon Items Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach($comingSoonItems as $item)
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6 hover:shadow-lg transition-shadow relative overflow-hidden">
            <!-- Background decoration -->
            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-purple-500/10 to-transparent rounded-full -mr-16 -mt-16"></div>
            
            <div class="relative">
                <!-- Header -->
                <div class="flex items-start justify-between mb-4">
                    <div class="bg-purple-100 dark:bg-purple-900/30 p-3 rounded-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                        </svg>
                    </div>
                    <span class="px-3 py-1 text-xs font-semibold text-yellow-500 dark:text-yellow-400 bg-yellow-100 dark:bg-yellow-900/30 rounded-full border border-yellow-200 dark:border-yellow-800">
                        Coming Soon
                    </span>
                </div>

                <!-- Content -->
                <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    {{ $item['title'] }}
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm leading-relaxed mb-4">
                    {{ $item['description'] }}
                </p>

                <!-- Progress indicator -->
                <div class="flex items-center gap-2 text-xs text-gray-500 dark:text-gray-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span>In development</span>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Additional Info -->
    <div class="mt-8 bg-gradient-to-r from-purple-50 to-pink-50 dark:from-purple-900/20 dark:to-pink-900/20 rounded-lg border border-purple-200 dark:border-purple-800 p-6">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </div>
            <div>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">
                    Want to be notified?
                </h3>
                <p class="text-gray-600 dark:text-gray-400 text-sm mb-4">
                    We're working hard to bring you these amazing features. Follow us for updates and be the first to know when they're available!
                </p>
                <a href="{{ route('info-contact') }}" wire:navigate.hover class="inline-flex items-center gap-2 px-4 py-2 bg-purple-600 dark:bg-purple-500 text-white rounded-lg font-medium hover:bg-purple-700 dark:hover:bg-purple-600 transition-colors text-sm">
                    <span>Get Updates</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </a>
            </div>
        </div>
    </div>
</div>

