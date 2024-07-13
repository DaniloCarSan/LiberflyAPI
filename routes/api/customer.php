<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('customers/{id}',[App\Http\Controllers\Api\Customer\SelectController::class,'execute'])->where('id','[0-9]+');
Route::middleware('auth:sanctum')->get('customers',[App\Http\Controllers\Api\Customer\ListController::class,'execute']);

