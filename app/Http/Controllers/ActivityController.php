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
    
public function update(Request $request, $id)
{
    $activity = Activity::find($id);

    if (!$activity) {
        return response()->json(['error' => 'Activity not found'], 404);
    }

    $activity->name = $request->input('name');
    $activity->date = $request->input('date');
    $activity->time_start = date('H:i:s', strtotime($request->input('time_start')));
    $activity->time_end = date('H:i:s', strtotime($request->input('time_end')));
    $activity->college = $request->input('college');
    $activity->program = $request->input('program');
    $activity->year_level = $request->input('year_level');

    $activity->save();

    return response()->json([$activity]);
}

    

}
