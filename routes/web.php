<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\FrontHomeController;
use App\Http\Middleware\TrackVisitor;
use App\Http\Controllers\Backend\LoginController;
use App\Http\Controllers\Backend\ForgotPasswordController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BannerController;
use App\Http\Controllers\Backend\AwardsController;
use App\Http\Controllers\Backend\PageController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\CacheController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\GalleryController;
use App\Http\Controllers\Backend\CoursesController;

Route::get('/', [FrontHomeController::class, 'home'])->name('home');
Route::get('gallery', [FrontHomeController::class, 'gallery'])->name('gallery');
Route::get('about-us', [FrontHomeController::class, 'aboutUs'])->name('about-us');
Route::get('founders-message', [FrontHomeController::class, 'foundersMessage'])->name('founders-message');
Route::get('contact-us', [FrontHomeController::class, 'contactUs'])->name('contact-us');
Route::get('courses', [FrontHomeController::class, 'coursesList'])->name('courses');
Route::get('courses/{slug}', [FrontHomeController::class, 'courseDetails'])->name('courses.details');
Route::get('terms-of-use', [FrontHomeController::class, 'termsOfUse'])->name('terms-of-use');
Route::get('privacy-policy', [FrontHomeController::class, 'privacyPolicy'])->name('privacy-policy');


Route::prefix('admin')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm']);
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('forget/password', [ForgotPasswordController::class, 'showForgetPasswordForm'])->name('forget.password');
    Route::post('forget.password', [ForgotPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.submit');

    Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
    Route::post('reset-password', [ForgotPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::group(['middleware' => ['auth']], function() {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/get-daily-visitors', [DashboardController::class, 'getDailyVisitors'])->name('get-daily-visitors');   
    Route::resource('manage-banner', BannerController::class)->names('manage-banner');
    Route::resource('manage-awards', AwardsController::class)->names('manage-awards');
    Route::resource('manage-blog', BlogController::class)->names('manage-blog');    
    Route::resource('manage-gallery', GalleryController::class)->names('manage-gallery');
    Route::resource('manage-courses', CoursesController::class)->names('manage-courses');
    Route::get('/clear-cache', [CacheController::class, 'clearCache'])->name('clear-cache');
    Route::resource('pages', PageController::class);
    Route::resource('menus', MenuController::class);
    Route::get('menu/items/{menu}', [MenuController::class, 'displayMenuItem'])->name('menus.items');
    Route::post('menu/{menu}/item', [MenuController::class, 'storeItem'])->name('menu.item.store');
    
    Route::get('menu/{menu}/item/{item}/edit', [MenuController::class, 'editItem'])
    ->name('menu.item.edit');
    Route::put('menu/{menu}/item/{item}', [MenuController::class, 'updateItem'])->name('menu.item.update');
    Route::delete('menu/{menu}/item/{item}', [MenuController::class, 'destroyItem'])->name('menu.item.destroy');
    Route::post('menus/{menu}/items/order', [MenuController::class, 'orderItems'])->name('menus.items.order');
});
