<?php

use App\Http\Controllers\Modules\Project\ProjectLandManagementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Route::post('/add-project', [ProjectSetupController::class, 'store']);
Route::post('/add-land-acquisition', [ProjectLandManagementController::class, 'addLandAcquisition']);
