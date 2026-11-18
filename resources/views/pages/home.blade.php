@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
{{-- Hero: perkenalan dan contoh alur berkas TARA --}}
<section class="hero">
    <div class="container hero__grid">
        <div class="hero__copy">
            <div class="hero__who">
                <img class="avatar" src="{{ asset('assets/img/avatar.svg') }}" alt="Avatar {{ $profile['name'] }}" width="64" height="64">
                <p><strong>{{ $profile['name'] }}</strong><span>{{ $profile['role'] }}</span></p>
            </div>

            <h1>{{ $profile['headline'] }}</h1>
            <p class="hero__lead">{{ $profile['tagline'] }}</p>

            <div class="hero__actions">
                <x-button :href="route('portfolio')">Lihat karya saya</x-button>
                <x-button :href="route('about')" variant="ghost">Tentang saya</x-button>
            </div>

            <div class="hero__facts">
                <div>
                    <p class="hero__facts-title">Bidang yang saya tekuni</p>
                    <ul class="tag-list tag-list--plain">
                        @foreach ($profile['focus'] as $focus)
                            <x-tag :label="$focus" />
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="hero__facts-title">Sudah online</p>
                    <ul class="live-links">
                        @foreach ($liveProjects as $project)
                            <li>
                                <a href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">
                                    <span class="live-links__dot" aria-hidden="true"></span>{{ $project['url_label'] }}<span class="sr-only"> (membuka tab baru)</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <aside class="dossier" aria-label="{{ $profile['hero_flow']['caption'] }}">
            <header class="dossier__head">
                <p class="dossier__title">{{ $profile['hero_flow']['document'] }}</p>
                <p class="dossier__caption">{{ $profile['hero_flow']['caption'] }}</p>
            </header>
            <ol class="dossier__steps">
                @foreach ($profile['hero_flow']['stages'] as $stage)
                    <li class="dossier__step" style="--i: {{ $loop->index }}">
                        <span class="dossier__check" aria-hidden="true"></span>
                        <div>
                            <p class="dossier__status">{{ $stage['status'] }}</p>
                            <p class="dossier__text"><strong>{{ $stage['actor'] }}</strong>. {{ $stage['text'] }}</p>
                        </div>
                    </li>
                @endforeach
            </ol>
            <div class="dossier__stamp" aria-hidden="true">Rampung</div>
        </aside>
    </div>
</section>

{{-- Karya pilihan: dua sistem yang sudah online --}}
<section class="section section--tight">
    <div class="container">
        <x-section-heading
            title="Dua sistem yang sudah berjalan"
            text="Keduanya saya bangun untuk persoalan kerja nyata di BNN, satu dengan PHP native dan satu dengan Laravel."
            :href="route('portfolio')"
            link-label="Lihat semua proyek" />

        <div class="feature-list">
            @foreach ($liveProjects as $project)
                <x-project-feature :project="$project" :flip="$loop->even" />
            @endforeach
        </div>
    </div>
</section>

{{-- Cara kerja: urutan langkah yang memang berurutan --}}
<section class="section section--sheet">
    <div class="container">
        <x-section-heading
            title="Cara saya mengerjakan sebuah sistem"
            text="Urutannya hampir selalu sama, dari memahami orang sampai memastikan sistemnya dipakai." />

        <ol class="steps">
            @foreach ($profile['process'] as $step)
                <li class="steps__item">
                    <span class="steps__number">{{ $loop->iteration }}</span>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['text'] }}</p>
                </li>
            @endforeach
        </ol>
    </div>
</section>

{{-- Tulisan terbaru --}}
<section class="section">
    <div class="container">
        <x-section-heading
            title="Tulisan terbaru"
            text="Catatan belajar tentang Laravel, desain alur, dan data."
            :href="route('blog.index')"
            link-label="Semua artikel" />

        <div class="article-grid article-grid--two">
            @foreach ($latestArticles as $article)
                <x-article-card :article="$article" />
            @endforeach
        </div>
    </div>
</section>
@endsection
