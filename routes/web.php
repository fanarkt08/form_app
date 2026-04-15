<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GiftController;

Route::resource('gifts', GiftController::class);

Route::get('/', function () {
    return redirect()->route('gifts.index');
});
