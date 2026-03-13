<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\ContactQuery;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\DetailedServiceController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $queries = ContactQuery::latest()->get();
    return view('dashboard', compact('queries'));
})->middleware(['auth'])->name('admin.dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/admin/query/{id}', function ($id) {
    ContactQuery::findOrFail($id)->delete();
    return redirect()->route('admin.dashboard');
})->name('admin.query.delete');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/team', [TeamController::class, 'index'])->name('admin.team');
    Route::post('/team/store', [TeamController::class, 'store'])->name('admin.team.store');
    Route::delete('/team/{id}', [TeamController::class, 'destroy'])->name('admin.team.delete');

});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/about', [AboutController::class, 'index'])->name('admin.about');
    Route::post('/about/update', [AboutController::class, 'update'])->name('admin.about.update');

});

Route::middleware('auth')->prefix('admin')->group(function () {

    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');

    Route::post('/services/store', [ServiceController::class, 'store'])->name('admin.services.store');

    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('admin.services.delete');

});

Route::middleware('auth')->prefix('admin')->group(function () {

Route::get(
'/detailed-services',
[DetailedServiceController::class,'index']
)->name('admin.detailed.services');

Route::post(
'/detailed-services/store',
[DetailedServiceController::class,'store']
)->name('admin.detailed.services.store');

});

Route::get('/{any}', function () {
    return view('welcome');
})
->where('any', '^(?!admin|login|register|dashboard).*$');