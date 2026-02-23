<div x-data="{ autoHideSuccess: false }" 
     x-init="
        $watch('$wire.showSuccessNotice', value => {
            if (value) {
                autoHideSuccess = true;
                setTimeout(() => {
                    $wire.closeNotice();
                    autoHideSuccess = false;
                }, 5000);
            }
        });
     ">
    <!-- Feedback Intro Section -->
    <section class="mt-16 pt-16 pb-16 bg-gray-800">
        <div class="container mx-auto px-6">
            <h1 class="text-3xl font-bold text-center mb-12 text-gray-200">
                We Value Your <span class="gradient-text">Feedback</span>
            </h2>
            <p class="text-center text-gray-300 max-w-2xl mx-auto">
                Your thoughts, ideas, and suggestions help shape the future of Lovilink. Whether it's a bug, a feature request, or just a kind word — we want to hear it.
            </p>
            
            <!-- Success Notice -->
            <div x-show="$wire.showSuccessNotice" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="mt-8 max-w-2xl mx-auto bg-green-50 border-l-4 border-green-500 p-4 rounded-lg shadow-md"
                 wire:ignore>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-green-800">
                            Thank you! Your feedback has been submitted successfully.
                        </p>
                        <p class="mt-1 text-sm text-green-700">
                            We appreciate your input and will review it soon.
                        </p>
                    </div>
                    <div class="ml-auto pl-3">
                        <button 
                            @click="$wire.closeNotice()"
                            class="inline-flex text-green-500 hover:text-green-700 focus:outline-none"
                        >
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Error Notice -->
            <div x-show="$wire.showErrorNotice" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform translate-y-2"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="mt-8 max-w-2xl mx-auto bg-red-50 border-l-4 border-red-500 p-4 rounded-lg shadow-md"
                 wire:ignore>
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3 flex-1">
                        <p class="text-sm font-medium text-red-800">
                            Error submitting feedback
                        </p>
                        <p class="mt-1 text-sm text-red-700" x-text="$wire.errorMessage || 'Please check your input and try again.'"></p>
                    </div>
                    <div class="ml-auto pl-3">
                        <button 
                            @click="$wire.closeNotice()"
                            class="inline-flex text-red-500 hover:text-red-700 focus:outline-none"
                        >
                            <svg class="h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-8 max-w-2xl mx-auto bg-white p-8 rounded-lg shadow-md">
                <form wire:submit.prevent="submitFeedback" class="space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Your Name <span class="text-red-500">*</span></label>
                        <input 
                            type="text" 
                            id="name" 
                            wire:model="name"
                            placeholder="Enter your name here..." 
                            required 
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('name') border-red-500 @enderror"
                        >
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email Address <span class="text-red-500">*</span></label>
                        <input 
                            type="email" 
                            id="email" 
                            wire:model="email"
                            placeholder="Enter your email address here..." 
                            required 
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('email') border-red-500 @enderror"
                        >
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="category" class="block text-sm font-medium text-gray-700">Feedback Type <span class="text-red-500">*</span></label>
                        <select 
                            id="category" 
                            wire:model="category"
                            required 
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('category') border-red-500 @enderror"
                        >
                            <option value="">Select an option</option>
                            <option value="bug">Bug Report</option>
                            <option value="feature">Feature Request</option>
                            <option value="design">Design Suggestion</option>
                            <option value="support">Appreciation / Support</option>
                        </select>
                        @error('category')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="message" class="block text-sm font-medium text-gray-700">Your Message <span class="text-red-500">*</span></label>
                        <textarea 
                            id="message" 
                            wire:model="message"
                            rows="5" 
                            placeholder="Enter your message here..." 
                            required
                            class="mt-1 w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all @error('message') border-red-500 @enderror"
                        ></textarea>
                        @error('message')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <button 
                            type="submit" 
                            wire:loading.attr="disabled"
                            class="w-full btn-highlight text-white font-semibold py-3 px-6 rounded-lg transition-all duration-300 hover:shadow-lg transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span wire:loading.remove wire:target="submitFeedback">Submit Feedback</span>
                            <span wire:loading wire:target="submitFeedback" class="flex items-center justify-center gap-2">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Submitting...
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    
    <!-- Call to Action -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-6 text-gray-800">
                Thank You for Supporting Lovilink
            </h2>
            <p class="text-center text-gray-700 max-w-xl mx-auto mb-8">
                Every message we receive helps shape Lovilink into a better tool for everyone. This platform was built for you — and with your voice, we’ll keep improving it together.
            </p>
            <div class="text-center">
                <a href="/" class="inline-block btn-highlight text-white font-semibold py-3 px-6 rounded-lg transition">
                    Back to Home
                </a>
            </div>
        </div>
    </section>

</div>
