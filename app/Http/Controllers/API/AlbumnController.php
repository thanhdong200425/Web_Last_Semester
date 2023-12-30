<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Albumn;
use App\Models\Song;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlbumnController extends Controller
{
    public function index(): JsonResponse
    {
        $albumns = DB::table('albumn_songs')
            ->join('albumns', 'albumns.albumn_id', '=', 'albumn_songs.albumn_id')
            ->join('songs', 'songs.song_id', '=', 'albumn_songs.song_id')
            ->join('song_singers', 'song_singers.song_id', '=', 'songs.song_id')
            ->join('singers', 'singers.singer_id', '=', 'song_singers.singer_id')
            ->get(['songs.song_name', 'singers.singer_name', 'songs.path', 'songs.cover_photo', 'albumns.albumn_name',
                'albumns.albumn_id', 'albumns.cover_photo']);

        if ($albumns->isNotEmpty()):
            $result = $albumns->groupBy('albumn_id')->map(function ($group) {
                return [
                    "albumn_name" => $group->first()->albumn_name,
                    "albumn_photo" => $group->first()->cover_photo,
                    "songs" => $group->groupBy("song_name")->map(function ($items) {
                        $song_name = $items->first()->song_name;
                        $cover_photo = DB::table('songs')->where('song_name', '=', $song_name)->value('cover_photo');
                        return [
                            "cover_photo" => $cover_photo,
                            "path" => $items->first()->path,
                            "singers" => $items->pluck('singer_name')->toArray()
                        ];
                    })
                ];
            });

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

    public function show($albumn_id): JsonResponse
    {
        $albumn = Albumn::find($albumn_id);

        if ($albumn) {
            $songs = DB::table('albumn_songs')
                ->where('albumn_songs.albumn_id', '=', $albumn_id)
                ->join('songs', 'songs.song_id', '=', 'albumn_songs.song_id')
                ->join('song_singers', 'song_singers.song_id', '=', 'songs.song_id')
                ->join('singers', 'singers.singer_id', '=', 'song_singers.singer_id')
                ->join('albumns', 'albumns.albumn_id', '=', 'albumn_songs.albumn_id')
                ->get(['songs.song_name', 'singers.singer_name', 'songs.path', 'albumns.albumn_name']);


            if ($songs->isNotEmpty()):
                $albumn_name = $songs->first()->albumn_name;
                $result[$albumn_name] = [];
                $result[$albumn_name] = $songs->groupBy("song_name")->map(function ($songGroup) {
                    return [
                        "song_name" => $songGroup->first()->song_name,
                        "singers" => $songGroup->pluck("singer_name")->toArray(),
                        "path" => $songGroup->first()->path
                    ];
                })->values();

                return response()->json([
                    "status" => true,
                    "data" => $result
                ]);
            endif;
        }

        return response()->json([
            "status" => false,
            "data" => null
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

    public function addSong($albumn_id, Request $request): JsonResponse
    {
        $albumn = Albumn::find($albumn_id);
        if (isset($albumn)) {
            $song = Song::find($request->song_id);
            if (isset($song)) {
                $albumn_song = DB::table('albumn_songs')->insert([
                    'song_id' => $request->song_id,
                    'albumn_id' => $albumn_id
                ]);
                if ($albumn_song) {
                    return response()->json([
                        "status" => true
                    ]);
                }
            }
        }

        return response()->json([
            'status' => false,
        ]);
    }
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
