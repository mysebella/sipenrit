<?php

use App\Http\Controllers\Api\DocumentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/document/{id}', [DocumentController::class, 'get']);
