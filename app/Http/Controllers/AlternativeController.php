<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;

class AlternativeController extends Controller
{
    public function index()
    {
        $alternatives = Alternative::all();
        return response()->json($alternatives);
    }

    public function show($id)
    {
        $alternative = Alternative::find($id);
        if (!$alternative) {
            return response()->json(['message' => 'Alternative not found'], 404);
        }
        return response()->json($alternative);
    }

    public function store(Request $request)
    {
        $alternative = new Alternative;
        $alternative->option = $request->input('option');
        $alternative->text = $request->input('text');
        $alternative->isCorrect = $request->input('isCorrect');
        $alternative->save();

        return response()->json($alternative, 201);
    }

    public function update(Request $request, $id)
    {
        $alternative = Alternative::find($id);
        if (!$alternative) {
            return response()->json(['message' => 'Alternative not found'], 404);
        }
        $alternative->option = $request->input('option');
        $alternative->text = $request->input('text');
        $alternative->isCorrect = $request->input('isCorrect');
        $alternative->save();

        return response()->json($alternative);
    }

    public function destroy($id)
    {
        $alternative = Alternative::find($id);
        if (!$alternative) {
            return response()->json(['message' => 'Alternative not found'], 404);
        }
        $alternative->delete();

        return response()->json(['message' => 'Alternative deleted']);
    }
}
