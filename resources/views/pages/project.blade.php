@extends('layouts.app')

@section('title', $project['title'])
@section('meta_description', $project['description'])

@section('content')
<section class="case-hero">
    <div class="container">
        <a class="back-link" href="{{ route('portfolio') }}">Kembali ke portofolio</a>

        <div class="case-hero__grid">
            <div>
                <x-status-pill :status="$project['status']" />
                <h1>{{ $project['title'] }}</h1>
                <p class="case-hero__full">{{ $project['full_title'] }}</p>
                <p class="case-hero__lead">{{ $project['subtitle'] }}</p>

                @if (! empty($project['url']))
                    <x-button :href="$project['url']" :external="true">Kunjungi {{ $project['url_label'] }}</x-button>
                @endif
            </div>

            <dl class="case-hero__facts">
                <div><dt>Peran</dt><dd>{{ $project['role'] }}</dd></div>
                @if (! empty($project['origin']))
                    <div><dt>Asal mula</dt><dd>{{ $project['origin'] }}</dd></div>
                @endif
                @if (! empty($project['organization']))
                    <div><dt>Organisasi</dt><dd>{{ $project['organization'] }}</dd></div>
                @endif
                <div><dt>Tahun</dt><dd>{{ $project['year'] }}</dd></div>
                <div><dt>Jenis</dt><dd>{{ $project['category'] }}</dd></div>
            </dl>
        </div>
    </div>
</section>

<div class="container case-banner" style="background: {{ $project['image_bg'] }}">
    <img src="{{ asset($project['image']) }}" alt="Ilustrasi tampilan {{ $project['title'] }}" width="640" height="480">
</div>

<div class="container case">
    @if (! empty($project['access_note']))
        <p class="callout">{{ $project['access_note'] }}</p>
    @endif

    @if (! empty($project['facts']))
        <dl class="case-facts">
            @foreach ($project['facts'] as $fact)
                <div>
                    <dt>{{ $fact['value'] }}</dt>
                    <dd>{{ $fact['label'] }}</dd>
                </div>
            @endforeach
        </dl>
    @endif

    <section class="case__split">
        <div>
            <h2>Masalah yang dihadapi</h2>
            @foreach ($project['problem'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
        <div>
            <h2>Cara menjawabnya</h2>
            @foreach ($project['solution'] as $paragraph)
                <p>{{ $paragraph }}</p>
            @endforeach
        </div>
    </section>

    <section class="case__section" aria-labelledby="fitur-heading">
        <h2 id="fitur-heading">Fitur utama</h2>
        <dl class="feature-grid">
            @foreach ($project['features'] as $feature)
                <div>
                    <dt>{{ $feature['title'] }}</dt>
                    <dd>{{ $feature['text'] }}</dd>
                </div>
            @endforeach
        </dl>
    </section>

    @if (! empty($project['access']))
        <section class="case__section" aria-labelledby="peran-heading">
            <h2 id="peran-heading">{{ $project['access_title'] }}</h2>
            <table class="role-table">
                <thead>
                    <tr><th scope="col">Peran</th><th scope="col">Yang bisa dikerjakan</th></tr>
                </thead>
                <tbody>
                    @foreach ($project['access'] as $role)
                        <tr><th scope="row">{{ $role['name'] }}</th><td>{{ $role['text'] }}</td></tr>
                    @endforeach
                </tbody>
            </table>
        </section>
    @endif

    <section class="case__section" aria-labelledby="teknologi-heading">
        <h2 id="teknologi-heading">Teknologi dan keahlian</h2>
        <ul class="tag-list">
            @foreach ($project['technologies'] as $technology)
                <x-tag :label="$technology" />
            @endforeach
        </ul>
    </section>

    @if (! empty($project['roadmap']))
        <section class="case__section" aria-labelledby="roadmap-heading">
            <h2 id="roadmap-heading">{{ $project['roadmap_title'] }}</h2>
            <ul class="check-list">
                @foreach ($project['roadmap'] as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </ul>
        </section>
    @endif

    <div class="case__end">
        <x-button :href="route('portfolio')" variant="ghost">Lihat proyek lainnya</x-button>
    </div>
</div>
@endsection
