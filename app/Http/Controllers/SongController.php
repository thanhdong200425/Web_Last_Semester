<?php

namespace App\Http\Controllers;

use App\Models\Song;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SongController extends Controller
{
    public function index()
    {
        $songs = Song::paginate(5);
        return view('pages.song-pages.songs', [
            'songs' => $songs
        ]);
    }

    public function destroy($song_id)
    {
        $song = Song::find($song_id);
        if ($song):
            $song->delete();
            return redirect()->route('songs');
        endif;
        return redirect()->route('songs')->withErrors(['Song not found']);
    }
    
    public function edit(Request $request)
    {
        $song = Song::find($request->song_id);
        return view('pages.song-pages.edit-song', [
            'song' => $song
        ]);
    }

    public function update(Request $request)
    {

        $validateData = $request->validate([
            'song_name' => ['required', 'string', 'max:255'],
            'lyric' => ['nullable', 'string'],
            'cover_photo' => ['nullable', 'image', 'max:2048']
        ]);

        $nameFile = ($request->hasFile('cover_photo')) ? UserController::handleImage($request->file('cover_photo')) : null;
         
        if ($validateData) 
        {
            $song = Song::find($request->song_id);
            $song->fill([
                'song_name' => $validateData['song_name'],
                'lyric' => $validateData['lyric'],
                'cover_photo' => $nameFile
            ]);

            $song->save();
            return redirect()->route('songs');
        }

        return redirect()->route('songs.edit', ['song_id' => $request->song_id])->withErrors($validateData);
    }
}
