<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\About;
use App\Models\Team;
use App\Models\Service;
use App\Models\DetailedService;
use App\Http\Controllers\ContactController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/company', function () {
    return About::first();
});

Route::get('/team', function () {
    return Team::all();
});

Route::get('/services/{category}', function ($category) {
    return Service::where('category', $category)->get();
});

Route::get('/service/{slug}', function ($slug) {
    return DetailedService::where('slug', $slug)->first();
});

Route::post('/contact', [ContactController::class, 'store']);