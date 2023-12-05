<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class ActivityController extends Controller
{
    public function store(Request $request)
    {
        try {
            // Validate the request
            $validatedData = $request->validate([
                'name' => 'required|string',
                'date' => 'required|date',
                'time_start' => 'required|date_format:H:i',
                'time_end' => 'required|date_format:H:i',
                'college' => 'required|string',
                'program' => 'required|string',
                'year_level' => 'required|string',
                // Add more fields as needed
            ]);
        } catch (ValidationException $e) {
            // Handle validation errors
            return response()->json(['error' => $e->errors(), 'message' => 'Validation Error'], 400);
        }

        // Create a new activity
        $activity = Activity::create($validatedData);


        // Return a response
        return response()->json(['message' => 'Activity created successfully', 'data' => $activity], 201);
    }

    public function show()
    {
        $activity = Activity::all();
        return response()->json([$activity]);
    }
}
