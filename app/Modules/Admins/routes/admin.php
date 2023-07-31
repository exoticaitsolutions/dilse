<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
// use App\Modules\Admins\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->group(function(){
    Route::middleware(['web', 'admin.auth', 'admin.verified'])->group(function(){
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('banner', BannerController::class);
    });
});
// Route::middleware(['web', 'admin.auth', 'admin.verified'])->get('/admin', function () {
//     return view('admin.dashboard');
// })->name('admin.dashboard');

// Route::group(['as' => 'admin.', 'prefix' => '/admin', 'middleware' => ['web', 'admin.auth']], function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__.'/auth.php';
