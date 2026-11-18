{{-- Kartu proyek untuk halaman Portofolio. Data datang dari $project, bukan ditulis berulang. --}}
@props(['project'])
<article class="project-card" data-filter-item="{{ $project['type'] }}">
    <a class="project-card__media" style="background: {{ $project['image_bg'] }}" href="{{ route('portfolio.show', ['slug' => $project['slug']]) }}" tabindex="-1" aria-hidden="true">
        <img src="{{ asset($project['image']) }}" alt="" width="640" height="480" loading="lazy">
    </a>

    <div class="project-card__body">
        <div class="project-card__meta">
            <x-status-pill :status="$project['status']" />
            <span>{{ $project['category'] }}, {{ $project['year'] }}</span>
        </div>

        <h3><a href="{{ route('portfolio.show', ['slug' => $project['slug']]) }}">{{ $project['title'] }}</a></h3>
        <p class="project-card__subtitle">{{ $project['subtitle'] }}</p>
        <p>{{ $project['description'] }}</p>

        <ul class="tag-list" aria-label="Teknologi dan keahlian">
            @foreach ($project['technologies'] as $technology)
                <x-tag :label="$technology" />
            @endforeach
        </ul>

        <div class="project-card__actions">
            <a class="text-link" href="{{ route('portfolio.show', ['slug' => $project['slug']]) }}">Baca studi kasus</a>
            @if (! empty($project['url']))
                <a class="text-link text-link--external" href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">{{ $project['url_label'] }}<span aria-hidden="true"> ↗</span><span class="sr-only"> (membuka tab baru)</span></a>
            @endif
        </div>
    </div>
</article>
