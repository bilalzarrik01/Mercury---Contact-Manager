<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\ContactController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard', [
        'groupCount' => \App\Models\Group::count(),
        'contactCount' => \App\Models\Contact::count(),
        'withPhoneCount' => \App\Models\Contact::whereNotNull('phone')->count(),
    ]);
})->name('dashboard');
Route::resource('groups', GroupController::class)->except(['show']);
Route::resource('contacts', ContactController::class)->except(['show']);
