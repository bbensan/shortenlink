    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-12">
      <div class="container mx-auto px-6">
          <div class="flex flex-col md:flex-row justify-between">
              <div class="mb-6 md:mb-0">
                  <h3 class="text-2xl font-bold gradient-text mb-4">Lovilink</h3>
                  <p class="text-gray-400 max-w-xs">Making the web a better place, one short link at a time.</p>
              </div>
              
              <div class="grid grid-cols-2 md:grid-cols-3 gap-8">
                  <!-- Column 1 -->
                  <div>
                      <h4 class="text-lg font-semibold mb-4">Product</h4>
                      <ul class="space-y-2">
                          <li><a href="{{ route('info-features') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Features</a></li>
                          <li><a href="{{ route('info-pages') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Pages</a></li>
                          <li><a href="{{ route('info-tools') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Tools</a></li>
                          {{-- <li><a href="{{ route('info-template') }}" class="text-gray-400 hover:text-white transition-colors">Templates</a></li> --}}
                      </ul>
                  </div>
                  
                  <!-- Column 2 -->
                  <div>
                      <h4 class="text-lg font-semibold mb-4">Company</h4>
                      <ul class="space-y-2">
                          <li><a href="{{ route('info-about') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">About</a></li>
                          <li><a href="{{ route('info-blog') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Blog</a></li>
                          <li><a href="{{ route('info-contact') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Contact</a></li>
                          <li><a href="{{ route('info-feedback') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Feedback</a></li>
                      </ul>
                  </div>
                  
                  <!-- Column 3 -->
                  <div>
                      <h4 class="text-lg font-semibold mb-4">Legal</h4>
                      <ul class="space-y-2">
                          <li><a href="{{ route('info-privacy') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Privacy</a></li>
                          <li><a href="{{ route('info-terms') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Terms</a></li>
                          <li><a href="{{ route('info-cookie') }}" wire:navigate class="text-gray-400 hover:text-white transition-colors">Cookie Policy</a></li>
                      </ul>
                  </div>
              </div>
          </div>
          
          <div class="border-t border-gray-700 mt-10 pt-6 flex flex-col md:flex-row justify-between items-center">
              <p class="text-gray-400 text-sm">© {{ Carbon\Carbon::now()->year }} Lovilink - Free URL Shortener. All rights reserved.</p>
              <div class="flex space-x-2 mt-4 md:mt-0">
                  <a href="https://x.com/_lovilink" class="text-gray-400 hover:text-white transition-colors" aria-label="Visit us on X">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"  stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-x">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 4l11.733 16h4.267l-11.733 -16z" />
                            <path d="M4 20l6.768 -6.768m2.46 -2.46l6.772 -6.772" />
                        </svg>
                  </a>
                  <a href="https://instagram.com" class="text-gray-400 hover:text-white transition-colors" aria-label="Visit us on Instagram">
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-instagram">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M4 8a4 4 0 0 1 4 -4h8a4 4 0 0 1 4 4v8a4 4 0 0 1 -4 4h-8a4 4 0 0 1 -4 -4z" />
                            <path d="M9 12a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                            <path d="M16.5 7.5v.01" />
                        </svg>
                  </a>
                  <a href="https://facebook.com" class="text-gray-400 hover:text-white transition-colors" aria-label="Visit us on Facebook" >
                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-brand-facebook">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                  </a>
              </div>
          </div>
      </div>
  </footer>