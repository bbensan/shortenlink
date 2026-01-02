@php
    $menuItems = [
        [
            'label' => 'Dashboard',
            'route' => 'dashboard-home',
            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        ],
        [
            'label' => 'QR Generator',
            'route' => 'dashboard-qr-generator',
            'icon' => 'M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z',
        ],
        [
            'label' => 'Coming Soon',
            'route' => 'dashboard-coming-soon',
            'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z',
        ],
    ];
@endphp

<aside 
    x-data="{ 
        isOpen: localStorage.getItem('sidebarOpen') !== 'false',
        toggle() {
            this.isOpen = !this.isOpen;
            localStorage.setItem('sidebarOpen', this.isOpen);
        }
    }"
    class="hidden md:flex flex-col bg-white dark:bg-gray-800 border-r border-gray-200 dark:border-gray-700 transition-all duration-300 ease-in-out"
    :class="isOpen ? 'w-64' : 'w-20'"
>
    <!-- Logo Section -->
    <div class="p-4 border-b border-gray-200 dark:border-gray-700">
        <a href="{{ route('home') }}" wire:navigate.hover class="flex items-center gap-3 min-w-0">
            <div class="flex-shrink-0 w-10 h-10 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-purple-600 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1" />
                </svg>
            </div>
            <span x-show="isOpen" 
                  x-transition:enter="transition ease-out duration-200" 
                  x-transition:enter-start="opacity-0" 
                  x-transition:enter-end="opacity-100" 
                  x-transition:leave="transition ease-in duration-150" 
                  x-transition:leave-start="opacity-100" 
                  x-transition:leave-end="opacity-0" 
                  class="text-xl font-bold gradient-text whitespace-nowrap overflow-hidden">
                Lovilink
            </span>
        </a>
    </div>

    <!-- Toggle Section -->
    <div class="px-4 py-2 border-b border-gray-200 dark:border-gray-700">
        <button 
            @click="toggle()"
            class="w-full flex items-center justify-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors"
            :title="isOpen ? 'Collapse Sidebar' : 'Expand Sidebar'"
        >
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-5 w-5 text-gray-600 dark:text-gray-400 transition-transform duration-300" 
                 :class="isOpen ? 'rotate-0' : 'rotate-180'"
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 19l-7-7 7-7m8 14l-7-7 7-7" />
            </svg>
            <span x-show="isOpen" 
                  x-transition:enter="transition ease-out duration-200" 
                  x-transition:enter-start="opacity-0 -translate-x-2" 
                  x-transition:enter-end="opacity-100 translate-x-0"
                  x-transition:leave="transition ease-in duration-150" 
                  x-transition:leave-start="opacity-100 translate-x-0" 
                  x-transition:leave-end="opacity-0 -translate-x-2"
                  class="ml-2 text-sm font-medium text-gray-600 dark:text-gray-400 whitespace-nowrap">
                Collapse
            </span>
        </button>
    </div>

    <!-- Navigation Menu -->
    <nav class="flex-1 overflow-y-auto p-4 space-y-1">
        @foreach($menuItems as $item)
        <a 
            href="{{ route($item['route']) }}" 
            wire:navigate.hover
            class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-colors group {{ Request::routeIs($item['route']) ? 'bg-purple-100 dark:bg-purple-900 text-purple-700 dark:text-purple-300' : 'text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700' }}"
            :title="!isOpen ? '{{ $item['label'] }}' : ''"
        >
            <svg xmlns="http://www.w3.org/2000/svg" 
                 class="h-5 w-5 flex-shrink-0 {{ Request::routeIs($item['route']) ? 'text-purple-600 dark:text-purple-400' : 'text-gray-500 dark:text-gray-400 group-hover:text-gray-700 dark:group-hover:text-gray-300' }}" 
                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
            </svg>
            <span x-show="isOpen" 
                  x-transition:enter="transition ease-out duration-200" 
                  x-transition:enter-start="opacity-0 -translate-x-2" 
                  x-transition:enter-end="opacity-100 translate-x-0"
                  x-transition:leave="transition ease-in duration-150" 
                  x-transition:leave-start="opacity-100 translate-x-0" 
                  x-transition:leave-end="opacity-0 -translate-x-2"
                  class="font-medium whitespace-nowrap overflow-hidden">
                {{ $item['label'] }}
            </span>
        </a>
        @endforeach
    </nav>

    <!-- User Section & Theme Switcher -->
    <div class="border-t border-gray-200 dark:border-gray-700 space-y-3">
        <!-- Theme Switcher -->
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-200" 
             x-transition:enter-start="opacity-0" 
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-150" 
             x-transition:leave-start="opacity-100" 
             x-transition:leave-end="opacity-0"
             class="p-4 border-b border-gray-200 dark:border-gray-700">
            @livewire('components.theme-switcher')
        </div>
        
        <!-- User Profile -->
        <div 
            :class="isOpen ? 'p-4 space-y-2 transition-all duration-300 ease-in-out' : 'flex justify-center items-center p-2 transition-all duration-300 ease-in-out'"
        >
            <!-- User Info -->
            <a href="{{ route('dashboard-profile') }}" wire:navigate.hover :class="isOpen ? 'flex items-center gap-3 px-3 py-2.5 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer group {{ Request::routeIs('dashboard-profile') ? 'bg-purple-100 dark:bg-purple-900' : '' }}' : 'flex items-center justify-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors cursor-pointer'">
                <div class="flex-shrink-0 w-10 h-10 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white font-semibold text-sm shadow-md ring-2 ring-purple-200 dark:ring-purple-800">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <div x-show="isOpen" 
                        x-transition:enter="transition ease-out duration-200" 
                        x-transition:enter-start="opacity-0 -translate-x-2" 
                        x-transition:enter-end="opacity-100 translate-x-0"
                        x-transition:leave="transition ease-in duration-150" 
                        x-transition:leave-start="opacity-100 translate-x-0" 
                        x-transition:leave-end="opacity-0 -translate-x-2"
                        class="flex-1 min-w-0">
                    <p class="text-sm font-semibold text-gray-900 dark:text-gray-100 truncate">
                        {{ auth()->user()->name ?? 'User' }}
                    </p>
                    <p class="text-xs text-gray-500 dark:text-gray-400 truncate">
                        {{ \Illuminate\Support\Str::limit(auth()->user()->email ?? '', 25) }}
                    </p>
                </div>
            </a>

            <!-- Logout Button -->
            <form method="POST" action="{{ route('logout') }}" 
                    x-show="isOpen" 
                    x-transition:enter="transition ease-out duration-200" 
                    x-transition:enter-start="opacity-0" 
                    x-transition:enter-end="opacity-100"
                    x-transition:leave="transition ease-in duration-150" 
                    x-transition:leave-start="opacity-100" 
                    x-transition:leave-end="opacity-0">
                @csrf
                <button 
                    type="submit"
                    class="w-full flex items-center gap-3 px-3 py-2.5 rounded-lg text-gray-700 dark:text-gray-300 hover:bg-red-50 dark:hover:bg-red-900/20 hover:text-red-600 dark:hover:text-red-400 transition-colors group"
                >
                    <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-5 w-5 flex-shrink-0 text-gray-500 dark:text-gray-400 group-hover:text-red-600 dark:group-hover:text-red-400" 
                            fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                    </svg>
                    <span class="font-medium whitespace-nowrap overflow-hidden">Logout</span>
                </button>
            </form>
        </div>
    </div>
</aside>
