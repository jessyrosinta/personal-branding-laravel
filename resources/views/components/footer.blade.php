<footer class="site-footer">
    <div class="container site-footer__top">
        <div class="site-footer__pitch">
            <h2>Punya alur kerja yang masih manual?</h2>
            <p>Ceritakan masalahnya. Saya senang berdiskusi tentang cara membuat prosesnya lebih jelas dan mudah dipantau.</p>
            <x-button :href="route('contact')" variant="gold">Hubungi saya</x-button>
        </div>

        <nav class="site-footer__col" aria-label="Navigasi footer">
            <h3>Jelajahi</h3>
            <ul>
                <li><a href="{{ route('home') }}">Beranda</a></li>
                <li><a href="{{ route('about') }}">Tentang</a></li>
                <li><a href="{{ route('portfolio') }}">Portofolio</a></li>
                <li><a href="{{ route('blog.index') }}">Blog</a></li>
                <li><a href="{{ route('contact') }}">Kontak</a></li>
            </ul>
        </nav>

        <div class="site-footer__col">
            <h3>Karya yang sudah online</h3>
            <ul>
                @foreach ($liveProjects as $project)
                    <li><a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">{{ $project['url_label'] }}<span class="sr-only"> (membuka tab baru)</span></a></li>
                @endforeach
            </ul>
        </div>
    </div>

    <div class="container site-footer__bottom">
        <p>© {{ date('Y') }} {{ $profile['name'] }}. Dibangun dengan Laravel dan Blade.</p>
        <a href="#main-content">Kembali ke atas</a>
    </div>
</footer>
