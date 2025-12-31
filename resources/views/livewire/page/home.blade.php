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


</div>