{{-- Kartu artikel untuk beranda dan halaman Blog. --}}
@props(['article', 'featured' => false])
@php
    $url = route('blog.show', ['slug' => $article['slug']]);
    $published = \Illuminate\Support\Carbon::parse($article['date'])->translatedFormat('j F Y');
@endphp
<article class="article-card {{ $featured ? 'article-card--featured' : '' }}" data-filter-item="{{ $article['category'] }}">
    <a class="article-card__media" href="{{ $url }}" tabindex="-1" aria-hidden="true">
        <img src="{{ asset($article['image']) }}" alt="" width="640" height="420" loading="lazy">
    </a>
    <div class="article-card__body">
        <p class="article-card__meta">
            <span class="article-card__category">{{ $article['category'] }}</span>
            <time datetime="{{ $article['date'] }}">{{ $published }}</time>
        </p>
        <h3><a href="{{ $url }}">{{ $article['title'] }}</a></h3>
        <p>{{ $article['excerpt'] }}</p>
        <a class="text-link" href="{{ $url }}">Baca selengkapnya<span class="sr-only">: {{ $article['title'] }}</span></a>
    </div>
</article>
