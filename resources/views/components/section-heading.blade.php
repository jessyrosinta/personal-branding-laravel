@props(['title', 'text' => null, 'href' => null, 'linkLabel' => null])
<div class="section-heading">
    <div class="section-heading__main">
        <h2>{{ $title }}</h2>
        @if ($text)
            <p>{{ $text }}</p>
        @endif
    </div>
    @if ($href)
        <a class="text-link" href="{{ $href }}">{{ $linkLabel }}</a>
    @endif
</div>
