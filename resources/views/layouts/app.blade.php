<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#12203b">
    <meta name="description" content="@yield('meta_description', $profile['tagline'])">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $profile['name'] }}">
    <meta property="og:title" content="@yield('title', 'Beranda') · {{ $profile['name'] }}">
    <meta property="og:description" content="@yield('meta_description', $profile['tagline'])">

    <title>@yield('title', 'Beranda') · {{ $profile['name'] }}</title>

    <script>document.documentElement.classList.add('has-js');</script>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/img/favicon.svg') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@12..96,500;12..96,700;12..96,800&family=Public+Sans:ital,wght@0,400;0,500;0,600;0,700;1,400&display=swap">
    <link rel="stylesheet" href="{{ asset('assets/css/site.css') }}">
    <script src="{{ asset('assets/js/site.js') }}" defer></script>
</head>
<body>
    <a class="skip-link" href="#main-content">Lewati ke konten utama</a>

    {{-- Navbar dan footer dipakai di semua halaman lewat layout ini --}}
    <x-navbar />

    <main id="main-content">
        @yield('content')
    </main>

    <x-footer />
</body>
</html>
