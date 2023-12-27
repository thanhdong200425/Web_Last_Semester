<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Singer;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SongController extends Controller
{
    /**
     * Display a listing of the songs.
     */
    public function index()
    {
        $song_singers = DB::table('song_singers')
            ->join('songs', 'songs.song_id', '=', 'song_singers.song_id')
            ->join('singers', 'singers.singer_id', '=', 'song_singers.singer_id')
            ->select('songs.song_name', 'singers.singer_name', 'songs.cover_photo', 'songs.duration')
            ->get();

        if ($song_singers) {

            return response()->json([
                'status' => true,
                'data' => $song_singers
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id_singer)
    {
        // $new_song = DB::table('songs')->insert([
        //     'song_name' => $request->song_name,
        //     'cover_photo' => $request->cover_photo,
        //     'lyric' => $request->lyric,
        //     'duration' => $request->duration
        // ]);

        // if ($new_song) {
        //     return response()->json([
        //         'status' => true
        //     ]);
        // }

        // return response()->json([
        //     'status' => false
        // ]);
    }

    /**
     * Display the specified songs by ID .
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // $song = Song::find($id);

        // if ($song) {

        //     $song->fill($request->only('song_name', 'lyric', 'cover_photo', 'duration'));
        //     $song->save();

        //     return response()->json([
        //         'status' => true,
        //         'data' => $song
        //     ]);
        // }
        
        // return response()->json([
        //     'status' => false,
        //     'data' => null
        // ]); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $song = Song::find($id);

        if ($song) {

            $song->delete();
            return response()->json([
                'status' => true
            ]);
        }

        return response()->json([
            'status' => false
        ]);
    }
}
