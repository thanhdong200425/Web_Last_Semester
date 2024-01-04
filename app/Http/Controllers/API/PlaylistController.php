<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Playlist;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlaylistController extends Controller
{
    public function add(Request $request, $id): JsonResponse
    {
        $playlist = new Playlist();
        if ($request->playlist_name == "" || $request->user_id == ""):
            return response()->json([
                "status" => false
            ]);
        endif;
        $playlist->playlist_name = $request->playlist_name;
        $playlist->user_id = $id;
        $playlist->save();

        if ($playlist):
            return response()->json([
                "status" => true
            ]);
        endif;

        return response()->json([
            "status" => false
        ]);
    }

    public function remove($id, $playlist_id): JsonResponse
    {
        $result = DB::table('playlists')
            ->where('user_id', '=', $id)
            ->where('playlist_id', '=', $playlist_id)
            ->delete();

        if ($result == 0):
            return response()->json([
                "status" => false
            ]);
        endif;

        return response()->json([
            "status" => true
        ]);
    }

    public function addSongIntoPlaylist($id, $playlist_id, Request $request): JsonResponse
    {
        $check = DB::table('playlists')
            ->where('user_id', '=', $id)
            ->where('playlist_id', '=', $playlist_id)
            ->count();

        if ($check === 0):
            return response()->json([
                "status" => false
            ]);
        endif;

        $data = DB::table('playlist_songs')->insert([
            "playlist_id" => $playlist_id,
            "song_id" => $request->song_id
        ]);

        if ($data == false):
            return response()->json([
                "status" => false
            ]);
        endif;

        return response()->json([
            "status" => true
        ]);
    }

    function removeSongFromPlaylist($id, $playlist_id, Request $request): JsonResponse
    {
        $check = Playlist::where('user_id', $id)
            ->where('playlist_id', $playlist_id)
            ->count();

        if ($check === 0):
            return response()->json([
                "status" => false
            ]);
        endif;

        $data = DB::table('playlist_songs')
            ->where('playlist_id', '=', $playlist_id)
            ->where('song_id', '=', $request->song_id)
            ->delete();

        if ($data === 0):
            return response()->json([
                "status" => false
            ]);
        endif;

        return response()->json([
            "status" => true
        ]);
    }
}