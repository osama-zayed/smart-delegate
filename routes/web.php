<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Kreait\Firebase\Exception\AuthException;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Support\Facades\Route;



Route::get('/login', [App\Http\Controllers\Auth\LoginController::class, 'showFormLogin'])->name('showFormLogin');
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::post('/login', [App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login');
// 
Route::middleware(middleware: ['firebase.auth'])->group(function () {
    // Dashboard Routes
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    // User Management Routes
    Route::resource('user', App\Http\Controllers\UserController::class);

    // Room Management Routes
    Route::resource('rooms', App\Http\Controllers\RoomController::class);

    // Content Management Routes
    Route::resource('posts', App\Http\Controllers\PostController::class);

    // Notification Routes
    Route::resource('notifications', App\Http\Controllers\NotificationController::class);

    // Questionnaire Routes
    Route::resource('proposals', App\Http\Controllers\ProposalController::class);

    // Settings Routes
    Route::get('/settings/profile', [App\Http\Controllers\SettingController::class, 'profile'])->name('settings.profile');
    Route::put('/settings/update-password', [App\Http\Controllers\SettingController::class, 'updatePassword'])->name('settings.password.update');

    // Search & Utility Routes
    Route::get('/search', [App\Http\Controllers\HomeController::class, 'searchById'])->name('searchById');
});







Route::get('/test', [TestController::class, 'testFirestore']);

