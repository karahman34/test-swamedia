<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\DataGame;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        if ($request->input('all') == 1) {
            return response()->json([
                'ok' => true,
                'msg' => 'Success to get game data.',
                'data' => DataGame::all(),
            ]);
        }

        return DataGame::paginate($request->input('limit', 15));
    }

    public function store(Request $request)
    {
        $payload = $request->validate([
            'stadium' => 'required|string|max:255',
            'team1' => 'required|string|max:255',
            'team2' => 'required|string|max:255',
        ]);

        $dg = DataGame::create($payload);

        return response()->json([
            'ok' => true,
            'msg' => 'Success to insert data game',
            'data' => $dg,
        ], 201);
    }
}
