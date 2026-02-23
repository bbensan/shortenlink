<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>{{ $title ?? 'Lovilink - Free URL Shortener' }}</title>
  <meta name="description" content='{{ $seoDescription ?? 'Simplify your digital presence. Lovilink is the free, open-source way to connect people and ideas, one short link at a time.' }}'>

  <meta name="robots" content="index, follow">
  <meta name="keywords" content="{{ $keywords ?? 'Lovilink, shorten link, bio link, open source marketing, free url shortener, link analytics, digital presence' }}">
  <meta name="author" content="Tev Immanuel">
  <meta name="google" content="notranslate">

  <meta property="og:type" content="website">
  <meta property="og:title" content="{{ $title ?? 'Lovilink - Free URL Shortener' }}">
  <meta property="og:description" content="{{ $seoDescription ?? 'Simplify your digital presence. Lovilink is the free, open-source way to connect people and ideas, one short link at a time.' }}">
  <meta property="og:url" content="https://lovilink.com">
  <meta property="og:image" content="https://lovilink.com/assets/img/page.png">
  <meta property="fb:app_id" content="1246995273070330" />

  <meta name="google-site-verification" content="fWnter7hioZcQFqIw4Z3aCd2fCcUHmAYLNnU3uEQMm4" />

  <link rel="canonical" href="{{ 'https://lovilink.com/' . ltrim(request()->path(), '/') }}">
  
  @vite(['resources/css/app.css', 'resources/js/app.js'])
  @livewireStyles
  <link rel="stylesheet" href="{{ asset('assets/css/lovilink.css') }}">
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/logo/lovilink.ico') }}">
  <style>
    [x-cloak] { display: none !important; }
  </style>
</head>
<body>

  @include('partial.topnav')
    {{ $slot }}
  @include('partial.footer')
  
  @livewireScripts
</body>
</html>