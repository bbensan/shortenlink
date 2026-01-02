<div>
    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
            QR Code <span class="gradient-text">Generator</span>
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Generate custom QR codes instantly for any URL, text, or data.
        </p>
    </div>

    <!-- QR Code Generator Card -->
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
        <form wire:submit.prevent="generateQrCode">
            <div class="space-y-4">
                <!-- Input Field -->
                <div>
                    <label for="qrText" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Enter URL or Text
                    </label>
                    <textarea 
                        id="qrText"
                        wire:model="qrText"
                        rows="3"
                        class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 resize-none"
                        placeholder="https://example.com or any text you want to encode"
                        required
                    ></textarea>
                    @error('qrText') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <!-- Size Slider -->
                <div>
                    <label for="qrSize" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        QR Code Size: <span class="text-purple-600 dark:text-purple-400">{{ $qrSize }}px</span>
                    </label>
                    <input 
                        type="range" 
                        id="qrSize"
                        wire:model.live="qrSize"
                        min="100" 
                        max="1000" 
                        step="50"
                        class="w-full h-2 bg-gray-200 dark:bg-gray-700 rounded-lg appearance-none cursor-pointer accent-purple-600 dark:accent-purple-500"
                    >
                    <div class="flex justify-between text-xs text-gray-500 dark:text-gray-400 mt-1">
                        <span>100px</span>
                        <span>1000px</span>
                    </div>
                </div>

                <!-- Error Message -->
                @if($qrError)
                <div class="p-4 bg-red-100 dark:bg-red-900/20 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 rounded-lg">
                    <p class="font-semibold">Error</p>
                    <p class="mt-1 text-sm">{{ $qrError }}</p>
                </div>
                @endif

                <!-- Generate Button -->
                <button 
                    type="submit"
                    class="w-full px-6 py-3 bg-purple-600 dark:bg-purple-500 text-white rounded-lg font-medium hover:bg-purple-700 dark:hover:bg-purple-600 transition-colors flex items-center justify-center gap-2"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                    </svg>
                    Generate QR Code
                </button>
            </div>
        </form>

        <!-- QR Code Display -->
        @if($qrCodeDataUri)
        <div class="mt-8 pt-8 border-t border-gray-200 dark:border-gray-700">
            <div class="flex flex-col items-center space-y-4">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Your QR Code</h3>
                <div class="p-4 bg-white dark:bg-gray-900 rounded-lg border-2 border-gray-200 dark:border-gray-700">
                    <img 
                        src="{{ $qrCodeDataUri }}" 
                        alt="QR Code" 
                        class="max-w-full h-auto"
                        style="max-width: {{ $qrSize }}px;"
                    >
                </div>
                <div class="flex items-center gap-3">
                    <button 
                        wire:click="downloadQrCode"
                        @click="
                            const link = document.createElement('a');
                            link.href = '{{ $qrCodeDataUri }}';
                            link.download = 'qr-code.png';
                            link.click();
                        "
                        class="px-4 py-2 bg-purple-600 dark:bg-purple-500 text-white rounded-lg font-medium hover:bg-purple-700 dark:hover:bg-purple-600 transition-colors flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4" />
                        </svg>
                        Download QR Code
                    </button>
                    <button 
                        @click="
                            navigator.clipboard.writeText('{{ $qrCodeDataUri }}');
                            $dispatch('notify', { message: 'QR Code image copied!' });
                        "
                        class="px-4 py-2 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-lg font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors flex items-center gap-2"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
                        </svg>
                        Copy Image
                    </button>
                </div>
            </div>
        </div>
        @endif
    </div>
</div>

