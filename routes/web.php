<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GtrController;
use App\Http\Controllers\GtrComparisonController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboard;
use App\Http\Controllers\Admin\GtrController as AdminGtr;
use App\Http\Controllers\Admin\ReviewController as AdminReview;
use App\Http\Controllers\Admin\UserController as AdminUser;
use Illuminate\Support\Facades\Route;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/gtr', [GtrController::class, 'index'])->name('gtr.index');
Route::get('/gtr/{gtrModel:slug}', [GtrController::class, 'show'])->name('gtr.show');

Route::get('/history', [GtrController::class, 'history'])->name('gtr.history');

Route::get('/compare', [GtrComparisonController::class, 'index'])->name('gtr.compare');

Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');

Route::get('/reviews', [ReviewController::class, 'index'])->name('reviews.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// NISMO Page
Route::get('/nismo', function () {
    $nismoModels = \App\Models\GtrModel::active()->nismo()->with('approvedReviews')->get();
    return view('nismo', compact('nismoModels'));
})->name('nismo');

// Authenticated Routes
Route::middleware('auth')->group(function () {
    Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');
    Route::get('/reviews/{review}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::put('/reviews/{review}', [ReviewController::class, 'update'])->name('reviews.update');
    Route::delete('/reviews/{review}', [ReviewController::class, 'destroy'])->name('reviews.destroy');

    Route::post('/favorites/{gtrModel}', [FavoriteController::class, 'toggle'])->name('favorites.toggle');
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [AdminDashboard::class, 'index'])->name('dashboard');

    Route::resource('gtr', AdminGtr::class)->except(['show']);
    Route::post('gtr/{gtrModel}/gallery', [AdminGtr::class, 'uploadGallery'])->name('gtr.gallery.upload');
    Route::delete('gtr/gallery/{gallery}', [AdminGtr::class, 'destroyGallery'])->name('gtr.gallery.destroy');

    Route::get('reviews', [AdminReview::class, 'index'])->name('reviews.index');
    Route::post('reviews/{review}/approve', [AdminReview::class, 'approve'])->name('reviews.approve');
    Route::post('reviews/{review}/reject', [AdminReview::class, 'reject'])->name('reviews.reject');
    Route::delete('reviews/{review}', [AdminReview::class, 'destroy'])->name('reviews.destroy');

    Route::get('users', [AdminUser::class, 'index'])->name('users.index');
    Route::post('users/{user}/toggle-admin', [AdminUser::class, 'toggleAdmin'])->name('users.toggle-admin');
    Route::delete('users/{user}', [AdminUser::class, 'destroy'])->name('users.destroy');
});

require __DIR__.'/auth.php';
