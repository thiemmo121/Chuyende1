<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment('Stay focused and keep building.');
})->purpose('Display an inspiring quote');
