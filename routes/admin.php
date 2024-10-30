<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\BrandmodelController;
use App\Http\Controllers\admin\VehicleController;
use App\Http\Controllers\admin\VehicleimagesController;

Route::get('', [AdminController::class, 'index']);
Route::resource('brands', BrandController::class)->names('admin.brands');
Route::resource('models', BrandmodelController::class)->names('admin.models');
Route::resource('vehicles', VehicleController::class)->names('admin.vehicles');
Route::resource('vehicleimages', VehicleimagesController::class)->names('admin.vehicleimages');
Route::get('modelsbybrand/{id}',[BrandmodelController::class,'modelsbybrand'])->name('admin.modelsbybrand');
Route::get('imageprofile/{id}/{vehicle_id}',[VehicleimagesController::class,'profile'])->name('admin.imageprofile');
