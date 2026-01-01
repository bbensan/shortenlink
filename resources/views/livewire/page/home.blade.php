<div>
    <!-- Hero Section -->
    <section class="mt-16 gradient-background hero-container">
        <div class="container mx-auto px-6 py-16 md:py-24">
            <div class="flex flex-col md:flex-row items-center">
                <div class="md:w-1/2 mb-10 md:mb-0">
                    <h1 class="text-4xl md:text-5xl font-bold text-gray-800 leading-tight">
                        Make Your Links 
                        <span class="gradient-text">Lovely</span> 
                        and Short
                    </h1>
                    <p class="mt-4 text-xl text-gray-600">
                        Create memorable, short links in seconds with Lovilink's simple, powerful URL shortener.
                    </p>
                    <div class="mt-8" x-data="{ 
                        showResult: false,
                        animatedPlaceholder: '',
                        isAnimating: false,
                        isLoading: false,
                        currentIndex: 0,
                        typingSpeed: 70,
                        deletingSpeed: 40,
                        pauseAfterTyping: 1500,
                        pauseBeforeReplay: 10000,
                        longUrl: 'https://example.com/very/long/url/path',
                        shortUrl: 'https://lovilink.com/myurl',
                        
                        init() {
                            // Start animation only if input is not focused and has no value
                            this.startAnimation();
                        },
                        
                        startAnimation() {
                            if (this.isAnimating) return;
                            this.isAnimating = true;
                            this.animatedPlaceholder = '';
                            this.currentIndex = 0;
                            
                            // Type longUrl
                            this.typePlaceholder(this.longUrl, () => {
                                // Pause after typing longUrl
                                setTimeout(() => {
                                    // Delete all characters
                                    this.deletePlaceholder(() => {
                                        this.currentIndex = 0;
                                        // Type shortUrl
                                        this.typePlaceholder(this.shortUrl, () => {
                                            // Pause 10 seconds after showing shortUrl before replay
                                            setTimeout(() => {
                                                // Delete all characters
                                                this.deletePlaceholder(() => {
                                                    // Reset and loop
                                                    this.isAnimating = false;
                                                    this.startAnimation();
                                                });
                                            }, this.pauseBeforeReplay);
                                        });
                                    });
                                }, this.pauseAfterTyping);
                            });
                        },
                        
                        typePlaceholder(text, callback) {
                            if (this.currentIndex < text.length) {
                                this.animatedPlaceholder += text.charAt(this.currentIndex);
                                this.currentIndex++;
                                setTimeout(() => this.typePlaceholder(text, callback), this.typingSpeed);
                            } else if (callback) {
                                callback();
                            }
                        },
                        
                        deletePlaceholder(callback) {
                            if (this.animatedPlaceholder.length > 0) {
                                this.animatedPlaceholder = this.animatedPlaceholder.slice(0, -1);
                                setTimeout(() => this.deletePlaceholder(callback), this.deletingSpeed);
                            } else if (callback) {
                                callback();
                            }
                        },
                        
                        stopAnimation() {
                            this.isAnimating = false;
                        },
                        
                        restartAnimation() {
                            if (!$wire.url) {
                                this.startAnimation();
                            }
                        }
                    }">
                        <form wire:submit.prevent="shortenUrl">
                            <div class="flex flex-col sm:flex-row">
                                <div class="input-container flex-1 rounded-l-full overflow-hidden mobile-adjustment-tr">
                                    <input 
                                        wire:model="url"
                                        id="animated-placeholder" 
                                        type="text" 
                                        :placeholder="animatedPlaceholder" 
                                        class="w-full px-6 py-4 focus:outline-none placeholder-gray-400 text-gray-900"
                                        :disabled="isLoading"
                                        @focus="stopAnimation()"
                                        @blur="restartAnimation()"
                                    />
                                </div>
                                <button 
                                    type="submit"
                                    class="btn-highlight px-8 py-4 rounded-r-full text-white font-medium flex items-center justify-center mt-2 sm:mt-0 mobile-adjustment-br"
                                    :disabled="isLoading"
                                    :class="{ 'opacity-50 cursor-not-allowed': isLoading }"
                                >
                                    <span wire:loading.remove wire:target="shortenUrl">Shorten</span>
                                    <span wire:loading wire:target="shortenUrl" class="flex items-center">
                                        <svg class="animate-spin -ml-1 mr-2 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                        </svg>
                                        Shortening...
                                    </span>
                                    <svg wire:loading.remove wire:target="shortenUrl" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2" viewBox="0 0 20 20" fill="currentColor">
                                        <path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </button>
                            </div>
                        </form>

                        <!-- Error Message -->
                        <div x-show="$wire.error" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="mt-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg"
                             wire:ignore>
                            <p class="font-semibold">Error</p>
                            <p class="mt-1" x-text="$wire.error"></p>
                        </div>

                        <!-- Success Message -->
                        <div x-show="$wire.shortenedUrl" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform translate-y-2"
                             x-transition:enter-end="opacity-100 transform translate-y-0"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="mt-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg"
                             x-data="{ copied: false }"
                             wire:ignore>
                            <p class="font-semibold">Success!</p>
                            <p class="mt-2">
                                Your shortened URL: 
                                <a :href="'/' + $wire.shortenedUrl" 
                                   target="_blank" 
                                   class="underline font-medium"
                                   x-text="window.location.origin + '/' + $wire.shortenedUrl">
                                </a>
                            </p>
                            <button 
                                @click="
                                    navigator.clipboard.writeText(window.location.origin + '/' + $wire.shortenedUrl);
                                    copied = true;
                                    setTimeout(() => copied = false, 2000);
                                "
                                class="mt-2 px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 transition-colors"
                                :class="{ 'bg-green-700': copied }"
                            >
                                <span x-show="!copied">Copy Link</span>
                                <span x-show="copied">Copied!</span>
                            </button>
                        </div>

                        <p class="text-gray-600 mt-2 text-sm">No registration required - it's 100% free!</p>
                    </div>
                </div>
                <div class="md:w-1/2 float-animation">
                    <img src="{{ asset('assets/logo/lovidino2.webp') }}" loading="lazy" alt="URL shortening" class="mx-auto" style="width:500px;height: 400px;object-fit: contain;">
                </div>
            </div>
        </div>
    </section>

    <!-- Recent URLs Section -->
    @if($recentUrls->count() > 0)
    <section class="py-12 bg-gray-50" x-data="{ isMobile: window.innerWidth < 768 }" x-init="window.addEventListener('resize', () => isMobile = window.innerWidth < 768)">
        <div class="container mx-auto px-6">
            <div class="max-w-4xl mx-auto">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-800">
                        Your Recent Links
                    </h2>
                    <span class="text-sm text-gray-600 bg-purple-100 px-3 py-1 rounded-full">
                        {{ $recentUrls->count() }} {{ $recentUrls->count() === 1 ? 'link' : 'links' }}
                    </span>
                </div>
                
                <div class="bg-white rounded-xl shadow-lg overflow-hidden">
                    <!-- Desktop Table View -->
                    <div x-show="!isMobile" class="overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gradient-to-r from-purple-50 to-blue-50">
                                <tr>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Original URL</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Short URL</th>
                                    <th class="px-6 py-4 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Clicks</th>
                                    <th class="px-6 py-4 text-center text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                                @foreach($recentUrls as $url)
                                <tr class="hover:bg-gray-50 transition-colors" x-data="{ copied{{ $loop->index }}: false }">
                                    <td class="px-6 py-4">
                                        <div class="max-w-xs">
                                            <a href="{{ $url->original_url }}" 
                                               target="_blank" 
                                               class="text-sm text-gray-900 hover:text-purple-600 truncate block"
                                               title="{{ $url->original_url }}">
                                                {{ Str::limit($url->original_url, 40) }}
                                            </a>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <a href="{{ url('/' . $url->shortened_url) }}" 
                                           target="_blank"
                                           class="text-sm font-medium text-purple-600 hover:text-purple-700">
                                            {{ url('/' . $url->shortened_url) }}
                                        </a>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm text-gray-600">
                                            {{ number_format($url->click_count ?? 0) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center justify-center gap-2">
                                            <button 
                                                @click="
                                                    navigator.clipboard.writeText('{{ url('/' . $url->shortened_url) }}');
                                                    copied{{ $loop->index }} = true;
                                                    setTimeout(() => copied{{ $loop->index }} = false, 2000);
                                                "
                                                class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                                                :class="copied{{ $loop->index }} ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700 hover:bg-purple-200'"
                                                title="Copy short URL"
                                            >
                                                <span x-show="!copied{{ $loop->index }}">Copy</span>
                                                <span x-show="copied{{ $loop->index }}">Copied!</span>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <!-- Mobile Card List View -->
                    <div x-show="isMobile" class="divide-y divide-gray-200">
                        @foreach($recentUrls as $url)
                        <div class="p-4 hover:bg-gray-50 transition-colors" x-data="{ copied{{ $loop->index }}: false }">
                            <div class="space-y-3">
                                <!-- Original URL -->
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Original URL</p>
                                    <a href="{{ $url->original_url }}" 
                                       target="_blank" 
                                       class="text-sm text-gray-900 hover:text-purple-600 break-words block"
                                       title="{{ $url->original_url }}">
                                        {{ Str::limit($url->original_url, 50) }}
                                    </a>
                                </div>

                                <!-- Short URL -->
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Short URL</p>
                                    <a href="{{ url('/' . $url->shortened_url) }}" 
                                       target="_blank"
                                       class="text-sm font-medium text-purple-600 hover:text-purple-700 break-all block">
                                        {{ url('/' . $url->shortened_url) }}
                                    </a>
                                </div>

                                <!-- Clicks & Actions Row -->
                                <div class="flex items-center justify-between pt-2 border-t border-gray-100">
                                    <div>
                                        <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider mb-1">Clicks</p>
                                        <span class="text-sm font-medium text-gray-700">
                                            {{ number_format($url->click_count ?? 0) }}
                                        </span>
                                    </div>
                                    <div>
                                        <button 
                                            @click="
                                                navigator.clipboard.writeText('{{ url('/' . $url->shortened_url) }}');
                                                copied{{ $loop->index }} = true;
                                                setTimeout(() => copied{{ $loop->index }} = false, 2000);
                                            "
                                            class="px-4 py-2 text-sm font-medium rounded-lg transition-colors flex items-center gap-2"
                                            :class="copied{{ $loop->index }} ? 'bg-green-100 text-green-700' : 'bg-purple-100 text-purple-700 hover:bg-purple-200'"
                                        >
                                            <svg x-show="!copied{{ $loop->index }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                                            </svg>
                                            <svg x-show="copied{{ $loop->index }}" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                            </svg>
                                            <span x-show="!copied{{ $loop->index }}">Copy</span>
                                            <span x-show="copied{{ $loop->index }}">Copied!</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    
                    @if($hasMoreUrls)
                    <div class="px-4 md:px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-center justify-center">
                            @auth
                                <a href="{{ route('info-login') }}" 
                                   class="px-6 py-2 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition-colors shadow-sm hover:shadow-md">
                                    View All Links
                                </a>
                            @else
                                <a href="{{ route('info-login') }}" 
                                   class="px-6 py-2 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition-colors shadow-sm hover:shadow-md">
                                    Login to View All Links
                                </a>
                            @endauth
                        </div>
                        <p class="text-center text-xs text-gray-500 mt-2">
                            Showing 5 of your recent links
                        </p>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    @endif
    
    <!-- Features Section -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Why Choose <span class="gradient-text">Lovilink</span>?</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 features-container">
                <!-- Feature 1 -->
                <div class="card card-highlight p-6">
                    <div class="feature-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center">Lightning Fast</h3>
                    <p class="text-gray-600 text-center mt-2">Create and share shortened links in seconds, no waiting time.</p>
                </div>
                
                <!-- Feature 2 -->
                <div class="card card-highlight p-6">
                    <div class="feature-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center">Secure & Reliable</h3>
                    <p class="text-gray-600 text-center mt-2">Your links are secure and will never expire unless you want them to.</p>
                </div>
                
                <!-- Feature 3 -->
                <div class="card card-highlight p-6">
                    <div class="feature-icon mx-auto">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-center">Detailed Analytics</h3>
                    <p class="text-gray-600 text-center mt-2">Track clicks, locations, and devices with our powerful dashboard.</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- How It Works Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">How <span class="gradient-text">Lovilink</span> Works</h2>
            
            <div class="flex flex-col md:flex-row justify-between items-center">
                <!-- Step 1 -->
                <div class="flex flex-col items-center mb-8 md:mb-0">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background-color: var(--color-primary)">
                        <span class="text-2xl font-bold">1</span>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold">Paste Your URL</h3>
                    <p class="text-gray-600 text-center mt-2 max-w-xs">Enter your long URL in the input field</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
                
                <!-- Step 2 -->
                <div class="flex flex-col items-center mb-8 md:mb-0">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background-color: var(--color-secondary)">
                        <span class="text-2xl font-bold">2</span>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold">Click Shorten</h3>
                    <p class="text-gray-600 text-center mt-2 max-w-xs">Our system instantly creates a short link for you</p>
                </div>
                
                <!-- Arrow -->
                <div class="hidden md:block">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                    </svg>
                </div>
                
                <!-- Step 3 -->
                <div class="flex flex-col items-center">
                    <div class="w-16 h-16 rounded-full flex items-center justify-center" style="background-color: var(--color-highlight)">
                        <span class="text-2xl font-bold text-white">3</span>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold">Share Your Link</h3>
                    <p class="text-gray-600 text-center mt-2 max-w-xs">Copy and share your new short URL anywhere</p>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Call to Action -->
    <section class="py-16" style="background-color: var(--color-primary)">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-bold mb-4">Ready to Make Your Links Lovely?</h2>
            <p class="text-xl text-gray-700 mb-8">Join thousands of users who trust Lovilink for their URL shortening needs.</p>
            <a href="/register" class="inline-block px-8 py-4 rounded-full btn-highlight text-white font-medium text-lg">
                Get Started - It's Free
            </a>
        </div>
    </section>

    <!-- Cookie Consent Banner -->
    <div x-data="{ 
        showBanner: false,
        init() {
            // Check if consent already given
            if (!localStorage.getItem('cookieConsent')) {
                this.showBanner = true;
            }
        },
        acceptCookies(type = 'all') {
            localStorage.setItem('cookieConsent', type);
            localStorage.setItem('cookieConsentDate', new Date().toISOString());
            this.showBanner = false;
        }
    }"
    x-show="showBanner"
    x-cloak
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0 transform translate-y-full"
    x-transition:enter-end="opacity-100 transform translate-y-0"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100 transform translate-y-0"
    x-transition:leave-end="opacity-0 transform translate-y-full"
    class="fixed bottom-0 left-0 right-0 z-50 bg-white border-t border-gray-200 shadow-2xl">
        <div class="container mx-auto px-4 md:px-6 py-4 md:py-5">
            <div class="flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <!-- Cookie Icon & Message -->
                <div class="flex items-start gap-3 md:gap-4 flex-1">
                    <div class="flex-shrink-0 mt-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 md:h-7 md:w-7 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4" />
                        </svg>
                    </div>
                    <div class="flex-1">
                        <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1">
                            We Use Cookies
                        </h3>
                        <p class="text-xs md:text-sm text-gray-600 leading-relaxed">
                            We use cookies to enhance your browsing experience, serve personalized content, and analyze our traffic. By clicking "Accept All", you consent to our use of cookies. 
                            <a href="{{ route('info-cookie') }}" wire:navigate class="text-purple-600 hover:text-purple-700 font-medium underline">Learn more about our cookie policy</a>
                        </p>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2 md:gap-3 w-full md:w-auto md:flex-shrink-0">
                    <button 
                        @click="acceptCookies()"
                        class="px-5 md:px-6 py-2.5 md:py-3 bg-purple-600 text-white text-sm md:text-base font-medium rounded-lg hover:bg-purple-700 transition-colors shadow-sm hover:shadow-md whitespace-nowrap"
                    >
                        Accept All
                    </button>
                    <button 
                        @click="acceptCookies('necessary')"
                        class="px-5 md:px-6 py-2.5 md:py-3 bg-gray-100 text-gray-700 text-sm md:text-base font-medium rounded-lg hover:bg-gray-200 transition-colors whitespace-nowrap"
                    >
                        Accept Necessary Only
                    </button>
                </div>
            </div>
        </div>
    </div>

</div>