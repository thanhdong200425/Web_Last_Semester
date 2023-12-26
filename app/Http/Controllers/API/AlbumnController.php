<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Albumn;
use Illuminate\Http\Request;

class AlbumnController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albumns = Albumn::all();

        return response()->json([
            'status' => true,
            'data' => $albumns
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $albumn = Albumn::find($id);

        if($albumn) {
            return response()->json([
                'status' => true,
                'data' => $albumn
            ]);
        }

        return response()->json([
            'status' => false,
            'message' => 'Không tìm thấy albumn'
        ]); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $albumn = Albumn::find($id);

        if($albumn) {
            $albumn->albumn_name = $request->albumn_name;

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }
}
