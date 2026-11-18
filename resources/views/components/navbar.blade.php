@php
    $links = [
        ['label' => 'Beranda', 'route' => 'home', 'active' => ['home']],
        ['label' => 'Tentang', 'route' => 'about', 'active' => ['about']],
        ['label' => 'Portofolio', 'route' => 'portfolio', 'active' => ['portfolio', 'portfolio.*']],
        ['label' => 'Blog', 'route' => 'blog.index', 'active' => ['blog.*']],
    ];
@endphp

<header class="site-header">
    <div class="container site-header__inner">
        <a class="brand" href="{{ route('home') }}" aria-label="{{ $profile['name'] }}, kembali ke beranda">
            <img class="brand__mark" src="{{ asset('assets/img/avatar.svg') }}" alt="" width="40" height="40">
            <span class="brand__name">{{ $profile['name'] }}</span>
        </a>

        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-menu">
            <span class="nav-toggle__label">Menu</span>
            <span class="nav-toggle__bars" aria-hidden="true"></span>
        </button>

        <nav id="site-menu" class="site-nav" aria-label="Navigasi utama">
            @foreach ($links as $link)
                @php $isActive = request()->routeIs(...$link['active']); @endphp
                <a class="site-nav__link {{ $isActive ? 'is-active' : '' }}"
                   href="{{ route($link['route']) }}"
                   @if ($isActive) aria-current="page" @endif>{{ $link['label'] }}</a>
            @endforeach
            <a class="site-nav__cta" href="{{ route('contact') }}">Hubungi saya</a>
        </nav>
    </div>
</header>
