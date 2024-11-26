<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;  // Import the Vehicle model
use Illuminate\Http\Request;

class TemplateController extends Controller
{
    // Method for home page (first page displayed)
    public function index()
    {
        return view('frontend.home');
    }

    // Method for vehicle data table page
    public function showVehicles()
    {
        // Get all vehicles from the database
        $vehicles = Vehicle::all();  // Fetch the vehicles

        // Pass the vehicles data to the view
        return view('frontend.table', compact('vehicles'));  // Make sure to pass it here
    }
}

