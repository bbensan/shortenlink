<div x-data="{
    selectedTemplate: 1,
    previewMode: 'desktop',
    editMode: false,
    templates: [
        {
            id: 1,
            name: 'Modern Minimalist',
            description: 'Clean and simple design with smooth animations',
            color: 'from-blue-500 to-purple-600',
            icon: 'M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z'
        },
        {
            id: 2,
            name: 'Gradient Pop',
            description: 'Colorful gradients with bold typography',
            color: 'from-pink-500 to-orange-500',
            icon: 'M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01'
        },
        {
            id: 3,
            name: 'Dark Elegance',
            description: 'Sophisticated dark theme with neon accents',
            color: 'from-gray-900 to-gray-700',
            icon: 'M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z'
        },
        {
            id: 4,
            name: 'Card Stack',
            description: 'Interactive card-based layout with hover effects',
            color: 'from-green-500 to-teal-600',
            icon: 'M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10'
        }
    ],
    profileData: {
        name: 'Alex Johnson',
        title: 'Creative Developer & Designer',
        bio: 'Passionate about creating beautiful digital experiences. Love coffee, code, and creativity.',
        avatar: 'https://ui-avatars.com/api/?name=Alex+Johnson&size=200&background=random',
        links: [
            { name: 'Portfolio', url: '#', icon: 'M21 12a9 9 0 01-9 9m9-9a9 9 0 00-9-9m9 9H3m9 9a9 9 0 01-9-9m9 9c1.657 0 3-4.03 3-9s-1.343-9-3-9m0 18c-1.657 0-3-4.03-3-9s1.343-9 3-9m-9 9a9 9 0 019-9' },
            { name: 'GitHub', url: '#', icon: 'M12 2C6.477 2 2 6.477 2 12c0 4.42 2.865 8.17 6.839 9.49.5.092.682-.217.682-.482 0-.237-.008-.866-.013-1.7-2.782.603-3.369-1.34-3.369-1.34-.454-1.156-1.11-1.464-1.11-1.464-.908-.62.069-.608.069-.608 1.003.07 1.531 1.03 1.531 1.03.892 1.529 2.341 1.087 2.91.831.092-.646.35-1.086.636-1.336-2.22-.253-4.555-1.11-4.555-4.943 0-1.091.39-1.984 1.029-2.683-.103-.253-.446-1.27.098-2.647 0 0 .84-.269 2.75 1.025A9.578 9.578 0 0112 6.836c.85.004 1.705.114 2.504.336 1.909-1.294 2.747-1.025 2.747-1.025.546 1.377.203 2.394.1 2.647.64.699 1.028 1.592 1.028 2.683 0 3.842-2.339 4.687-4.566 4.935.359.309.678.919.678 1.852 0 1.336-.012 2.415-.012 2.743 0 .267.18.578.688.48C19.138 20.167 22 16.418 22 12c0-5.523-4.477-10-10-10z' },
            { name: 'Twitter', url: '#', icon: 'M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z' },
            { name: 'LinkedIn', url: '#', icon: 'M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z' },
            { name: 'Instagram', url: '#', icon: 'M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z' }
        ]
    }
}">    
    <!-- Hero Section -->
    <section class="mt-16 pt-16 pb-16 gradient-background">
        <div class="container mx-auto px-6">
            <h1 class="text-4xl md:text-5xl font-bold text-center mb-4 text-gray-800">
                Personal Bio Page Templates
            </h1>
            <p class="text-xl text-center text-gray-600 mb-8">
                Choose from our beautiful, interactive templates to create your perfect bio page
            </p>
            
            <!-- Mode Toggle Buttons -->
            <div class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 mb-6 px-4">
                <button 
                    @click="editMode = false"
                    class="px-4 sm:px-6 py-3 rounded-lg font-medium transition-all duration-300"
                    :class="!editMode ? 'bg-purple-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50'"
                >
                    <span class="flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                        </svg>
                        <span class="text-sm sm:text-base">Preview Mode</span>
                    </span>
                </button>
                <button 
                    @click="editMode = true"
                    class="px-4 sm:px-6 py-3 rounded-lg font-medium transition-all duration-300"
                    :class="editMode ? 'bg-purple-600 text-white shadow-lg' : 'bg-white text-gray-700 hover:bg-gray-50'"
                >
                    <span class="flex items-center justify-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        <span class="text-sm sm:text-base">Edit Mode</span>
                    </span>
                </button>
            </div>
        </div>
    </section>

    <!-- Template Selector & Preview -->
    <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <!-- Edit Form Section -->
            <div x-show="editMode" 
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 transform -translate-y-4"
                 x-transition:enter-end="opacity-100 transform translate-y-0"
                 class="mb-12 bg-gradient-to-br from-purple-50 to-blue-50 rounded-2xl p-8 shadow-lg">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between gap-4 mb-6">
                    <h3 class="text-xl md:text-2xl font-bold text-gray-800 flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 md:h-6 md:w-6 text-purple-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        Customize Your Profile
                    </h3>
                    <div class="text-xs md:text-sm text-gray-600 bg-purple-100 px-3 py-2 rounded-lg">
                        <span class="font-medium">💡 Tip:</span> Changes update in real-time!
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left Column -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Full Name</label>
                            <input 
                                type="text" 
                                x-model="profileData.name"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Enter your name"
                            >
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Title/Job</label>
                            <input 
                                type="text" 
                                x-model="profileData.title"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="e.g., Web Developer"
                            >
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">Bio</label>
                            <textarea 
                                x-model="profileData.bio"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                placeholder="Tell us about yourself..."
                            ></textarea>
                        </div>
                    </div>
                    
                    <!-- Right Column - Links -->
                    <div class="space-y-4">
                        <div class="flex items-center justify-between mb-4">
                            <label class="block text-sm font-medium text-gray-700">Social Links</label>
                            <button 
                                @click="profileData.links.push({ name: 'New Link', url: '#', icon: 'M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1' })"
                                class="text-purple-600 hover:text-purple-700 text-sm font-medium flex items-center gap-1"
                            >
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                                </svg>
                                Add Link
                            </button>
                        </div>
                        
                        <div class="space-y-3 max-h-[400px] overflow-y-auto">
                            <template x-for="(link, index) in profileData.links" :key="index">
                                <div class="bg-white rounded-lg p-4 shadow-sm border border-gray-200">
                                    <div class="flex items-center justify-between mb-2">
                                        <input 
                                            type="text" 
                                            x-model="link.name"
                                            class="flex-1 px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                            placeholder="Link name"
                                        >
                                        <button 
                                            @click="profileData.links.splice(index, 1)"
                                            class="ml-2 text-red-500 hover:text-red-700"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                        </button>
                                    </div>
                                    <input 
                                        type="text" 
                                        x-model="link.url"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                        placeholder="https://..."
                                    >
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                
                <div class="mt-6 flex justify-center">
                    <button 
                        @click="editMode = false"
                        class="px-6 py-3 bg-purple-600 text-white rounded-lg font-medium hover:bg-purple-700 transition-colors shadow-lg"
                    >
                        View Live Preview
                    </button>
                </div>
            </div>

            <!-- Template Grid -->
            <div class="mb-12" x-show="!editMode"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100">
                <h3 class="text-2xl font-bold text-gray-800 mb-6">Choose Your Template</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <template x-for="template in templates" :key="template.id">
                        <div 
                            @click="selectedTemplate = template.id"
                            class="cursor-pointer rounded-xl p-6 border-2 transition-all duration-300 hover:shadow-xl transform hover:-translate-y-1"
                            :class="selectedTemplate === template.id ? 'border-purple-500 bg-purple-50 shadow-lg' : 'border-gray-200 hover:border-purple-300'"
                        >
                            <div class="flex items-center justify-between mb-4">
                                <div 
                                    class="w-12 h-12 rounded-lg flex items-center justify-center bg-gradient-to-br"
                                    :class="template.color"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 24 24">
                                        <path :d="template.icon" />
                                    </svg>
                                </div>
                                <div 
                                    x-show="selectedTemplate === template.id"
                                    x-transition
                                    class="w-6 h-6 bg-purple-500 rounded-full flex items-center justify-center"
                                >
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                                    </svg>
                                </div>
                            </div>
                            <h4 class="font-bold text-lg text-gray-800 mb-2" x-text="template.name"></h4>
                            <p class="text-sm text-gray-600" x-text="template.description"></p>
                        </div>
                    </template>
                </div>
            </div>

            <!-- Preview Mode Selector -->
            <div x-show="!editMode" 
                 x-transition
                 class="flex items-center justify-between mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Live Preview</h3>
                <div class="flex items-center space-x-2 bg-gray-100 rounded-lg p-1">
                    <button 
                        @click="previewMode = 'desktop'"
                        class="px-4 py-2 rounded-md transition-all duration-200"
                        :class="previewMode === 'desktop' ? 'bg-white shadow-sm text-purple-600 font-medium' : 'text-gray-600 hover:text-gray-800'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                        </svg>
                    </button>
                    <button 
                        @click="previewMode = 'mobile'"
                        class="px-4 py-2 rounded-md transition-all duration-200"
                        :class="previewMode === 'mobile' ? 'bg-white shadow-sm text-purple-600 font-medium' : 'text-gray-600 hover:text-gray-800'"
                    >
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Preview Title for Edit Mode -->
            <div x-show="editMode" 
                 x-transition
                 class="mb-6">
                <h3 class="text-2xl font-bold text-gray-800 text-center">Live Preview</h3>
                <p class="text-gray-600 text-center mt-2">See your changes in real-time below</p>
            </div>

            <!-- Preview Container -->
            <div class="bg-gray-100 rounded-2xl p-4 md:p-8 min-h-[600px] flex items-center justify-center"
                 :class="editMode ? 'mt-8' : ''">
                <div 
                    class="bg-white rounded-xl shadow-2xl transition-all duration-500 overflow-hidden"
                    :class="editMode ? 'w-[375px] h-[667px]' : (previewMode === 'mobile' ? 'w-[375px] h-[667px]' : 'w-full max-w-4xl min-h-[600px]')"
                >
                    <!-- Template 1: Modern Minimalist -->
                    <div x-show="selectedTemplate === 1" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="h-full overflow-y-auto"
                         x-data="{ hoveredLink: null }">
                        <div class="p-6 md:p-8 lg:p-12 text-center">
                            <!-- Avatar with animation -->
                            <div class="mb-4 md:mb-6 flex justify-center">
                                <div class="relative group">
                                    <div class="absolute -inset-1 bg-gradient-to-r from-blue-500 to-purple-600 rounded-full blur opacity-25 group-hover:opacity-75 transition duration-300"></div>
                                    <img :src="profileData.avatar" 
                                         alt="Profile" 
                                         class="relative w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-white shadow-xl transform group-hover:scale-105 transition duration-300">
                                </div>
                            </div>
                            
                            <!-- Name & Title -->
                            <h1 class="text-2xl md:text-3xl lg:text-4xl font-bold text-gray-800 mb-2" x-text="profileData.name"></h1>
                            <p class="text-base md:text-lg text-gray-600 mb-2 md:mb-4" x-text="profileData.title"></p>
                            <p class="text-sm md:text-base text-gray-500 max-w-md mx-auto mb-6 md:mb-8 px-2" x-text="profileData.bio"></p>
                            
                            <!-- Links -->
                            <div class="space-y-2 md:space-y-3 max-w-md mx-auto px-2">
                                <template x-for="(link, index) in profileData.links.slice(0, 5)" :key="index">
                                    <a href="#" 
                                       @mouseenter="hoveredLink = index"
                                       @mouseleave="hoveredLink = null"
                                       @click="hoveredLink = hoveredLink === index ? null : index"
                                       class="block w-full p-3 md:p-4 rounded-xl border-2 border-gray-200 hover:border-purple-500 transition-all duration-300 transform hover:scale-105 hover:shadow-lg"
                                       :class="hoveredLink === index ? 'bg-gradient-to-r from-blue-50 to-purple-50' : 'bg-white'"
                                    >
                                        <div class="flex items-center justify-center space-x-2 md:space-x-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 text-purple-600 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path :d="link.icon" />
                                            </svg>
                                            <span class="font-medium text-sm md:text-base text-gray-800 truncate" x-text="link.name"></span>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Template 2: Gradient Pop -->
                    <div x-show="selectedTemplate === 2" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="h-full overflow-y-auto bg-gradient-to-br from-pink-500 via-purple-500 to-orange-500 p-1">
                        <div class="bg-white rounded-lg p-6 md:p-12 text-center h-full">
                            <!-- Avatar -->
                            <div class="mb-4 md:mb-6 flex justify-center">
                                <div class="relative">
                                    <div class="absolute -inset-2 bg-gradient-to-r from-pink-500 to-orange-500 rounded-full animate-pulse"></div>
                                    <img :src="profileData.avatar" 
                                         alt="Profile" 
                                         class="relative w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-white shadow-2xl">
                                </div>
                            </div>
                            
                            <!-- Name with gradient text -->
                            <h1 class="text-2xl md:text-4xl lg:text-5xl font-black mb-2 bg-gradient-to-r from-pink-500 to-orange-500 bg-clip-text text-transparent leading-tight" x-text="profileData.name"></h1>
                            <p class="text-base md:text-xl font-bold text-gray-700 mb-2 md:mb-4" x-text="profileData.title"></p>
                            <p class="text-sm md:text-base text-gray-600 max-w-md mx-auto mb-6 md:mb-8 px-2" x-text="profileData.bio"></p>
                            
                            <!-- Links with gradient -->
                            <div class="space-y-3 md:space-y-4 max-w-md mx-auto px-2">
                                <template x-for="(link, index) in profileData.links.slice(0, 5)" :key="index">
                                    <a href="#" 
                                       class="block w-full p-3 md:p-4 rounded-xl bg-gradient-to-r from-pink-500 to-orange-500 text-white font-bold transform hover:scale-105 transition-all duration-300 hover:shadow-2xl"
                                    >
                                        <div class="flex items-center justify-center space-x-2 md:space-x-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 md:h-5 md:w-5 flex-shrink-0" fill="currentColor" viewBox="0 0 24 24">
                                                <path :d="link.icon" />
                                            </svg>
                                            <span class="text-sm md:text-base truncate" x-text="link.name"></span>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Template 3: Dark Elegance -->
                    <div x-show="selectedTemplate === 3" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="h-full overflow-y-auto bg-gray-900"
                         x-data="{ glowLink: null }">
                        <div class="p-6 md:p-8 lg:p-12 text-center">
                            <!-- Avatar with neon glow -->
                            <div class="mb-4 md:mb-6 flex justify-center">
                                <div class="relative">
                                    <div class="absolute -inset-1 bg-cyan-500 rounded-full blur-lg opacity-50"></div>
                                    <img :src="profileData.avatar" 
                                         alt="Profile" 
                                         class="relative w-24 h-24 md:w-32 md:h-32 rounded-full border-4 border-cyan-400 shadow-2xl shadow-cyan-500/50">
                                </div>
                            </div>
                            
                            <!-- Name & Title -->
                            <h1 class="text-2xl md:text-4xl lg:text-5xl font-bold text-white mb-2" x-text="profileData.name"></h1>
                            <p class="text-base md:text-xl text-cyan-400 mb-2 md:mb-4" x-text="profileData.title"></p>
                            <p class="text-sm md:text-base text-gray-400 max-w-md mx-auto mb-6 md:mb-8 px-2" x-text="profileData.bio"></p>
                            
                            <!-- Links with neon effect -->
                            <div class="space-y-2 md:space-y-3 max-w-md mx-auto px-2">
                                <template x-for="(link, index) in profileData.links.slice(0, 5)" :key="index">
                                    <a href="#" 
                                       @mouseenter="glowLink = index"
                                       @mouseleave="glowLink = null"
                                       @click="glowLink = glowLink === index ? null : index"
                                       class="block w-full p-3 md:p-4 rounded-xl border-2 transition-all duration-300 transform hover:scale-105 relative group"
                                       :class="glowLink === index ? 'border-cyan-400 bg-cyan-500/10 shadow-lg shadow-cyan-500/50' : 'border-gray-700 bg-gray-800'"
                                    >
                                        <div 
                                            x-show="glowLink === index"
                                            class="absolute inset-0 bg-cyan-500 rounded-xl opacity-10 blur-xl"
                                        ></div>
                                        <div class="flex items-center justify-center space-x-2 md:space-x-3 relative">
                                            <svg xmlns="http://www.w3.org/2000/svg" 
                                                 class="h-4 w-4 md:h-5 md:w-5 transition-colors duration-300 flex-shrink-0" 
                                                 :class="glowLink === index ? 'text-cyan-400' : 'text-gray-400'"
                                                 fill="currentColor" 
                                                 viewBox="0 0 24 24">
                                                <path :d="link.icon" />
                                            </svg>
                                            <span 
                                                class="font-medium text-sm md:text-base transition-colors duration-300 truncate"
                                                :class="glowLink === index ? 'text-cyan-400' : 'text-gray-300'"
                                                x-text="link.name"
                                            ></span>
                                        </div>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>

                    <!-- Template 4: Card Stack -->
                    <div x-show="selectedTemplate === 4" 
                         x-transition:enter="transition ease-out duration-300"
                         x-transition:enter-start="opacity-0 transform scale-95"
                         x-transition:enter-end="opacity-100 transform scale-100"
                         class="h-full overflow-y-auto bg-gradient-to-br from-green-50 to-teal-50"
                         x-data="{ activeCard: null }">
                        <div class="p-4 md:p-8 lg:p-12">
                            <!-- Profile Card -->
                            <div class="bg-white rounded-2xl shadow-xl p-4 md:p-8 mb-4 md:mb-6 transform hover:scale-102 transition-all duration-300">
                                <div class="flex flex-col md:flex-row items-center gap-4 md:gap-6">
                                    <img :src="profileData.avatar" 
                                         alt="Profile" 
                                         class="w-20 h-20 md:w-24 md:h-24 rounded-full border-4 border-green-500 shadow-lg flex-shrink-0">
                                    <div class="text-center md:text-left">
                                        <h1 class="text-xl md:text-3xl font-bold text-gray-800 mb-1" x-text="profileData.name"></h1>
                                        <p class="text-sm md:text-lg text-green-600 mb-1 md:mb-2" x-text="profileData.title"></p>
                                        <p class="text-xs md:text-base text-gray-600" x-text="profileData.bio"></p>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Link Cards Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-3 md:gap-4">
                                <template x-for="(link, index) in profileData.links.slice(0, 6)" :key="index">
                                    <div 
                                        @mouseenter="activeCard = index"
                                        @mouseleave="activeCard = null"
                                        @click="activeCard = activeCard === index ? null : index"
                                        class="bg-white rounded-xl shadow-md p-4 md:p-6 cursor-pointer transform transition-all duration-300 hover:-translate-y-2"
                                        :class="activeCard === index ? 'shadow-2xl bg-gradient-to-br from-green-50 to-teal-50 border-2 border-green-500' : 'hover:shadow-xl'"
                                    >
                                        <div class="flex items-center space-x-3 md:space-x-4">
                                            <div 
                                                class="w-10 h-10 md:w-12 md:h-12 rounded-lg flex items-center justify-center transition-all duration-300 flex-shrink-0"
                                                :class="activeCard === index ? 'bg-gradient-to-br from-green-500 to-teal-600' : 'bg-gray-100'"
                                            >
                                                <svg xmlns="http://www.w3.org/2000/svg" 
                                                     class="h-5 w-5 md:h-6 md:w-6 transition-colors duration-300" 
                                                     :class="activeCard === index ? 'text-white' : 'text-gray-600'"
                                                     fill="currentColor" 
                                                     viewBox="0 0 24 24">
                                                    <path :d="link.icon" />
                                                </svg>
                                            </div>
                                            <span 
                                                class="font-semibold text-sm md:text-lg transition-colors duration-300 truncate"
                                                :class="activeCard === index ? 'text-green-600' : 'text-gray-800'"
                                                x-text="link.name"
                                            ></span>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="mt-12 text-center">
                <a href="{{ route('info-register') }}" class="inline-block px-8 py-4 rounded-full btn-highlight text-white font-medium text-lg transform hover:scale-105 transition-all duration-300 shadow-lg hover:shadow-xl">
                    Create Your Bio Page Now - It's Free!
                </a>
                <p class="text-gray-600 mt-4">No credit card required. Get started in minutes.</p>
            </div>
        </div>
    </section>
</div>
