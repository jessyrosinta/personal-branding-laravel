@extends('layouts.app')

@section('title', $article['title'])
@section('meta_description', $article['excerpt'])

@section('content')
@php
    $published = \Illuminate\Support\Carbon::parse($article['date'])->translatedFormat('j F Y');
@endphp

<div class="reading-progress" data-reading-progress aria-hidden="true"></div>

<article class="post">
    <header class="container container--narrow post__header">
        <a class="back-link" href="{{ route('blog.index') }}">Kembali ke blog</a>
        <p class="post__meta">
            <span class="article-card__category">{{ $article['category'] }}</span>
            <time datetime="{{ $article['date'] }}">{{ $published }}</time>
            <span>{{ $article['reading_time'] }} baca</span>
        </p>
        <h1>{{ $article['title'] }}</h1>
        <p class="post__lead">{{ $article['excerpt'] }}</p>
    </header>

    <div class="container container--wide">
        <img class="post__banner" src="{{ asset($article['image']) }}" alt="Ilustrasi untuk artikel {{ $article['title'] }}" width="640" height="420">
    </div>

    <div class="container container--narrow post__body">
        @foreach ($article['content'] as $paragraph)
            <p>{{ $paragraph }}</p>
        @endforeach
    </div>
</article>

@if (count($otherArticles) > 0)
    <section class="section section--sheet">
        <div class="container">
            <x-section-heading title="Baca juga" :href="route('blog.index')" link-label="Semua artikel" />
            <div class="article-grid article-grid--two">
                @foreach ($otherArticles as $other)
                    <x-article-card :article="$other" />
                @endforeach
            </div>
        </div>
    </section>
@endif
@endsection
