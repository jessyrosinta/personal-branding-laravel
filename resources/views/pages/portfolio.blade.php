@extends('layouts.app')

@section('title', 'Portofolio')
@section('meta_description', 'Sistem yang sudah online dan studi kasus perancangan oleh '.$profile['name'].'.')

@section('content')
<x-page-hero
    title="Portofolio"
    text="Dua sistem yang sudah berjalan di lingkungan kerja saya, ditambah studi kasus perancangan yang saya kerjakan untuk belajar." />

<section class="section section--tight">
    <div class="container">
        {{-- Tombol filter disembunyikan sampai JavaScript aktif, jadi tanpa JS semua proyek tetap tampil --}}
        <div class="filter-bar" data-filter-bar data-target="project-list" hidden>
            <p class="filter-bar__label" id="filter-label">Tampilkan</p>
            <div role="group" aria-labelledby="filter-label">
                <button type="button" class="filter-bar__button is-active" data-filter-value="all" aria-pressed="true">Semua ({{ count($projects) }})</button>
                <button type="button" class="filter-bar__button" data-filter-value="live" aria-pressed="false">Sudah online ({{ count(array_filter($projects, fn ($p) => $p['type'] === 'live')) }})</button>
                <button type="button" class="filter-bar__button" data-filter-value="study" aria-pressed="false">Studi kasus ({{ count(array_filter($projects, fn ($p) => $p['type'] === 'study')) }})</button>
            </div>
        </div>

        <div class="project-list" id="project-list">
            @forelse ($projects as $project)
                <x-project-card :project="$project" />
            @empty
                <p>Portofolio belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
