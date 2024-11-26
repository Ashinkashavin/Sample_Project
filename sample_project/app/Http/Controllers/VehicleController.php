<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehicle;
use App\Models\User;


class VehicleController extends Controller
{
        // View all vehicles and display the total number of users and vehicles
        public function index()
        {
            // Get all vehicles
            $vehicles = Vehicle::all();
    
            // Count total number of users and vehicles
            $totalUsers = User::count();
            $totalVehicles = Vehicle::count();
    
            // Return to the view with data
            //return view('vehicles.index', compact('vehicles', 'totalUsers', 'totalVehicles'));
            return view('vehicles.index', [
                'vehicles' => $vehicles,
                'totalUsers' => $totalUsers,
                'totalVehicles' => $totalVehicles
            ]);

        }

        public function store(Request $request)
    {
        // Validate form input
        $validatedData = $request->validate([
            'make' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'year' => 'required|integer',
            'price' => 'required|numeric',
            
        ]);

        // Save data to the database
        Vehicle::create($validatedData);

        // Redirect with success message
        return redirect()->back()->with('success', 'Car details saved successfully!');
    }

        public function indexview()
    {
        // Get all vehicles
        $vehicles = Vehicle::all();

        // Count total number of users and vehicles
        $totalUsers = User::count();
        $totalVehicles = Vehicle::count();

        // Render the vehicle details page (`table.blade.php`) and pass the `vehicles`, `totalUsers`, and `totalVehicles` data
        return view('vehicles.table', [
            'vehicles' => $vehicles,
            'totalUsers' => $totalUsers,
            'totalVehicles' => $totalVehicles
        ]);
    }
    
        // Delete a vehicle by ID
        public function destroy($id)
        {
            // Find the vehicle and delete it
            $vehicle = Vehicle::find($id);
            if ($vehicle) {
                $vehicle->delete();
                return redirect()->route('vehicles.index')->with('success', 'Vehicle deleted successfully.');
            }
            return redirect()->route('vehicles.index')->with('error', 'Vehicle not found.');
        }
}
