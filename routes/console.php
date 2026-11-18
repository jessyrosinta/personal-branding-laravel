<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Belajar Laravel, satu halaman demi satu halaman.');
})->purpose('Show a short encouragement');
