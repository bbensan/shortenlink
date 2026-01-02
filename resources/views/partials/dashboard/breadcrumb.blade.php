@if(isset($breadcrumbs) && is_array($breadcrumbs) && count($breadcrumbs) > 0)
<nav class="flex items-center space-x-2 text-sm" aria-label="Breadcrumb">
    <ol class="flex items-center space-x-2">
        @foreach($breadcrumbs as $index => $breadcrumb)
            @if($index < count($breadcrumbs) - 1)
                <li class="flex items-center">
                    <a 
                        href="{{ $breadcrumb['url'] ?? '#' }}" 
                        wire:navigate.hover
                        class="text-gray-600 dark:text-gray-400 hover:text-purple-600 dark:hover:text-purple-400 transition-colors"
                    >
                        {{ $breadcrumb['label'] ?? 'Home' }}
                    </a>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mx-2 text-gray-400 dark:text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                    </svg>
                </li>
            @else
                <li class="flex items-center">
                    <span class="text-gray-900 dark:text-gray-100 font-medium">
                        {{ $breadcrumb['label'] ?? 'Current Page' }}
                    </span>
                </li>
            @endif
        @endforeach
    </ol>
</nav>
@endif

