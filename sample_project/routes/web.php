<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TemplateController;   
use App\Http\Controllers\VehicleController;

//Route::get('/', function () {
  //  return view('welcome');
//});


// Route for TemplateController (homepage or master page)
Route::get('/', [TemplateController::class, 'index']);

Route::get('/vehicles', [TemplateController::class, 'showVehicles'])->name('vehicles.index');

// Route for VehicleController - Display all vehicles
//Route::get('/vehicles', [VehicleController::class, 'index'])->name('vehicles.index');

// Route for VehicleController - Delete a vehicle by ID
Route::delete('/vehicles/{id}', [VehicleController::class, 'destroy'])->name('vehicles.destroy');

// Route for VehicleController - Display total users and vehicles
Route::get('/total', [VehicleController::class, 'indexTotal'])->name('vehicles.total');
