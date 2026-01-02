<div>
    <!-- Back Button -->
    <div class="container mx-auto px-6 pt-6">
        <a href="{{ route('home') }}" 
           wire:navigate
           class="inline-flex items-center gap-2 text-gray-700 hover:text-purple-600 transition-colors group">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 transform group-hover:-translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            <span class="font-medium">Back to Home</span>
        </a>
    </div>

    <!-- Register Section -->
    <section class="min-h-screen gradient-background py-12 md:py-24">
        <div class="container mx-auto px-6">
            <div class="max-w-md mx-auto">
                <!-- Logo & Title -->
                <div class="text-center mb-8">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Create Your Account</h2>
                    <p class="text-gray-600">Join thousands of users shortening links with Lovilink</p>
                </div>

                <!-- Register Form Card -->
                <div class="bg-white rounded-2xl shadow-xl p-8 md:p-10" x-data="{ showPassword: false, showConfirmPassword: false }">
                    <form wire:submit.prevent="register" class="space-y-5">
                        <!-- Name Field -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name
                            </label>
                            <input 
                                type="text" 
                                id="name"
                                wire:model="name"
                                class="w-full px-4 py-3 border outline-none border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="John Doe"
                                required
                            >
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email Field -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input 
                                type="email" 
                                id="email"
                                wire:model="email"
                                class="w-full px-4 py-3 border outline-none border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all"
                                placeholder="you@example.com"
                                required
                            >
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Password Field -->
                        <div>
                            <label for="password" class="block text-sm font-medium text-gray-700 mb-2">
                                Password
                            </label>
                            <div class="relative">
                                <input 
                                    :type="showPassword ? 'text' : 'password'"
                                    id="password"
                                    wire:model="password"
                                    class="w-full px-4 py-3 border border-gray-300 outline-none rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all pr-12"
                                    placeholder="Create a strong password"
                                    required
                                >
                                <button 
                                    type="button"
                                    @click="showPassword = !showPassword"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                                >
                                    <svg x-show="!showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="showPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.29 3.29m0 0A9.97 9.97 0 015 12c0 1.777.568 3.424 1.532 4.768M6.29 6.29L12 12m-5.71-5.71L3 3m9 9l5.71 5.71M12 12l3.29 3.29M12 12l-3.29-3.29m6.58 6.58L21 21" />
                                    </svg>
                                </button>
                            </div>
                            @error('password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Confirm Password Field -->
                        <div>
                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Confirm Password
                            </label>
                            <div class="relative">
                                <input 
                                    :type="showConfirmPassword ? 'text' : 'password'"
                                    id="password_confirmation"
                                    wire:model="password_confirmation"
                                    class="w-full px-4 py-3 border border-gray-300 outline-none rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-all pr-12"
                                    placeholder="Confirm your password"
                                    required
                                >
                                <button 
                                    type="button"
                                    @click="showConfirmPassword = !showConfirmPassword"
                                    class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500 hover:text-gray-700"
                                >
                                    <svg x-show="!showConfirmPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="showConfirmPassword" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.29 3.29m0 0A9.97 9.97 0 015 12c0 1.777.568 3.424 1.532 4.768M6.29 6.29L12 12m-5.71-5.71L3 3m9 9l5.71 5.71M12 12l3.29 3.29M12 12l-3.29-3.29m6.58 6.58L21 21" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Terms & Conditions -->
                        <div class="flex items-start">
                            <input 
                                type="checkbox" 
                                id="terms"
                                wire:model="terms"
                                class="h-4 w-4 text-purple-600 focus:ring-purple-500 border-gray-300 rounded mt-1"
                                required
                            >
                            <label for="terms" class="ml-2 block text-sm text-gray-700">
                                I agree to the 
                                <a href="{{ route('info-terms') }}" wire:navigate class="text-purple-600 hover:text-purple-700 font-medium">Terms of Service</a>
                                and 
                                <a href="{{ route('info-privacy') }}" wire:navigate class="text-purple-600 hover:text-purple-700 font-medium">Privacy Policy</a>
                            </label>
                        </div>
                        @error('terms')
                            <p class="text-sm text-red-600">{{ $message }}</p>
                        @enderror

                        <!-- Submit Button -->
                        <button 
                            type="submit"
                            wire:loading.attr="disabled"
                            class="w-full btn-highlight px-6 py-3 rounded-lg text-white font-medium transition-all duration-300 hover:shadow-lg transform hover:scale-[1.02] disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span wire:loading.remove wire:target="register">Create Account</span>
                            <span wire:loading wire:target="register" class="flex items-center justify-center gap-2">
                                <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                Creating account...
                            </span>
                        </button>
                    </form>

                    <!-- Divider -->
                    <div class="relative my-6">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white text-gray-500">Or continue with</span>
                        </div>
                    </div>

                    <!-- Social Login Buttons -->
                    <div class="space-y-3">
                        <button 
                            type="button"
                            class="w-full flex items-center justify-center gap-3 px-6 py-3 border-2 border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition-colors"
                        >
                            <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M23.06 12.25C23.06 11.47 22.99 10.72 22.86 10H12.5V14.26H18.42C18.16 15.63 17.38 16.79 16.21 17.57V20.34H19.78C21.86 18.42 23.06 15.6 23.06 12.25Z" fill="#4285F4"/>
                                <path d="M12.4997 23C15.4697 23 17.9597 22.02 19.7797 20.34L16.2097 17.57C15.2297 18.23 13.9797 18.63 12.4997 18.63C9.63969 18.63 7.20969 16.7 6.33969 14.1H2.67969V16.94C4.48969 20.53 8.19969 23 12.4997 23Z" fill="#34A853"/>
                                <path d="M6.34 14.0899C6.12 13.4299 5.99 12.7299 5.99 11.9999C5.99 11.2699 6.12 10.5699 6.34 9.90995V7.06995H2.68C1.93 8.54995 1.5 10.2199 1.5 11.9999C1.5 13.7799 1.93 15.4499 2.68 16.9299L5.53 14.7099L6.34 14.0899Z" fill="#FBBC05"/>
                                <path d="M12.4997 5.38C14.1197 5.38 15.5597 5.94 16.7097 7.02L19.8597 3.87C17.9497 2.09 15.4697 1 12.4997 1C8.19969 1 4.48969 3.47 2.67969 7.07L6.33969 9.91C7.20969 7.31 9.63969 5.38 12.4997 5.38Z" fill="#EA4335"/>
                            </svg>
                            Continue with Google
                        </button>

                        <button 
                            type="button"
                            class="w-full flex items-center justify-center gap-3 px-6 py-3 border-2 border-gray-300 rounded-lg font-medium text-gray-700 hover:bg-gray-50 transition-colors"
                        >
                            <svg width="20" height="20" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12.4642 0C5.84833 0 0.5 5.5 0.5 12.3043C0.5 17.7433 3.92686 22.3473 8.68082 23.9768C9.27518 24.0993 9.4929 23.712 9.4929 23.3863C9.4929 23.101 9.47331 22.1233 9.47331 21.1045C6.14514 21.838 5.45208 19.6378 5.45208 19.6378C4.91723 18.2118 4.12474 17.8453 4.12474 17.8453C3.03543 17.0915 4.20408 17.0915 4.20408 17.0915C5.41241 17.173 6.04645 18.3545 6.04645 18.3545C7.11592 20.2285 8.83927 19.699 9.53257 19.373C9.63151 18.5785 9.94865 18.0285 10.2854 17.723C7.63094 17.4378 4.83812 16.3785 4.83812 11.6523C4.83812 10.3078 5.31323 9.20775 6.06604 8.35225C5.94727 8.04675 5.53118 6.7835 6.18506 5.09275C6.18506 5.09275 7.19527 4.76675 9.47306 6.35575C10.4483 6.08642 11.454 5.9494 12.4642 5.94825C13.4745 5.94825 14.5042 6.091 15.4552 6.35575C17.7332 4.76675 18.7434 5.09275 18.7434 5.09275C19.3973 6.7835 18.981 8.04675 18.8622 8.35225C19.6349 9.20775 20.0904 10.3078 20.0904 11.6523C20.0904 16.3785 17.2976 17.4173 14.6233 17.723C15.0592 18.11 15.4353 18.8433 15.4353 20.0045C15.4353 21.6545 15.4158 22.9788 15.4158 23.386C15.4158 23.712 15.6337 24.0993 16.2278 23.977C20.9818 22.347 24.4087 17.7433 24.4087 12.3043C24.4282 5.5 19.0603 0 12.4642 0Z" fill="currentColor"/>
                            </svg>
                            Continue with GitHub
                        </button>
                    </div>

                    <!-- Sign In Link -->
                    <div class="mt-6 text-center">
                        <p class="text-sm text-gray-600">
                            Already have an account? 
                            <a href="{{ route('info-login') }}" wire:navigate class="text-purple-600 hover:text-purple-700 font-medium">
                                Sign in
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
