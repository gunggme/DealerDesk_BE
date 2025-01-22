<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TableDataController;
use App\Http\Controllers\PresetDataController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// 프리셋 관련
Route::options('/save-preset-datas', function() {
    return response()->json([], 200)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST, OPTIONS')
        ->header('Access-Control-Allow-Headers', 'Content-Type, Authorization');
});

Route::get('/preset-datas', [PresetDataController::class, 'index']);
Route::post('/save-preset-datas', [PresetDataController::class, 'store']);

// 테이블 관련
Route::get('/table-datas', [TableDataController::class, 'index']);
Route::post('/save-table-datas', [TableDataController::class, 'store']);