<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;   
use App\Http\Controllers\VehicleController;

//Route::get('/', function () {
  //  return view('welcome');
//});

 


route::get('/',[TemplateController::class, 'index']);
Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');