<div x-data="{ 
    activeTool: @entangle('activeTool'),
    scrollToTool(toolName) {
        if (toolName) {
            setTimeout(() => {
                const element = document.getElementById('tool-' + toolName);
                if (element) {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }
            }, 300);
        }
    }
}" 
x-effect="scrollToTool(activeTool)"
wire:ignore.self>
    <section class="mt-16 pt-16 pb-16 bg-gray-900 min-h-screen">
        <div class="container mx-auto px-6 max-w-6xl">
            <!-- Header -->
            <div class="text-center mb-12">
                <h1 class="text-4xl font-bold mb-4 text-white">
                    Our Tools
                </h1>
                <p class="text-gray-400 text-lg max-w-2xl mx-auto">
                    Discover our collection of free, powerful tools designed to simplify your digital workflow and enhance your productivity.
                </p>
            </div>

            <!-- Tools Grid -->
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-16">
                <!-- QR Code Generator Card -->
                <button 
                    wire:click="openTool('qr-code')"
                    class="bg-gray-800 rounded-lg p-6 shadow-xl border {{ $activeTool === 'qr-code' ? 'border-purple-500' : 'border-gray-700' }} hover:border-purple-500 transition-all duration-300 hover:shadow-2xl group text-left">
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
                        <span>{{ $activeTool === 'qr-code' ? 'Close Tool' : 'Use Tool' }}</span>
                        <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>

                <!-- Random String Generator Card -->
                <button 
                    wire:click="openTool('string-generator')"
                    class="bg-gray-800 rounded-lg p-6 shadow-xl border {{ $activeTool === 'string-generator' ? 'border-purple-500' : 'border-gray-700' }} hover:border-purple-500 transition-all duration-300 hover:shadow-2xl group text-left">
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
                        <span>{{ $activeTool === 'string-generator' ? 'Close Tool' : 'Use Tool' }}</span>
                        <svg class="h-4 w-4 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                        </svg>
                    </div>
                </button>

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

            <!-- QR Code Generator Section -->
            <div 
                id="tool-qr-code"
                x-show="$wire.activeTool === 'qr-code'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="mb-16 bg-gray-800 rounded-lg p-8 shadow-xl border border-purple-500/30"
                style="display: none;">
                <h2 class="text-2xl font-bold mb-6 text-white flex items-center">
                    <svg class="h-6 w-6 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                    </svg>
                    QR Code Generator
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Form Section -->
                    <div>
                        <form wire:submit.prevent="generateQrCode" class="space-y-6">
                            <div>
                                <label for="qrText" class="block text-sm font-medium text-gray-300 mb-2">
                                    Enter Text or URL <span class="text-red-400">*</span>
                                </label>
                                <textarea 
                                    id="qrText"
                                    wire:model="qrText"
                                    rows="4"
                                    placeholder="https://example.com or any text..."
                                    class="w-full px-4 py-3 bg-gray-700 border border-gray-600 rounded-lg text-white placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                    required></textarea>
                                @error('qrText')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="qrSize" class="block text-sm font-medium text-gray-300 mb-2">
                                    Size: <span x-text="$wire.qrSize"></span>px
                                </label>
                                <input 
                                    type="range" 
                                    id="qrSize"
                                    wire:model.live="qrSize"
                                    min="200" 
                                    max="600" 
                                    step="50"
                                    class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-purple-500">
                            </div>

                            <button 
                                type="submit"
                                wire:loading.attr="disabled"
                                class="w-full px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">
                                <span wire:loading.remove wire:target="generateQrCode">Generate QR Code</span>
                                <span wire:loading wire:target="generateQrCode" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Generating...
                                </span>
                            </button>
                        </form>
                    </div>

                    <!-- QR Code Preview Section -->
                    <div class="flex flex-col items-center justify-center">
                        @if($qrCodeDataUri)
                            <div class="bg-white p-6 rounded-lg shadow-lg mb-4">
                                <img src="{{ $qrCodeDataUri }}" alt="Generated QR Code" class="w-full max-w-sm mx-auto">
                            </div>
                            <button 
                                wire:click="downloadQrCode"
                                class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-300 flex items-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                </svg>
                                Download QR Code
                            </button>
                        @else
                            <div class="bg-gray-700 p-12 rounded-lg border-2 border-dashed border-gray-600 text-center w-full">
                                <svg class="h-24 w-24 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                                </svg>
                                <p class="text-gray-400">Your QR code will appear here</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Random String Generator Section -->
            <div 
                id="tool-string-generator"
                x-show="$wire.activeTool === 'string-generator'"
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform translate-y-4"
                x-transition:enter-end="opacity-100 transform translate-y-0"
                x-transition:leave="transition ease-in duration-200"
                x-transition:leave-start="opacity-100 transform translate-y-0"
                x-transition:leave-end="opacity-0 transform translate-y-4"
                class="mb-16 bg-gray-800 rounded-lg p-8 shadow-xl border border-purple-500/30"
                style="display: none;">
                <h2 class="text-2xl font-bold mb-6 text-white flex items-center">
                    <svg class="h-6 w-6 text-purple-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                    </svg>
                    Random String Generator
                </h2>
                
                <div class="grid md:grid-cols-2 gap-8">
                    <!-- Form Section -->
                    <div>
                        <form wire:submit.prevent="generateString" class="space-y-6">
                            <div>
                                <label for="stringLength" class="block text-sm font-medium text-gray-300 mb-2">
                                    Length: <span x-text="$wire.stringLength"></span> characters
                                </label>
                                <input 
                                    type="range" 
                                    id="stringLength"
                                    wire:model.live="stringLength"
                                    min="4" 
                                    max="256" 
                                    step="4"
                                    class="w-full h-2 bg-gray-700 rounded-lg appearance-none cursor-pointer accent-purple-500 mb-2">
                                <div class="flex justify-between text-xs text-gray-400">
                                    <span>4</span>
                                    <span>256</span>
                                </div>
                                @error('stringLength')
                                    <p class="mt-1 text-sm text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-300 mb-3">Character Types</label>
                                <div class="space-y-3">
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="includeUppercase" class="w-4 h-4 text-purple-600 bg-gray-700 border-gray-600 rounded focus:ring-purple-500">
                                        <span class="ml-3 text-gray-300">Uppercase (A-Z)</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="includeLowercase" class="w-4 h-4 text-purple-600 bg-gray-700 border-gray-600 rounded focus:ring-purple-500">
                                        <span class="ml-3 text-gray-300">Lowercase (a-z)</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="includeNumbers" class="w-4 h-4 text-purple-600 bg-gray-700 border-gray-600 rounded focus:ring-purple-500">
                                        <span class="ml-3 text-gray-300">Numbers (0-9)</span>
                                    </label>
                                    <label class="flex items-center cursor-pointer">
                                        <input type="checkbox" wire:model="includeSymbols" class="w-4 h-4 text-purple-600 bg-gray-700 border-gray-600 rounded focus:ring-purple-500">
                                        <span class="ml-3 text-gray-300">Symbols (!@#$%...)</span>
                                    </label>
                                </div>
                            </div>

                            <button 
                                type="submit"
                                wire:loading.attr="disabled"
                                class="w-full px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors duration-300 disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center">
                                <span wire:loading.remove wire:target="generateString">Generate String</span>
                                <span wire:loading wire:target="generateString" class="flex items-center">
                                    <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    Generating...
                                </span>
                            </button>
                        </form>
                    </div>

                    <!-- Generated String Display -->
                    <div class="flex flex-col justify-center">
                        @if($generatedString)
                            <div class="bg-gray-700 p-6 rounded-lg border border-gray-600 mb-4">
                                <label class="block text-sm font-medium text-gray-300 mb-2">Generated String</label>
                                <div class="bg-gray-800 p-4 rounded border border-gray-600 break-all">
                                    <code class="text-green-400 text-sm font-mono">{{ $generatedString }}</code>
                                </div>
                            </div>
                            <button 
                                wire:click="copyString"
                                onclick="navigator.clipboard.writeText('{{ $generatedString }}'); this.innerHTML='<svg class=\'h-5 w-5 mr-2\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M5 13l4 4L19 7\'></path></svg>Copied!'; setTimeout(() => { this.innerHTML='<svg class=\'h-5 w-5 mr-2\' fill=\'none\' stroke=\'currentColor\' viewBox=\'0 0 24 24\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' stroke-width=\'2\' d=\'M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z\'></path></svg>Copy to Clipboard'; }, 2000);"
                                class="w-full px-6 py-3 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-lg transition-colors duration-300 flex items-center justify-center">
                                <svg class="h-5 w-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"></path>
                                </svg>
                                Copy to Clipboard
                            </button>
                        @else
                            <div class="bg-gray-700 p-12 rounded-lg border-2 border-dashed border-gray-600 text-center">
                                <svg class="h-24 w-24 text-gray-500 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"></path>
                                </svg>
                                <p class="text-gray-400">Your generated string will appear here</p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Additional Information Section -->
            <div class="mt-16 bg-gray-800 rounded-lg p-8 shadow-xl">
                <div class="max-w-3xl mx-auto text-center">
                    <h2 class="text-2xl font-semibold mb-4 text-white">
                        Why Use Our Tools?
                    </h2>
                    <div class="grid md:grid-cols-3 gap-6 mt-8">
                        <div>
                            <div class="bg-purple-500/10 p-4 rounded-lg inline-block mb-3">
                                <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Fast & Efficient</h3>
                            <p class="text-gray-300 text-sm">Lightning-fast processing for all your needs</p>
                        </div>
                        <div>
                            <div class="bg-purple-500/10 p-4 rounded-lg inline-block mb-3">
                                <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">Secure & Private</h3>
                            <p class="text-gray-300 text-sm">Your data stays safe and private</p>
                        </div>
                        <div>
                            <div class="bg-purple-500/10 p-4 rounded-lg inline-block mb-3">
                                <svg class="h-6 w-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <h3 class="text-lg font-semibold text-white mb-2">100% Free</h3>
                            <p class="text-gray-300 text-sm">No hidden costs, completely free to use</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Call to Action -->
            <div class="mt-12 text-center">
                <p class="text-gray-400 mb-4">
                    Have a suggestion for a new tool? We'd love to hear from you!
                </p>
                <a href="{{ route('info-feedback') }}" class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white font-semibold rounded-lg transition-colors duration-300">
                    <span>Send Feedback</span>
                    <svg class="h-5 w-5 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                </a>
            </div>
        </div>
    </section>

    @script
    <script>
        $wire.on('scroll-to-tool', (event) => {
            const toolId = 'tool-' + event.tool;
            const element = document.getElementById(toolId);
            if (element) {
                setTimeout(() => {
                    element.scrollIntoView({ behavior: 'smooth', block: 'start' });
                }, 100);
            }
        });

        $wire.on('download-qr-code', (event) => {
            const link = document.createElement('a');
            link.href = event.dataUri;
            link.download = 'lovilink-qrcode-' + Date.now() + '.png';
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        });
    </script>
    @endscript
</div>
