<?php

use App\Http\Controllers\ContentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Models\Content;
use App\Models\Service;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', [
        'content' => Content::all(),
        "services" => Service::all()
    ]);
})->name('landing');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware('auth')->group(function () {
    // content
    Route::get("/content/{content}", [ContentController::class, 'edit'])->name('content.edit');
    Route::patch("/content/{content}", [ContentController::class, 'update'])->name('content.update');

    // service
    Route::get("/service/{service}", [ServiceController::class, 'edit'])->name("service.edit");
    Route::patch("/service/{service}", [ServiceController::class, 'update'])->name("service.update");
});

require __DIR__ . '/auth.php';
