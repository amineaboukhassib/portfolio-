<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VisitorController;

// ── Public Routes ─────────────────────────────────────────────
Route::get('/', [PortfolioController::class, 'index'])->name('home');

// ── API-style Routes (AJAX) ──────────────────────────────────
Route::get('/api/projects', [ProjectController::class, 'index'])->name('api.projects');
Route::post('/api/contact', [ContactController::class, 'store'])->name('api.contact');
Route::post('/api/visitors', [VisitorController::class, 'store'])->name('api.visitors');

// ── Admin Routes ──────────────────────────────────────────────
Route::prefix('admin')->group(function () {
    Route::get('/login',  [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');

    Route::middleware(\App\Http\Middleware\AdminAuth::class)->group(function () {
        Route::get('/dashboard',             [AdminController::class, 'dashboard'])->name('admin.dashboard');
        Route::post('/projects',             [AdminController::class, 'storeProject'])->name('admin.projects.store');
        Route::put('/projects/{id}',         [AdminController::class, 'updateProject'])->name('admin.projects.update');
        Route::delete('/projects/{id}',      [AdminController::class, 'destroyProject'])->name('admin.projects.destroy');
        Route::post('/messages/{id}/read',   [AdminController::class, 'markRead'])->name('admin.messages.read');
        Route::post('/logout',               [AdminController::class, 'logout'])->name('admin.logout');
    });
});
