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
         x-init="setTimeout(() => show = false, 3000)"
         class="mb-4 p-4 bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-700 text-green-700 dark:text-green-300 rounded-lg">
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

    @if (session()->has('error'))
    <div x-data="{ show: true }" 
         x-show="show"
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 transform translate-y-2"
         x-transition:enter-end="opacity-100 transform translate-y-0"
         x-transition:leave="transition ease-in duration-200"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         x-init="setTimeout(() => show = false, 3000)"
         class="mb-4 p-4 bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-700 text-red-700 dark:text-red-300 rounded-lg">
        <div class="flex items-center justify-between">
            <span>{{ session('error') }}</span>
            <button @click="show = false" class="text-red-700 dark:text-red-300 hover:text-red-900 dark:hover:text-red-100">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
    </div>
    @endif

    <!-- Greeting Section -->
    <div class="mb-6">
        <h1 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-gray-100 mb-2">
            Welcome, <span class="gradient-text">{{ auth()->user()->name ?? 'User' }}</span>! 👋
        </h1>
        <p class="text-gray-600 dark:text-gray-400">
            Manage all your shortened links in one place.
        </p>
    </div>

    <!-- Stats Cards (Optional) -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Links</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">{{ $urls->total() }}</p>
                </div>
                <div class="w-12 h-12 rounded-full bg-purple-100 dark:bg-purple-900 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Total Clicks</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ number_format($urls->sum('click_count')) }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-pink-100 dark:bg-pink-900 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-pink-600 dark:text-pink-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 15l-2 5L9 9l11 4-5 2zm0 0l5 5M7.188 2.239l.777 2.897M5.136 7.965l-2.898-.777M13.95 4.05l-2.122 2.122m-5.657 5.656l-2.12 2.122" />
                    </svg>
                </div>
            </div>
        </div>
        <div class="bg-white dark:bg-gray-800 rounded-lg p-4 border border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 dark:text-gray-400">Links This Month</p>
                    <p class="text-2xl font-bold text-gray-900 dark:text-gray-100">
                        {{ $urls->where('created_at', '>=', now()->startOfMonth())->count() }}
                    </p>
                </div>
                <div class="w-12 h-12 rounded-full bg-blue-100 dark:bg-blue-900 flex items-center justify-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-blue-600 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Shorten URL Section -->
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 p-6 mb-6">
        <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Shorten New Link</h2>
        <form wire:submit.prevent="shortenUrl" class="space-y-4">
            <div>
                <label for="originalUrl" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                    Enter URL to shorten
                </label>
                <div class="flex gap-3">
                    <input 
                        type="url" 
                        id="originalUrl"
                        wire:model="originalUrl"
                        class="flex-1 px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                        placeholder="https://example.com"
                        required
                    >
                    <button 
                        type="submit"
                        wire:loading.attr="disabled"
                        class="px-6 py-3 bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white font-medium rounded-lg transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
                    >
                        <span wire:loading.remove>Shorten</span>
                        <span wire:loading class="flex items-center gap-2">
                            <svg class="animate-spin h-4 w-4" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Processing...
                        </span>
                    </button>
                </div>
                @error('originalUrl') 
                    <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                @enderror
            </div>
            @if($shortenedUrl)
                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                    <p class="text-sm font-medium text-green-800 dark:text-green-300 mb-2">Shortened URL:</p>
                    <div class="flex items-center gap-2">
                        <a 
                            href="{{ url('/' . $shortenedUrl) }}" 
                            target="_blank"
                            class="text-sm font-medium text-green-700 dark:text-green-400 hover:underline break-all"
                        >
                            {{ url('/' . $shortenedUrl) }}
                        </a>
                        <button 
                            type="button"
                            x-data="{ copied: false }"
                            @click="
                                navigator.clipboard.writeText('{{ url('/' . $shortenedUrl) }}');
                                copied = true;
                                setTimeout(() => copied = false, 2000);
                            "
                            class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                            :class="copied ? 'bg-green-200 dark:bg-green-800 text-green-800 dark:text-green-200' : 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 hover:bg-green-200 dark:hover:bg-green-800'"
                        >
                            <span x-show="!copied">Copy</span>
                            <span x-show="copied">Copied!</span>
                        </button>
                    </div>
                </div>
            @endif
        </form>
    </div>

    <!-- URLs List Section -->
    <div class="bg-white dark:bg-gray-800 rounded-lg border border-gray-200 dark:border-gray-700 overflow-hidden"
         x-data="{ isMobile: window.innerWidth < 768 }"
         x-init="window.addEventListener('resize', () => isMobile = window.innerWidth < 768)">
        
        <!-- Header -->
        <div class="px-4 md:px-6 py-4 border-b border-gray-200 dark:border-gray-700">
            <div class="flex items-center justify-between">
                <h2 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Shortened Links</h2>
                <span class="text-sm text-gray-600 dark:text-gray-400">
                    {{ $urls->total() }} {{ $urls->total() === 1 ? 'link' : 'links' }}
                </span>
            </div>
        </div>

        @if($urls->count() > 0)
            <!-- Desktop Table View -->
            <div x-show="!isMobile" class="overflow-x-auto">
                <table class="w-full">
                    <thead class="bg-gray-50 dark:bg-gray-900">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Original URL</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Short URL</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Clicks</th>
                            <th class="px-6 py-3 text-left text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Created</th>
                            <th class="px-6 py-3 text-center text-xs font-semibold text-gray-700 dark:text-gray-300 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @foreach($urls as $url)
                        <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" x-data="{ copied{{ $loop->index }}: false }">
                            <td class="px-6 py-4">
                                <div class="max-w-xs">
                                    <a href="{{ $url->original_url }}" 
                                       target="_blank" 
                                       class="text-sm text-gray-900 dark:text-gray-100 hover:text-purple-600 dark:hover:text-purple-400 truncate block"
                                       title="{{ $url->original_url }}">
                                        {{ \Illuminate\Support\Str::limit($url->original_url, 40) }}
                                    </a>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ secure_url($url->shortened_url) }}" 
                                   target="_blank"
                                   class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300">
                                    {{ secure_url($url->shortened_url) }}
                                </a>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ number_format($url->click_count ?? 0) }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="text-sm text-gray-600 dark:text-gray-400">
                                    {{ $url->created_at->format('M d, Y') }}
                                </span>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button 
                                        @click="
                                            navigator.clipboard.writeText(window.location.origin + '/{{ $url->shortened_url }}');
                                            copied{{ $loop->index }} = true;
                                            setTimeout(() => copied{{ $loop->index }} = false, 2000);
                                        "
                                        class="px-3 py-1.5 text-xs font-medium rounded-lg transition-colors"
                                        :class="copied{{ $loop->index }} ? 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300' : 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 hover:bg-purple-200 dark:hover:bg-purple-800'"
                                        title="Copy short URL"
                                    >
                                        <span x-show="!copied{{ $loop->index }}">Copy</span>
                                        <span x-show="copied{{ $loop->index }}">Copied!</span>
                                    </button>
                                    <button 
                                        wire:click="openEditModal('{{ $url->id }}')"
                                        @click="$dispatch('open-edit-modal')"
                                        class="p-1.5 text-xs font-medium rounded-lg transition-colors bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800"
                                        title="Edit URL"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </button>
                                    <button 
                                        wire:click="openDeleteModal('{{ $url->id }}')"
                                        @click="$dispatch('open-delete-modal')"
                                        class="p-1.5 text-xs font-medium rounded-lg transition-colors bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 hover:bg-red-200 dark:hover:bg-red-800"
                                        title="Delete URL"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <!-- Mobile Card List View -->
            <div x-show="isMobile" class="divide-y divide-gray-200 dark:divide-gray-700">
                @foreach($urls as $url)
                <div class="p-4 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors" x-data="{ copied{{ $loop->index }}: false }">
                    <div class="space-y-3">
                        <!-- Original URL -->
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Original URL</p>
                            <a href="{{ $url->original_url }}" 
                               target="_blank" 
                               class="text-sm text-gray-900 dark:text-gray-100 hover:text-purple-600 dark:hover:text-purple-400 break-words block"
                               title="{{ $url->original_url }}">
                                {{ \Illuminate\Support\Str::limit($url->original_url, 50) }}
                            </a>
                        </div>

                        <!-- Short URL -->
                        <div>
                            <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Short URL</p>
                            <a href="{{ url('/' . $url->shortened_url) }}" 
                               target="_blank"
                               class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:text-purple-700 dark:hover:text-purple-300 break-all block">
                                {{ url('/' . $url->shortened_url) }}
                            </a>
                        </div>

                        <!-- Clicks, Date & Actions Row -->
                        <div class="flex items-center justify-between pt-2 border-t border-gray-100 dark:border-gray-700">
                            <div class="flex items-center gap-4">
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Clicks</p>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                        {{ number_format($url->click_count ?? 0) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider mb-1">Date</p>
                                    <span class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                        {{ $url->created_at->format('M d') }}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2">
                                <button 
                                    @click="
                                        navigator.clipboard.writeText('{{ url('/' . $url->shortened_url) }}');
                                        copied{{ $loop->index }} = true;
                                        setTimeout(() => copied{{ $loop->index }} = false, 2000);
                                    "
                                    class="px-3 py-2 text-sm font-medium rounded-lg transition-colors flex items-center gap-2"
                                    :class="copied{{ $loop->index }} ? 'bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300' : 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300 hover:bg-purple-200 dark:hover:bg-purple-800'"
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
                                <button 
                                    wire:click="openEditModal('{{ $url->id }}')"
                                    @click="$dispatch('open-edit-modal')"
                                    class="p-2 text-sm font-medium rounded-lg transition-colors bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 hover:bg-blue-200 dark:hover:bg-blue-800"
                                    title="Edit"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                    </svg>
                                </button>
                                <button 
                                    wire:click="openDeleteModal('{{ $url->id }}')"
                                    @click="$dispatch('open-delete-modal')"
                                    class="p-2 text-sm font-medium rounded-lg transition-colors bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 hover:bg-red-200 dark:hover:bg-red-800"
                                    title="Delete"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Pagination -->
            <div class="px-4 md:px-6 py-4 border-t border-gray-200 dark:border-gray-700">
                {{ $urls->links() }}
            </div>
        @else
            <!-- Empty State -->
            <div class="px-4 md:px-6 py-12 text-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 mx-auto text-gray-400 dark:text-gray-500 mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
                <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">Belum ada link yang di-shorten</h3>
                <p class="text-gray-600 dark:text-gray-400 mb-4">
                    Mulai shorten link pertama Anda di halaman utama.
                </p>
                <a href="{{ route('home') }}" wire:navigate.hover class="inline-block px-6 py-2 bg-purple-600 dark:bg-purple-500 text-white rounded-lg font-medium hover:bg-purple-700 dark:hover:bg-purple-600 transition-colors">
                    Shorten Link Sekarang
                </a>
            </div>
        @endif
    </div>

    <!-- Edit Modal -->
    <div x-data="{ show: false }" 
         x-show="show"
         @open-edit-modal.window="show = true"
         @close-edit-modal.window="show = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;"
         x-cloak
         wire:ignore.self>
        <div class="flex items-end sm:items-center justify-center min-h-screen px-4 pt-4 pb-4 sm:pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 dark:bg-gray-900 bg-opacity-75 dark:bg-opacity-75" 
                 @click="show = false; $dispatch('close-edit-modal')"></div>

            <!-- Modal panel -->
            <div class="inline-block w-full align-bottom bg-white dark:bg-gray-800 rounded-t-xl sm:rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <!-- Header -->
                <div class="px-4 sm:px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg sm:text-xl font-semibold text-gray-900 dark:text-gray-100">Edit URL</h3>
                        <button @click="show = false; $dispatch('close-edit-modal')" class="p-2 -mr-2 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <form wire:submit.prevent="updateUrl" @submit="show = false">
                    <div class="px-4 sm:px-6 py-4 sm:py-6 space-y-5">
                        <!-- Original URL -->
                        <div>
                            <label for="editOriginalUrl" class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300 mb-2.5">
                                Original URL
                            </label>
                            <input 
                                type="url" 
                                id="editOriginalUrl"
                                wire:model="editOriginalUrl"
                                class="w-full px-4 py-3 sm:py-2.5 text-base sm:text-sm border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                                placeholder="https://example.com"
                                required
                            >
                            @error('editOriginalUrl') 
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                            @enderror
                        </div>

                        <!-- Shortened URL -->
                        <div>
                            <label for="editShortenedUrl" class="block text-sm sm:text-base font-medium text-gray-700 dark:text-gray-300 mb-2.5">
                                Short URL
                            </label>
                            <!-- Mobile: Stack vertical -->
                            <div class="block sm:hidden space-y-2">
                                <div class="px-3 py-2 bg-gray-50 dark:bg-gray-700 rounded-lg border border-gray-200 dark:border-gray-600">
                                    <span class="text-xs text-gray-500 dark:text-gray-400">Base URL:</span>
                                    <p class="text-sm text-gray-700 dark:text-gray-300 break-all">{{ url('/') }}/</p>
                                </div>
                                <input 
                                    type="text" 
                                    id="editShortenedUrl"
                                    wire:model="editShortenedUrl"
                                    class="w-full px-4 py-3 text-base border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                                    placeholder="abc123"
                                    pattern="[a-zA-Z0-9_-]+"
                                    minlength="3"
                                    maxlength="20"
                                    required
                                >
                            </div>
                            <!-- Desktop: Horizontal layout -->
                            <div class="hidden sm:flex items-center gap-2">
                                <span class="text-sm text-gray-500 dark:text-gray-400 whitespace-nowrap">{{ url('/') }}/</span>
                                <input 
                                    type="text" 
                                    id="editShortenedUrlDesktop"
                                    wire:model="editShortenedUrl"
                                    class="flex-1 px-4 py-2.5 text-sm border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 dark:focus:ring-purple-400 focus:border-purple-500 dark:focus:border-purple-400 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 placeholder-gray-400 dark:placeholder-gray-500"
                                    placeholder="abc123"
                                    pattern="[a-zA-Z0-9_-]+"
                                    minlength="3"
                                    maxlength="20"
                                    required
                                >
                            </div>
                            @error('editShortenedUrl') 
                                <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p> 
                            @enderror
                            <p class="mt-2 text-xs sm:text-xs text-gray-500 dark:text-gray-400">Hanya huruf, angka, tanda hubung, dan garis bawah yang diizinkan (3-20 karakter)</p>
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="px-4 sm:px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex flex-col-reverse sm:flex-row items-stretch sm:items-center justify-end gap-3">
                        <button 
                            type="button"
                            @click="show = false; $dispatch('close-edit-modal')"
                            class="w-full sm:w-auto px-4 py-3 sm:py-2 text-base sm:text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                        >
                            Batal
                        </button>
                        <button 
                            type="submit"
                            class="w-full sm:w-auto px-4 py-3 sm:py-2 text-base sm:text-sm font-medium text-white bg-purple-600 dark:bg-purple-500 rounded-lg hover:bg-purple-700 dark:hover:bg-purple-600 transition-colors"
                        >
                            Update URL
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <div x-data="{ show: false }" 
         x-show="show"
         @open-delete-modal.window="show = true"
         @close-delete-modal.window="show = false"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0"
         class="fixed inset-0 z-50 overflow-y-auto"
         style="display: none;"
         x-cloak
         wire:ignore.self>
        <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
            <!-- Background overlay -->
            <div class="fixed inset-0 transition-opacity bg-gray-500 dark:bg-gray-900 bg-opacity-75 dark:bg-opacity-75" 
                 @click="show = false; $dispatch('close-delete-modal')"></div>

            <!-- Modal panel -->
            <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full"
                 x-transition:enter="ease-out duration-300"
                 x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                 x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave="ease-in duration-200"
                 x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                 x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95">
                <!-- Header -->
                <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                    <div class="flex items-center gap-3">
                        <div class="flex-shrink-0 w-10 h-10 rounded-full bg-red-100 dark:bg-red-900 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">Delete URL</h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">This action cannot be undone.</p>
                        </div>
                        <button @click="show = false; $dispatch('close-delete-modal')" class="text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Body -->
                <div class="px-6 py-4">
                    <p class="text-sm text-gray-700 dark:text-gray-300">
                        Are you sure you want to delete this URL?
                    </p>
                    <div class="mt-3 p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <p class="text-xs font-medium text-gray-500 dark:text-gray-400 mb-1">Original URL:</p>
                        <p class="text-sm text-gray-900 dark:text-gray-100 break-all">{{ $deletingUrlOriginal }}</p>
                    </div>
                </div>

                <!-- Footer -->
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 flex items-center justify-end gap-3">
                    <button 
                        type="button"
                        @click="show = false; $dispatch('close-delete-modal')"
                        class="px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors"
                    >
                        Cancel
                    </button>
                    <button 
                        wire:click="deleteUrl"
                        @click="show = false"
                        class="px-4 py-2 text-sm font-medium text-white bg-red-600 dark:bg-red-500 rounded-lg hover:bg-red-700 dark:hover:bg-red-600 transition-colors"
                    >
                        Delete URL
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
