<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Albumn;
use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumnController extends Controller
{
    /**
     * Display a listing of the albumns.
     */
    public function index()
    {
        $albumns = DB::table('albumn_singers')
            ->join('albumns', 'albumns.albumn_id', '=', 'albumn_singers.albumn_id')
            ->join('singers', 'singers.singer_id', '=', 'albumn_singers.singer_id')
            ->select('albumns.albumn_name', 'singers.singer_name', 'albumns.cover_photo')
            ->get();
        if ($albumns) {
            return response()->json([
                'status' => true,
                'data' => $albumns
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null
        ]);
    }

    /**
     * Display the specified albumn.
     */
    public function show($id)
    {
        $albumn = Albumn::find($id);

        if ($albumn) {

            // Truy xuất những bài hát có trong Albumn
            $songs = DB::table('albumn_songs')
                ->join('songs', 'songs.song_id', '=', 'albumn_songs.song_id')
                ->where('albumn_songs.albumn_id', '=', $albumn)
                ->select('songs.*')
                ->get();

            // Truy xuất những ca sĩ có trong Albumn
            $singers = DB::table('albumn_singers')
                ->join('singers', 'singers.singer_id', '=', 'albumn_singers.singer_id')
                ->where('albumn_singers.albumn_id', '=', $albumn)
                ->select('singers.*')
                ->get();

            // Truy xuất những ca sĩ có trong bài hát của Albumn
            $song_singers = [];
            foreach ($songs as $song) {
                $singers = DB::table('song_singers')
                    ->join('singers', 'singers.singer_id', '=', 'song_singers.singer_id')
                    ->where('song_singers.song_id', '=', $song->song_id)
                    ->select('singers.*')
                    ->get();
                $song_singers[$song->song_id] = $singers;
            }

            // data
            $data = [
                'albumn' => $albumn,
                'songs' => $songs,
                'singers' => $singers,
                'song_singers' => $song_singers
            ];

            return response()->json([
                'status' => true,
                'data' => $data
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null
        ]);
    }


    /**
     * Store a newly created albumns in storage.
     */
    public function store(Request $request)
    {
        // Tạo albumn
        $albumn = DB::table('albumns')->insert([
            'albumn_name' => $request->albumn_name,
            'cover_photo' => $request->cover_photo,
            'short_description' => $request->short_description
        ]);

        if ($albumn) {
            return response()->json([
                'status' => true,
                'data' => $albumn
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null
        ]);
    }

    /**
     * Store songs to albumn
     */
    // public function addSong($song_id, $albumn_id)
    // {
    //     $albumn = Albumn::find($albumn_id);
    //     if ($albumn) {
    //         $song = Song::find($song_id);
    //         if ($song) {
    //             $albumn_song = DB::table('albumn_songs')->insert([
    //                 'song_id' => $song_id,
    //                 'albumn_id' => $albumn_id
    //             ]);
                
    //         }
    //     }
    // }
    /**
     * Update the specified albumns in storage.
     */
    public function update(Request $request, string $id)
    {
        $albumn = Albumn::find($id);

        if ($albumn) {
            $albumn->fill($request->only('albumn_name', 'cover_photo', 'number_songs', 'short_description'));
            $albumn->save();
            return response()->json([
                'status' => true,
                'data' => $albumn
            ]);
        }

        return response()->json([
            'status' => false,
            'data' => null
        ]);
    }

    /**
     * Remove the specified albumns from storage.
     */
    public function destroy(string $id)
    {
        $albumn = Albumn::find($id);

        if ($albumn) {
            $albumn->delete();
            return response()->json([
                'status' => true,
            ]);
        }

        return response()->json([
            'status' => false,
        ]);
    }
}
