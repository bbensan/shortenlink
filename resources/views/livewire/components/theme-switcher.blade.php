<div 
    x-data="{ 
        theme: localStorage.getItem('theme') || 'system',
        init() {
            // Load theme from localStorage on init
            const savedTheme = localStorage.getItem('theme') || 'system';
            this.theme = savedTheme;
            this.applyTheme();
            
            // Watch for theme changes
            this.$watch('theme', () => {
                this.applyTheme();
            });
            
            // Listen for system theme changes when theme is 'system'
            const mediaQuery = window.matchMedia('(prefers-color-scheme: dark)');
            const handleSystemThemeChange = (e) => {
                if (this.theme === 'system') {
                    document.documentElement.classList.toggle('dark', e.matches);
                }
            };
            mediaQuery.addEventListener('change', handleSystemThemeChange);
        },
        applyTheme() {
            // Save to localStorage
            localStorage.setItem('theme', this.theme);
            
            // Apply theme to document
            if (this.theme === 'system') {
                const systemTheme = window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
                if (systemTheme === 'dark') {
                    document.documentElement.classList.add('dark');
                } else {
                    document.documentElement.classList.remove('dark');
                }
            } else if (this.theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        },
        setTheme(newTheme) {
            this.theme = newTheme;
            // Theme is saved and applied automatically via $watch
        }
    }"
    class="relative"
>
    <div class="flex items-center gap-2 justify-center">
        <!-- Light Icon -->
        <button 
            @click="setTheme('light')"
            type="button"
            class="p-2 rounded-lg transition-colors flex-shrink-0"
            :class="theme === 'light' ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800'"
            title="Light Mode"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
            </svg>
        </button>

        <!-- System Icon -->
        <button 
            @click="setTheme('system')"
            type="button"
            class="p-2 rounded-lg transition-colors flex-shrink-0"
            :class="theme === 'system' ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800'"
            title="System Theme"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
        </button>

        <!-- Dark Icon -->
        <button 
            @click="setTheme('dark')"
            type="button"
            class="p-2 rounded-lg transition-colors flex-shrink-0"
            :class="theme === 'dark' ? 'bg-purple-100 text-purple-700 dark:bg-purple-900 dark:text-purple-300' : 'text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-800'"
            title="Dark Mode"
        >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
            </svg>
        </button>
    </div>
</div>

