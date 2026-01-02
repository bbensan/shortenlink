<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Dashboard - Lovilink</title>
  <meta name="description" content="Manage your shortened links with Lovilink Dashboard">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <link rel="stylesheet" href="{{ asset('assets/css/lovilink.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/lovilink.ico') }}">
  <script>
    // Apply theme immediately to prevent flash
    (function() {
      const theme = localStorage.getItem('theme') || 'system';
      let isDark = false;
      
      if (theme === 'dark') {
        isDark = true;
      } else if (theme === 'system') {
        isDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
      }
      
      if (isDark) {
        document.documentElement.classList.add('dark');
      } else {
        document.documentElement.classList.remove('dark');
      }
    })();
  </script>
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-200">
  <div class="flex h-screen overflow-hidden">
    <!-- Sidebar - Desktop -->
    @include('partials.dashboard.sidebar')
    
    <!-- Main Content Area -->
    <div class="flex flex-col flex-1 overflow-hidden">
      <!-- Navbar - Optional, can be included if needed -->
      @if(isset($showNavbar) && $showNavbar)
        @include('partials.dashboard.navbar', ['breadcrumbs' => $breadcrumbs ?? null])
      @endif
      
      <!-- Main Content -->
      <main class="flex-1 overflow-y-auto pb-20 md:pb-6">
        <div class="container mx-auto px-4 md:px-6 py-6">
          {{ $slot }}
        </div>
      </main>
    </div>
  </div>

  <!-- Mobile Bottom Navigation -->
  @include('partials.dashboard.mobile-nav')
  
  @livewireScripts
</body>
</html>

