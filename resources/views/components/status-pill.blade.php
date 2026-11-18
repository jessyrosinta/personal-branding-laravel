@props(['status'])
@php
    $isOnline = $status === 'Online';
@endphp
<span class="status-pill {{ $isOnline ? 'status-pill--online' : 'status-pill--concept' }}">
    <span class="status-pill__dot" aria-hidden="true"></span>{{ $status }}
</span>
