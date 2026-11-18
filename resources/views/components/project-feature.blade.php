{{-- Panel besar untuk proyek unggulan di beranda. Warna mengikuti field "theme". --}}
@props(['project', 'flip' => false])
<article class="feature theme-{{ $project['theme'] }} {{ $flip ? 'feature--flip' : '' }}">
    <div class="feature__body">
        <div class="feature__meta">
            <x-status-pill :status="$project['status']" />
            <span>{{ $project['category'] }}, {{ $project['year'] }}</span>
        </div>
        <h3>{{ $project['title'] }}</h3>
        <p class="feature__subtitle">{{ $project['subtitle'] }}</p>
        <p class="feature__text">{{ $project['description'] }}</p>

        <ul class="tag-list" aria-label="Teknologi dan keahlian">
            @foreach ($project['technologies'] as $technology)
                <x-tag :label="$technology" />
            @endforeach
        </ul>

        <div class="feature__actions">
            <x-button :href="route('portfolio.show', ['slug' => $project['slug']])" variant="light">Baca studi kasus</x-button>
            @if (! empty($project['url']))
                <x-button :href="$project['url']" variant="outline-light" :external="true">{{ $project['url_label'] }}</x-button>
            @endif
        </div>
    </div>

    <a class="feature__media" style="background: {{ $project['image_bg'] }}" href="{{ route('portfolio.show', ['slug' => $project['slug']]) }}" tabindex="-1" aria-hidden="true">
        <img src="{{ asset($project['image']) }}" alt="" width="640" height="480" loading="lazy">
    </a>
</article>
