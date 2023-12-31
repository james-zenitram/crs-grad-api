<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ActivityController;
use App\Http\Controllers\UpdateBlockController;
use App\Http\Controllers\ActivityShowController;
use App\Http\Controllers\BlockController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::post('login', [UserController::class,'login']);
Route::post('activities', [ActivityController::class, 'store']);
Route::get('activities', [ActivityController::class, 'show']);
Route::put('activitiesupdate/{id}', [ActivityController::class, 'update']);
Route::get('block/{id}', [BlockController::class, 'show']);
Route::put('updateblock/{id}', [UpdateBlockController::class, 'updateblock']);


