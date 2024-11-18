<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangelogController;

Route::group(['middleware' => 'auth'], function () {
    Route::get('changelog/{language}', [ChangelogController::class, 'index'])->name('changelog');
});
