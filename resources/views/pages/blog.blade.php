@extends('layouts.app')

@section('title', 'Blog')
@section('meta_description', 'Catatan belajar tentang Laravel, desain alur kerja, dan pengelolaan data.')

@section('content')
<x-page-hero
    title="Blog"
    text="Catatan tentang belajar pemrograman, merancang alur yang mudah dipakai, dan melihat persoalan kerja dari sudut pandang data." />

<section class="section section--tight">
    <div class="container">
        <div class="filter-bar" data-filter-bar data-target="article-list" hidden>
            <p class="filter-bar__label" id="filter-label">Kategori</p>
            <div role="group" aria-labelledby="filter-label">
                <button type="button" class="filter-bar__button is-active" data-filter-value="all" aria-pressed="true">Semua</button>
                @foreach ($categories as $category)
                    <button type="button" class="filter-bar__button" data-filter-value="{{ $category }}" aria-pressed="false">{{ $category }}</button>
                @endforeach
            </div>
        </div>

        <div class="article-grid" id="article-list">
            @forelse ($articles as $article)
                <x-article-card :article="$article" />
            @empty
                <p>Artikel belum tersedia.</p>
            @endforelse
        </div>
    </div>
</section>
@endsection
