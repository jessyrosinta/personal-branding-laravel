@props([
    'href' => '#',
    'variant' => 'primary',
    'external' => false,
])
<a class="btn btn--{{ $variant }}" href="{{ $href }}" @if ($external) target="_blank" rel="noopener noreferrer" @endif>
    {{ $slot }}
    @if ($external)
        <span class="btn__icon" aria-hidden="true">↗</span>
        <span class="sr-only">(membuka tab baru)</span>
    @endif
</a>
