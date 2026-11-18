<?php

namespace App\Providers;

use App\Support\ContentRepository;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Tanggal artikel ditampilkan dengan nama bulan bahasa Indonesia
        // (misalnya "12 November 2026") mengikuti APP_LOCALE di file .env.
        Carbon::setLocale(config('app.locale'));

        // Data yang dibutuhkan hampir semua halaman (navbar, footer, halaman error)
        // dibagikan sekali di sini, sehingga Controller hanya mengirim data
        // yang khusus untuk halamannya.
        $content = app(ContentRepository::class);

        View::share('profile', $content->profile());
        View::share('liveProjects', $content->projects('live'));
    }
}
