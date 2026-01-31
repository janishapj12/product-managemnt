<?php

use App\Http\Controllers\InternController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('interns.index');
});

Route::resource('interns', InternController::class)->except(['show']);
