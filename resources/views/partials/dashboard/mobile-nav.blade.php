@php
    $navItems = [
        [
            'label' => 'Home',
            'route' => 'dashboard-home',
            'icon' => 'M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6',
        ],
        [
            'label' => 'QR Generator',
            'route' => 'dashboard-qr-generator',
            'icon' => 'M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z',
        ],
        [
            'label' => 'Preferences',
            'route' => '#',
            'icon' => 'M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z',
        ],
        [
            'label' => 'Profile',
            'route' => 'dashboard-profile',
            'icon' => null, // Will use avatar instead
        ],
    ];
@endphp

<div class="md:hidden fixed bottom-0 left-0 right-0 z-50" 
     x-data="{ 
         themeMenuOpen: false,
         toggleThemeMenu() {
             this.themeMenuOpen = !this.themeMenuOpen;
         },
         closeThemeMenu() {
             this.themeMenuOpen = false;
         }
     }"
     @click.away="closeThemeMenu()">
    
    <!-- Floating Theme Switcher -->
    <div class="absolute bottom-full left-0 right-0 mb-2 px-4" 
         x-show="themeMenuOpen"
         x-transition:enter="transition ease-out duration-200"
         x-transition:enter-start="opacity-0 translate-y-2"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-2"
         x-cloak>
        <div class="bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700 p-2">
            @livewire('components.theme-switcher')
        </div>
    </div>

    <!-- Bottom Navigation -->
    <nav class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        <div class="grid grid-cols-4 gap-0">
            @foreach($navItems as $index => $item)
                @if($item['label'] === 'Profile')
                    <a 
                        href="{{ $item['route'] === '#' ? '#' : route($item['route']) }}" 
                        @if($item['route'] !== '#') wire:navigate.hover @endif
                        class="flex flex-col items-center justify-center gap-1 py-3 px-2 transition-colors {{ $item['route'] !== '#' && Request::routeIs($item['route']) ? 'text-purple-600 dark:text-purple-400' : 'text-gray-600 dark:text-gray-400' }}"
                    >
                        <div class="w-6 h-6 rounded-full bg-gradient-to-br from-purple-500 to-pink-500 flex items-center justify-center text-white text-xs font-semibold shadow-sm">
                            {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                        </div>
                        <span class="text-xs font-medium">{{ $item['label'] }}</span>
                    </a>
                @elseif($item['label'] === 'Preferences')
                    <button 
                        @click="toggleThemeMenu()"
                        type="button"
                        class="flex flex-col items-center justify-center gap-1 py-3 px-2 transition-colors text-gray-600 dark:text-gray-400"
                        :class="themeMenuOpen ? 'text-purple-600 dark:text-purple-400' : ''"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                        </svg>
                        <span class="text-xs font-medium">{{ $item['label'] }}</span>
                    </button>
                @else
                    <a 
                        href="{{ $item['route'] === '#' ? '#' : route($item['route']) }}" 
                        @if($item['route'] !== '#') wire:navigate.hover @endif
                        class="flex flex-col items-center justify-center gap-1 py-3 px-2 transition-colors {{ $item['route'] !== '#' && Request::routeIs($item['route']) ? 'text-purple-600 dark:text-purple-400' : 'text-gray-600 dark:text-gray-400' }}"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}" />
                        </svg>
                        <span class="text-xs font-medium">{{ $item['label'] }}</span>
                    </a>
                @endif
            @endforeach
        </div>
    </nav>
</div>
