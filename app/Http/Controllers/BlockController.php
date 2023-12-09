<?php

namespace App\Http\Controllers;

use App\Models\UpdateBlock;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    public function show($id)
    {
        $updateBlock = UpdateBlock::find($id);

        if (!$updateBlock) {
            return response()->json(['error' => 'Block not found'], 404);
        }

        return response()->json($updateBlock);
    }

    public function update(Request $request, $id)
    {
        $updateBlock = UpdateBlock::find($id);

        if (!$updateBlock) {
            return response()->json(['error' => 'Block not found'], 404);
        }

        $updateBlock->assigned_subject = $request->input('assigned_subject');
        $updateBlock->aysem = $request->input('aysem');
        $updateBlock->slot = $request->input('slot');

        $updateBlock->save();

        return response()->json($updateBlock);
    }
}
