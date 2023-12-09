<?php

namespace App\Http\Controllers;
use App\Models\UpdateBlock;

use Illuminate\Http\Request;

class UpdateBlockController extends Controller
{

    public function show()
    {
        $updateblock = UpdateBlock::all();
        return response()->json([$updateblock]);
    }


    public function updateblock(Request $request, $id)
{
    $updateblock = UpdateBlock::find($id);

    if (!$updateblock) {
        return response()->json(['error' => 'Block not found'], 404);
    }

    $updateblock->assigned_subject = $request->input('assigned_subject');
    $updateblock->aysem = $request->input('aysem');
    $updateblock->slot = $request->input('slot');

    $updateblock->save();

    return response()->json([$updateblock]);
}
}
