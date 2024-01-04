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
        if ($request->playlist_name == "" || $id == ""):
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

    function get($id, $playlist_id): JsonResponse
    {
        $playlist = Playlist::find($playlist_id);
        if ($playlist == null):
            return response()->json([
                "status" => false,
                "data" => null
            ]);
        endif;

        $playlist = DB::table('playlist_songs')
                    ->where('playlist_songs.playlist_id', '=', $playlist_id)
                    ->join('songs', 'songs.song_id', '=', 'playlist_songs.song_id')
                    ->join('playlists', 'playlists.playlist_id', '=', 'playlist_songs.playlist_id')
                    ->join('song_singers', 'song_singers.song_id', '=', 'songs.song_id')
                    ->join('singers','singers.singer_id', '=', 'song_singers.singer_id')
                    ->get([
                        "songs.*", 'playlists.*', 'singers.stage_name'
                    ]);
          
        if ($playlist->isNotEmpty()):
            $result = new \stdClass();
            $result->playlist_id = $playlist->first()->playlist_id;
            $result->playlist_name = $playlist->first()->playlist_name;
            $result->songs = $playlist->groupBy('song_id')->map(function ($song) {
                return [
                    "song_id" => $song->first()->song_id,
                    "song_name" => $song->first()->song_name,
                    "song_photo" => $song->first()->cover_photo,
                    "lyric" => $song->first()->lyric,
                    "duration" => $song->first()->duration,
                    "path" => $song->first()->path,
                    "singers" => $song->pluck('stage_name')->toArray()
                ];
            })->values();

            return response()->json([
                "status" => true,
                "data" => $result
            ]);
        endif;

        return response()->json([
            "status" => false,
            "data" => null
        ]);
    }

    function getSpecial($id): JsonResponse
    {
        $check = DB::table('playlists')->where('user_id', '=', $id)->get([
            'playlist_id', 'playlist_name'
        ]);

        if ($check->count() == 0):
            return response()->json([
                "status" => false,
                "data" => null
            ]);
        endif;

        return response()->json([
            "status" => true,
            "data" => $check
        ]);
    }
}
