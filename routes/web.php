<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\MarketController;

Route::get('/', [PageController::class, 'home']);
Route::get('/service', [PageController::class, 'service']);
Route::get('/how-it-works', [PageController::class, 'how']);
Route::get('/sample-report', [PageController::class, 'sample']);
Route::get('/pricing', [PageController::class, 'pricing']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/legal', [PageController::class, 'legal']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/intake', [PageController::class, 'intake']);
Route::get('/market-returns', [MarketController::class, 'returns']);
