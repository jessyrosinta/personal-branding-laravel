@props(['title', 'text' => null])
<section class="page-hero">
    <div class="container">
        <h1>{{ $title }}</h1>
        @if ($text)
            <p class="page-hero__text">{{ $text }}</p>
        @endif
    </div>
</section>
