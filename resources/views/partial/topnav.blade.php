<div x-data="{ 
  mobileMenuOpen: localStorage.getItem('mobileMenuOpen') === 'true',
  toggleMenu() {
    this.mobileMenuOpen = !this.mobileMenuOpen;
    localStorage.setItem('mobileMenuOpen', this.mobileMenuOpen);
  },
  closeMenu() {
    this.mobileMenuOpen = false;
    localStorage.setItem('mobileMenuOpen', 'false');
  }
}">
  <nav id="navbar" class="nav-blur px-6 py-4 shadow-md">
    <div class="container mx-auto flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <a href="{{ route('home') }}" wire:navigate class="text-2xl font-bold gradient-text">Lovilink</a>
      </div>

      <!-- Desktop Nav -->
      <div class="hidden md:flex space-x-6">
        <a href="{{ route('home') }}" wire:navigate class="text-gray-700 {{ Request::routeIs('home') ? 'font-medium' : '' }} hover:text-gray-900">Home</a>
        <a href="{{ route('info-features') }}" wire:navigate class="text-gray-700 {{ Request::routeIs('info-features') ? 'font-medium' : '' }} hover:text-gray-900">Features</a>
        <a href="{{ route('info-pages') }}" wire:navigate class="text-gray-700 {{ Request::routeIs('info-pages') ? 'font-medium' : '' }} hover:text-gray-900">Pages</a>
        <a href="{{ route('info-blog') }}" wire:navigate class="text-gray-700 {{ Request::routeIs('info-blog') ? 'font-medium' : '' }} hover:text-gray-900">Blog</a>
        <a href="{{ route('info-contact') }}" wire:navigate class="text-gray-700 {{ Request::routeIs('info-contact') ? 'font-medium' : '' }} hover:text-gray-900">Contact</a>
      </div>

      <!-- Get Started + Hamburger -->
      <div class="flex items-center md:hidden relative">
        <button @click="toggleMenu()" class="focus:outline-none" type="button" aria-label="Toggle navigation menu">
          <svg class="h-6 w-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
          </svg>
        </button>
      </div>

      <!-- Get Started Desktop -->
      <div class="hidden md:block">
        <a href="{{ route('info-register') }}" class="px-6 py-2 rounded-full btn-highlight text-white font-medium">Get Started</a>
      </div>
    </div>
    
  </nav>

  <div 
    @click="closeMenu()"
    class="mobile-overlay fixed top-[315px] inset-0 bg-black bg-opacity-40 z-30 transition-opacity duration-300 ease-in-out min-h-screen md:hidden"
    :class="mobileMenuOpen ? 'opacity-100 pointer-events-auto' : 'opacity-0 pointer-events-none'"
  ></div>

  <div 
    id="mobile-nav" 
    class="fixed top-nav-position left-0 w-full nav-blur shadow-md z-40 px-6 py-4 transition-all duration-300 ease-in-out md:hidden"
    :class="mobileMenuOpen ? 'opacity-100 scale-100 pointer-events-auto' : 'opacity-0 scale-95 pointer-events-none'"
  >
    <a href="{{ route('info-features') }}" wire:navigate @click="closeMenu()" class="block text-gray-700 text-center border-b border-gray-200 py-2 hover:text-gray-900">Features</a>
    <a href="{{ route('info-pages') }}" wire:navigate @click="closeMenu()" class="block text-gray-700 text-center border-b border-gray-200 py-2 hover:text-gray-900">Pages</a>
    <a href="{{ route('info-blog') }}" wire:navigate @click="closeMenu()" class="block text-gray-700 text-center border-b border-gray-200 py-2 hover:text-gray-900">Blog</a>
    <a href="{{ route('info-contact') }}" wire:navigate @click="closeMenu()" class="block text-gray-700 text-center py-2 hover:text-gray-900">Contact</a>
    <a href="{{ route('info-register') }}" @click="closeMenu()" class="block px-6 py-2 rounded-full btn-highlight mt-4 text-white font-medium text-center">Get Started</a>
  </div>
</div>