<div>
    <!-- Flash Messages -->
    @if (session()->has('success'))
    <div x-data="{ show: true }" 
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-init="setTimeout(() => show = false, 5000)"
         class="mb-6 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 rounded-lg">
        <div class="flex items-center justify-between">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="text-green-700 dark:text-green-300 hover:text-green-900 dark:hover:text-green-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    @if (session()->has('info'))
    <div x-data="{ show: true }" 
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-init="setTimeout(() => show = false, 5000)"
         class="mb-6 p-4 bg-blue-100 dark:bg-blue-900 border border-blue-400 dark:border-blue-700 text-blue-700 dark:text-blue-300 rounded-lg">
        <div class="flex items-center justify-between">
            <span>{{ session('info') }}</span>
            <button @click="show = false" class="text-blue-700 dark:text-blue-300 hover:text-blue-900 dark:hover:text-blue-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Header -->
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
            Profile <span class="gradient-text">Settings</span>
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Manage your account settings and preferences.
        </p>
    </div>

    <div class="space-y-6">
        <!-- Profile Information Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Profile Information</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update your account's profile information</p>
                </div>
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white text-2xl font-bold shadow-lg">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
            </div>

            <form wire:submit.prevent="updateName" class="space-y-4">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Full Name
                    </label>
                    <input 
                        type="text" 
                        id="name"
                        wire:model="name"
                        class="w-full px-4 py-3 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                        placeholder="Enter your full name"
                        required
                    >
                    @error('name') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <div class="flex justify-end pt-4">
                    <button 
                        type="submit"
                        class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white font-medium rounded-lg transition-colors"
                    >
                        Save Changes
                    </button>
                </div>
            </form>
        </div>

        <!-- Email Settings Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Email Address</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update your email address</p>
                </div>
            </div>

            @if(!$showEmailForm)
                <div class="flex flex-col sm:flex-row items-center gap-3">
                    <div class="flex flex-1 items-center gap-3 w-full sm:w-auto">
                        <input 
                            type="email" 
                            value="{{ $email }}"
                            disabled
                            class="flex-1 px-4 py-3 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-400 cursor-not-allowed"
                        >
                        @if($emailVerified)
                            <span class="inline-flex items-center gap-2 px-3 py-2 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded-lg text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                                Verified
                            </span>
                        @else
                            <span class="inline-flex items-center gap-2 px-3 py-2 bg-yellow-100 dark:bg-yellow-900 text-yellow-700 dark:text-yellow-300 rounded-lg text-sm font-medium">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                                </svg>
                                Unverified
                            </span>
                        @endif
                    </div>
                    <button 
                        type="button"
                        wire:click="toggleEmailForm"
                        class="px-4 py-2 text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 border border-purple-600 dark:border-purple-400 rounded-lg hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-colors whitespace-nowrap w-full sm:w-auto"
                    >
                        Change Email
                    </button>
                </div>
                @if(!$emailVerified)
                    <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                        Your email address is not verified. 
                        <button type="button" wire:click="sendWelcomeEmail" class="text-purple-600 dark:text-purple-400 hover:underline font-medium">
                            Send verification email
                        </button>
                    </p>
                @endif
            @else
                <form wire:submit.prevent="updateEmail" class="space-y-4">
                    <div class="mt-4">
                        <label for="newEmail" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            New Email Address
                        </label>
                        <input 
                            type="email" 
                            id="newEmail"
                            wire:model="newEmail"
                            class="w-full px-4 py-3 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="Enter your new email address"
                            required
                        >
                        @error('newEmail') 
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                        @enderror
                    </div>
                    <div class="mt-4">
                        <label for="emailPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Confirm Password
                        </label>
                        <div class="relative" x-data="{ show: false }">
                            <input 
                                type="password" 
                                id="emailPassword"
                                wire:model="emailPassword"
                                x-bind:type="show ? 'text' : 'password'"
                                class="w-full px-4 py-3 pr-12 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                                placeholder="Enter your password"
                                required
                            >
                            <button 
                                type="button"
                                @click="show = !show"
                                class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                            >
                                <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                </svg>
                            </button>
                        </div>
                        @error('emailPassword') 
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                        @enderror
                    </div>
                    <div class="flex justify-end gap-3 mt-4">
                        <button 
                            type="button"
                            wire:click="toggleEmailForm"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors"
                        >
                            Cancel
                        </button>
                        <button 
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 rounded-lg transition-colors"
                        >
                            Update Email
                        </button>
                    </div>
                </form>
            @endif
        </div>

        <!-- Change Password Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6">
            <div class="flex items-center justify-between mb-6">
                <div>
                    <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100">Change Password</h2>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Update your password to keep your account secure</p>
                </div>
                <button 
                    type="button"
                    wire:click="togglePasswordForm"
                    class="px-4 py-2 text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 border border-purple-600 dark:border-purple-400 rounded-lg hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-colors"
                >
                    {{ $showPasswordForm ? 'Cancel' : 'Change Password' }}
                </button>
            </div>

            @if($showPasswordForm)
            <form wire:submit.prevent="updatePassword" class="space-y-4">
                <div>
                    <label for="currentPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Current Password
                    </label>
                    <div class="relative" x-data="{ show: false }">
                        <input 
                            type="password" 
                            id="currentPassword"
                            wire:model.debounce.2500ms="currentPassword"
                            wire:blur="validateCurrentPassword"
                            x-bind:type="show ? 'text' : 'password'"
                            class="w-full px-4 py-3 pr-12 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 {{ $currentPasswordValid === false ? 'border-red-500 dark:border-red-500' : ($currentPasswordValid === true ? 'border-green-500 dark:border-green-500' : '') }}"
                            placeholder="Enter your current password"
                            required
                        >
                        <button 
                            type="button"
                            @click="show = !show"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        >
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    @if($currentPasswordValid === true)
                        <p class="mt-2 text-sm text-green-600 dark:text-green-400 flex items-center gap-1">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                            Password is correct
                        </p>
                    @endif
                    @error('currentPassword') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <div>
                    <label for="newPassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        New Password
                    </label>
                    <div class="relative" x-data="{ show: false }">
                        <input 
                            type="password" 
                            id="newPassword"
                            wire:model="newPassword"
                            x-bind:type="show ? 'text' : 'password'"
                            class="w-full px-4 py-3 pr-12 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="Enter your new password"
                            required
                        >
                        <button 
                            type="button"
                            @click="show = !show"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        >
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                    @error('newPassword') 
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                    @enderror
                </div>

                <div>
                    <label for="newPassword_confirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Confirm New Password
                    </label>
                    <div class="relative" x-data="{ show: false }">
                        <input 
                            type="password" 
                            id="newPassword_confirmation"
                            wire:model="newPassword_confirmation"
                            x-bind:type="show ? 'text' : 'password'"
                            class="w-full px-4 py-3 pr-12 border-2 border-gray-300 outline-none dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                            placeholder="Confirm your new password"
                            required
                        >
                        <button 
                            type="button"
                            @click="show = !show"
                            class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                        >
                            <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                            <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="flex justify-end pt-4">
                    <button 
                        type="submit"
                        class="px-6 py-2.5 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white font-medium rounded-lg transition-colors"
                    >
                        Update Password
                    </button>
                </div>
            </form>
            @endif
        </div>

        <!-- Delete Account Card -->
        <div class="bg-white dark:bg-gray-800 rounded-lg border border-red-200 dark:border-red-800 p-6">
            <div class="mb-6">
                <h2 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">Delete Account</h2>
                <p class="text-sm text-gray-600 dark:text-gray-400">
                    Once you delete your account, there is no going back. Please be certain.
                </p>
            </div>

            <button 
                type="button"
                wire:click="openDeleteModal"
                class="px-6 py-2.5 bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white font-medium rounded-lg transition-colors"
            >
                Delete Account
            </button>
        </div>
    </div>

    <!-- Delete Account Modal -->
    @if($showDeleteModal)
    <div x-data="{ show: true }" 
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         @keydown.escape.window="show = false; $wire.closeDeleteModal()"
    >
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 bg-opacity-75 dark:bg-gray-900 dark:bg-opacity-75" 
                 @click="show = false; $wire.closeDeleteModal()"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full border border-gray-200 dark:border-gray-700">
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Delete Account</h3>
                </div>

                <form wire:submit.prevent="deleteAccount" class="px-6 py-4">
                    <div class="mb-4">
                        <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                            Are you sure you want to delete your account? This action cannot be undone. All your data will be permanently deleted.
                        </p>

                        <div class="mb-4">
                            <label for="deletePassword" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Enter your password to confirm
                            </label>
                            <div class="relative" x-data="{ show: false }">
                                <input 
                                    type="password" 
                                    id="deletePassword"
                                    wire:model="deletePassword"
                                    x-bind:type="show ? 'text' : 'password'"
                                    class="w-full px-4 py-3 pr-12 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-red-500 dark:focus:border-red-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                                    placeholder="Enter your password"
                                    required
                                >
                                <button 
                                    type="button"
                                    @click="show = !show"
                                    class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300"
                                >
                                    <svg x-show="!show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                    </svg>
                                    <svg x-show="show" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" style="display: none;">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.88 9.88l-3.29-3.29m7.532 7.532l3.29 3.29M3 3l3.59 3.59m0 0A9.953 9.953 0 0112 5c4.478 0 8.268 2.943 9.543 7a10.025 10.025 0 01-4.132 5.411m0 0L21 21" />
                                    </svg>
                                </button>
                            </div>
                            @error('deletePassword') 
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                            @enderror
                        </div>

                        <div>
                            <label for="deleteConfirmation" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                Type <span class="font-mono text-red-600 dark:text-red-400">DELETE</span> to confirm
                            </label>
                            <input 
                                type="text" 
                                id="deleteConfirmation"
                                wire:model="deleteConfirmation"
                                class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-red-500 dark:focus:ring-red-400 focus:border-red-500 dark:focus:border-red-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500 font-mono"
                                placeholder="DELETE"
                                required
                            >
                            @error('deleteConfirmation') 
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                            @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-4 border-t border-gray-200 dark:border-gray-700">
                        <button 
                            type="button"
                            wire:click="closeDeleteModal"
                            @click="show = false"
                            class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg transition-colors"
                        >
                            Cancel
                        </button>
                        <button 
                            type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 rounded-lg transition-colors"
                        >
                            Delete Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

