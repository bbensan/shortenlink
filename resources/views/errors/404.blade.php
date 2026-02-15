<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>404 Not Found - Lovilink</title>
  <meta name="description" content="The page you are looking for might have been removed, had its name changed, or is temporarily unavailable. Please check the URL and try again." />
  <link rel="canonical" href="{{ url('https://lovilink.com/' . request()->path()) }}">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white flex flex-col justify-center items-center min-h-screen px-6 text-center">

  <div class="max-w-lg">
    <h1 class="text-9xl font-bold text-yellow-300">404</h1>
    <p class="mt-4 text-2xl sm:text-3xl font-semibold text-white">Oops! Page Not Found</p>
    <p class="mt-2 text-lg text-gray-300">Looks like you took a wrong turn. Let’s get you back on track.</p>

    <div class="mt-6">
      <a href="{{ url('/') }}"
         class="inline-block px-6 py-3 rounded-2xl font-medium text-gray-900 bg-yellow-300 hover:bg-yellow-200 transition duration-200 shadow-lg">
        Go Home
      </a>
    </div>

    <div class="mt-12 flex justify-center ">
      <p class="text-sm text-red-300 animate-bounce flex gap-2">
        You might’ve shortened the wrong link 
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-mood-sad">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M17 3.34a10 10 0 1 1 -14.995 8.984l-.005 -.324l.005 -.324a10 10 0 0 1 14.995 -8.336zm-5 9.86a4.5 4.5 0 0 0 -3.214 1.35a1 1 0 1 0 1.428 1.4a2.5 2.5 0 0 1 3.572 0a1 1 0 0 0 1.428 -1.4a4.5 4.5 0 0 0 -3.214 -1.35zm-2.99 -4.2l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007zm6 0l-.127 .007a1 1 0 0 0 0 1.986l.117 .007l.127 -.007a1 1 0 0 0 0 -1.986l-.117 -.007z" />
          </svg>
      </p>
    </div>
  </div>

</body>
</html>
