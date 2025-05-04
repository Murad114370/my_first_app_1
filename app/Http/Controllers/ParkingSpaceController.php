<?php

namespace App\Http\Controllers;

use App\Models\ParkingSpace;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ParkingSpaceController extends Controller
{
    /**
     * Display a listing of parking spaces.
     */
    public function index()
    {
        $parkingSpaces = ParkingSpace::with('user')
            ->orderBy('is_available', 'desc')
            ->orderBy('space_number')
            ->get();

        return view('parking-spaces.index', compact('parkingSpaces'));
    }

    /**
     * Show the form for creating a new parking space.
     */
    public function create()
    {
        $spaceTypes = ['standard', 'compact', 'handicapped', 'electric'];
        return view('parking-spaces.create', compact('spaceTypes'));
    }

    /**
     * Store a newly created parking space.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'space_number' => 'required|string|unique:parking_spaces',
            'location' => 'required|string',
            'type' => 'required|in:standard,compact,handicapped,electric',
            'hourly_rate' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        ParkingSpace::create($validated);

        return redirect()->route('parking-spaces.index')
                        ->with('success', 'Parking space created successfully.');
    }

    /**
     * Display the specified parking space.
     */
    public function show(ParkingSpace $parkingSpace)
    {
        return view('parking-spaces.show', compact('parkingSpace'));
    }

    /**
     * Show the form for editing the specified parking space.
     */
    public function edit(ParkingSpace $parkingSpace)
    {
        $spaceTypes = ['standard', 'compact', 'handicapped', 'electric'];
        return view('parking-spaces.edit', compact('parkingSpace', 'spaceTypes'));
    }

    /**
     * Update the specified parking space.
     */
    public function update(Request $request, ParkingSpace $parkingSpace)
    {
        $validated = $request->validate([
            'space_number' => 'required|string|unique:parking_spaces,space_number,'.$parkingSpace->id,
            'location' => 'required|string',
            'type' => 'required|in:standard,compact,handicapped,electric',
            'hourly_rate' => 'required|numeric|min:0',
            'notes' => 'nullable|string'
        ]);

        $parkingSpace->update($validated);

        return redirect()->route('parking-spaces.index')
                        ->with('success', 'Parking space updated successfully.');
    }

    /**
     * Remove the specified parking space.
     */
    public function destroy(ParkingSpace $parkingSpace)
    {
        $parkingSpace->delete();

        return redirect()->route('parking-spaces.index')
                        ->with('success', 'Parking space deleted successfully.');
    }

    /**
     * Reserve a parking space.
     */
    public function reserve(Request $request, ParkingSpace $parkingSpace)
    {
        if (!$parkingSpace->is_available) {
            return back()->with('error', 'This parking space is already occupied.');
        }

        $validated = $request->validate([
            'vehicle_plate' => 'required|string|max:20'
        ]);

        $parkingSpace->update([
            'is_available' => false,
            'current_vehicle_plate' => $validated['vehicle_plate'],
            'occupied_at' => now(),
            'user_id' => Auth::id()
        ]);

        return back()->with('success', 'Parking space reserved successfully.');
    }

    /**
     * Release a parking space.
     */
    public function release(ParkingSpace $parkingSpace)
    {
        if ($parkingSpace->is_available) {
            return back()->with('error', 'This parking space is already available.');
        }

        $parkingSpace->update([
            'is_available' => true,
            'current_vehicle_plate' => null,
            'occupied_at' => null,
            'user_id' => null
        ]);

        return back()->with('success', 'Parking space released successfully.');
    }

    /**
     * Check parking spaces availability.
     */
    public function availability(Request $request)
    {
        $query = ParkingSpace::available();

        if ($request->has('type')) {
            $query->ofType($request->type);
        }

        $availableSpaces = $query->orderBy('space_number')->get();
        $spaceTypes = ['standard', 'compact', 'handicapped', 'electric'];

        return view('parking-spaces.availability', compact('availableSpaces', 'spaceTypes'));
    }

    /**
     * Calculate parking fee for a space.
     */
    public function calculateFee(ParkingSpace $parkingSpace, Request $request)
    {
        $request->validate([
            'hours' => 'required|numeric|min:0.5|max:24'
        ]);

        $fee = $parkingSpace->calculateFee($request->hours);

        return response()->json([
            'fee' => number_format($fee, 2),
            'hours' => $request->hours,
            'rate' => $parkingSpace->hourly_rate
        ]);
    }

    /**
     * API: Get all parking spaces (for AJAX calls)
     */
    public function getSpaces()
    {
        $spaces = ParkingSpace::with('user')->get();
        return response()->json($spaces);
    }

    /**
     * API: Get specific parking space status (for AJAX calls)
     */
    public function getStatus(ParkingSpace $parkingSpace)
    {
        return response()->json([
            'status' => $parkingSpace->is_available ? 'available' : 'occupied',
            'space_number' => $parkingSpace->space_number,
            'type' => $parkingSpace->type,
            'hourly_rate' => $parkingSpace->hourly_rate
        ]);
    }
}