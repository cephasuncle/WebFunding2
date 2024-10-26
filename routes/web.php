<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/campaigns', [CampaignController::class, 'index'])->name('campaigns.index'); // List of campaigns
Route::get('/campaigns/create', [CampaignController::class, 'create'])->name('campaigns.create'); // Create campaign form
Route::post('/campaigns', [CampaignController::class, 'store'])->name('campaigns.store'); // Store new campaign
Route::get('/campaigns/{id}', [CampaignController::class, 'show'])->name('campaigns.show'); // Campaigns details
Route::post('/campaigns/{id}/contribute', [CampaignController::class, 'contribute'])->name('campaigns.contribute'); // Contribute to a campaign


require __DIR__.'/auth.php';
