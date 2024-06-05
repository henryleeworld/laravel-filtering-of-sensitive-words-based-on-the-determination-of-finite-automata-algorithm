<?php

use App\Http\Controllers\FilteringController;
use Illuminate\Support\Facades\Route;

Route::get('/filter', [FilteringController::class, 'index']);
