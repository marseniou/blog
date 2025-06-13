<?php
// routes/web.php

use App\Http\Middleware\SetLocale;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LanguageController;
Route::get('/', function () {
    return redirect()->route('home', ['locale' => 'en']);
});
Route::prefix('{locale}')->where(['locale' => 'en|el'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::get('/page/{page}', [PageController::class, 'single'])->name('page.single');
    Route::get('/members', [MemberController::class, 'grid'])->name('members');
    Route::get('/member/{member}', [MemberController::class, 'single'])->name('member.single');
    Route::get('/category/{category}', [CategoryController::class, 'single'])->name('page.category');
});

Route::get('/switch/{locale}', [LanguageController::class, 'switch'])->name('language.switch');

// Redirect root to default language




