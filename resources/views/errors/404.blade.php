@extends('layouts.app')

@section('title', 'Halaman tidak ditemukan')

@section('content')
<x-page-hero
    title="Halaman tidak ditemukan"
    text="Alamat yang Anda buka tidak ada atau sudah dipindahkan. Coba kembali ke beranda atau lihat portofolio." />

<section class="section section--tight">
    <div class="container not-found">
        <x-button :href="route('home')">Kembali ke beranda</x-button>
        <x-button :href="route('portfolio')" variant="ghost">Lihat portofolio</x-button>
    </div>
</section>
@endsection
