@extends('layouts.app')

@section('title', 'Tentang')
@section('meta_description', $profile['summary'])

@section('content')
<x-page-hero title="Tentang saya" :text="$profile['summary']" />

<section class="section section--tight">
    <div class="container about">
        <aside class="about__card">
            <img class="about__avatar" src="{{ asset('assets/img/avatar.svg') }}" alt="Avatar {{ $profile['name'] }}" width="160" height="160">
            <h2>{{ $profile['name'] }}</h2>
            <p>{{ $profile['role'] }}</p>
            <dl class="about__facts">
                <div><dt>Lokasi</dt><dd>{{ $profile['location'] }}</dd></div>
                <div><dt>Terbuka untuk</dt><dd>{{ $profile['available_for'] }}</dd></div>
            </dl>
            <x-button :href="route('contact')">Hubungi saya</x-button>
        </aside>

        <div class="about__content">
            <section class="about__block" aria-labelledby="profil-heading">
                <h2 id="profil-heading">Profil singkat</h2>
                <p>{{ $profile['description'] }}</p>
            </section>

            <section class="about__block" aria-labelledby="pendidikan-heading">
                <h2 id="pendidikan-heading">Pendidikan dan latar belakang</h2>
                <ul class="record-list">
                    @foreach ($profile['education'] as $item)
                        <li class="record">
                            <p class="record__period">{{ $item['period'] }}</p>
                            <div>
                                <h3>{{ $item['title'] }}</h3>
                                <p>{{ $item['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>

            <section class="about__block" aria-labelledby="pengalaman-heading">
                <h2 id="pengalaman-heading">Pengalaman dan pencapaian</h2>
                <ul class="record-list">
                    @foreach ($profile['experience'] as $item)
                        <li class="record">
                            <p class="record__period">{{ $item['period'] }}</p>
                            <div>
                                <h3>{{ $item['title'] }}</h3>
                                <p class="record__org">{{ $item['org'] }}</p>
                                <p>{{ $item['text'] }}</p>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </section>

            <section class="about__block" aria-labelledby="sertifikasi-heading">
                <h2 id="sertifikasi-heading">Sertifikasi</h2>
                <ul class="check-list">
                    @foreach ($profile['certifications'] as $certification)
                        <li>{{ $certification }}</li>
                    @endforeach
                </ul>
            </section>

            <section class="about__block" aria-labelledby="keahlian-heading">
                <h2 id="keahlian-heading">Keahlian</h2>
                <div class="skill-groups">
                    @foreach ($profile['skill_groups'] as $group)
                        <div class="skill-group">
                            <h3>{{ $group['group'] }}</h3>
                            <ul>
                                @foreach ($group['items'] as $skill)
                                    <li>{{ $skill }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endforeach
                </div>
            </section>
        </div>
    </div>
</section>
@endsection
