@extends('layouts.app')

@section('title', 'Kontak')
@section('meta_description', 'Hubungi '.$profile['name'].' untuk diskusi, kolaborasi, atau kesempatan magang.')

@section('content')
@php
    // Menampilkan alamat tanpa "https://" dan "www." agar mudah dibaca.
    $readable = fn (string $url): string => preg_replace('#^https?://(www\.)?#', '', rtrim($url, '/'));
@endphp

<x-page-hero title="Kontak" :text="$profile['available_for']" />

<section class="section section--tight">
    <div class="container contact">
        <div class="contact__main">
            <h2>Cara menghubungi saya</h2>

            <ul class="contact-list">
                <li class="contact-row">
                    <div>
                        <p class="contact-row__label">Email</p>
                        <p class="contact-row__value" id="email-value">{{ $profile['contact']['email'] }}</p>
                    </div>
                    <div class="contact-row__actions">
                        <a class="text-link" href="mailto:{{ $profile['contact']['email'] }}">Kirim email</a>
                        <button type="button" class="copy-button" data-copy-target="email-value" hidden>Salin alamat</button>
                    </div>
                </li>
                <li class="contact-row">
                    <div>
                        <p class="contact-row__label">GitHub</p>
                        <p class="contact-row__value">{{ $readable($profile['contact']['github']) }}</p>
                    </div>
                    <a class="text-link text-link--external" href="{{ $profile['contact']['github'] }}" target="_blank" rel="noopener noreferrer">Buka GitHub<span aria-hidden="true"> ↗</span><span class="sr-only"> (membuka tab baru)</span></a>
                </li>
                <li class="contact-row">
                    <div>
                        <p class="contact-row__label">LinkedIn</p>
                        <p class="contact-row__value">{{ $readable($profile['contact']['linkedin']) }}</p>
                    </div>
                    <a class="text-link text-link--external" href="{{ $profile['contact']['linkedin'] }}" target="_blank" rel="noopener noreferrer">Buka LinkedIn<span aria-hidden="true"> ↗</span><span class="sr-only"> (membuka tab baru)</span></a>
                </li>
            </ul>
        </div>

        <aside class="contact__side">
            <h2>Lihat langsung hasil kerjanya</h2>
            <p>Dua sistem berikut sudah online. Halaman login bisa dibuka siapa saja.</p>
            <ul class="contact-list contact-list--compact">
                @foreach ($liveProjects as $project)
                    <li class="contact-row">
                        <div>
                            <p class="contact-row__label">{{ $project['title'] }}</p>
                            <p class="contact-row__value">{{ $project['url_label'] }}</p>
                        </div>
                        <a class="text-link text-link--external" href="{{ $project['url'] }}" target="_blank" rel="noopener noreferrer">Kunjungi<span aria-hidden="true"> ↗</span><span class="sr-only"> (membuka tab baru)</span></a>
                    </li>
                @endforeach
            </ul>
            <p class="contact__location">Berdomisili di {{ $profile['location'] }}.</p>
        </aside>
    </div>
</section>
@endsection
