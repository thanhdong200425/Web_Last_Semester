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
            ->select(['songs.*', 'singers.singer_name'])
            ->get();

        if ($song_singers->count() == 0):
            return response()->json([
                "status" => false,
                "data" => null
            ]);
        endif;

        $result = $song_singers->groupBy('song_id')->map(function ($song) {
            return [
                "song_id" => $song->first()->song_id,
                "song_name" => $song->first()->song_name,
                "song_photo" => $song->first()->cover_photo,
                "lyric" => $song->first()->lyric,
                "duration" => $song->first()->duration,
                "path" => $song->first()->path,
                "singers" => $song->pluck('singer_name')->toArray()
            ];
        })->values();

        return response()->json([
            "status" => true,
            "data" => $result
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
    public function show($song_id)
    {
        $song = DB::table('song_singers')
            ->join('songs', 'songs.song_id', '=', 'song_singers.song_id')
            ->join('singers', 'singers.singer_id', '=', 'song_singers.singer_id')
            ->where('song_singers.song_id', '=', $song_id)
            ->get([
                'songs.*',
                'singers.singer_name'
            ]);

        if ($song == null):
            return response()->json([
                "status" => false,
                "data" => $song
            ]);
        endif;

        $data = new \stdClass();
        $data->song_id = $song->first()->song_id;
        $data->song_name = $song->first()->song_name;
        $data->song_photo = $song->first()->cover_photo;
        $data->lyric = $song->first()->lyric;
        $data->duration = $song->first()->duration;
        $data->path = $song->first()->path;
        $data->singers = $song->pluck('singer_name')->toArray();

        return response()->json([
            "status" => true,
            "data" => $data
        ]);

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
