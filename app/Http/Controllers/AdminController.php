<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ParkingSpace;

class AdminController extends Controller
{
    public function index()
    {
        $parkingSpaces = ParkingSpace::all();
        return view('admin.index', compact('parkingSpaces'));
    }

    public function update(Request $request, $id)
    {
        $space = ParkingSpace::findOrFail($id);
        $space->update($request->only(['location', 'status', 'capacity']));
        return redirect()->route('admin.index')->with('success', 'Parking space updated.');
    }

    public function destroy($id)
    {
        $space = ParkingSpace::findOrFail($id);
        $space->delete();
        return redirect()->route('admin.index')->with('success', 'Parking space deleted.');
    }
}

