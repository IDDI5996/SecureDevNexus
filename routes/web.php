<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CareersController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    $services = App\Models\Service::all();
    $portfolio = App\Models\PortfolioItem::all();
    $team = App\Models\TeamMember::all();
    
    return view('welcome', compact('services', 'portfolio', 'team'));
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Services
Route::get('/services', [ServiceController::class, 'index'])->name('services');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('service.show');

// Portfolio
Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio');
Route::get('/portfolio/{id}', [PortfolioController::class, 'show'])->name('portfolio.show');

// Contact
Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/team', [TeamController::class, 'index'])->name('team');

Route::get('/blog', [BlogController::class, 'index'])->name('blog');

Route::get('/careers', [CareersController::class, 'index'])->name('careers');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'verified', \App\Http\Middleware\AdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    // Service Management
    Route::get('/services', [AdminController::class, 'services'])->name('admin.services');
    Route::post('/services', [AdminController::class, 'storeService'])->name('admin.services.store');
    Route::put('/services/{id}', [AdminController::class, 'updateService'])->name('admin.services.update');
    Route::delete('/services/{id}', [AdminController::class, 'deleteService'])->name('admin.services.delete');
    
    // Portfolio Management
    Route::get('/portfolio', [AdminController::class, 'portfolio'])->name('admin.portfolio');
    Route::post('/portfolio', [AdminController::class, 'storePortfolio'])->name('admin.portfolio.store');
    Route::put('/portfolio/{id}', [AdminController::class, 'updatePortfolio'])->name('admin.portfolio.update');
    Route::delete('/portfolio/{id}', [AdminController::class, 'deletePortfolio'])->name('admin.portfolio.delete');
    
    // Team Management
    Route::get('/team', [AdminController::class, 'team'])->name('admin.team');
    Route::post('/team', [AdminController::class, 'storeTeam'])->name('admin.team.store');
    Route::put('/team/{id}', [AdminController::class, 'updateTeam'])->name('admin.team.update');
    Route::delete('/team/{id}', [AdminController::class, 'deleteTeam'])->name('admin.team.delete');
});

// Super Admin Only Routes
Route::middleware(['auth', 'verified', \App\Http\Middleware\SuperAdminMiddleware::class])->prefix('super-admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'superDashboard'])->name('super.admin.dashboard');
    Route::get('/users', [SuperAdminUserController::class, 'index'])->name('superadmin.users');
    Route::get('/settings', [SuperAdminSettingController::class, 'index'])->name('superadmin.settings');
    Route::get('/reports', [SuperAdminReportController::class, 'index'])->name('superadmin.reports');
    // Add other super admin specific routes here
});

require __DIR__.'/auth.php';