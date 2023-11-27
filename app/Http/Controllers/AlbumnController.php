<?php

namespace App\Http\Controllers;

use App\Models\Albumn;
use App\Models\User;
use Illuminate\Http\Request;

class AlbumnController extends Controller
{
    //
    public function index()
    {
        return view('pages.albumn-pages.albumns', [
            'albumns' => Albumn::paginate(5)
        ]);
    }

    public function destroy(Request $request)
    {
        $albumn = Albumn::find($request->albumn_id);
        if (!empty($albumn)) {
            $albumn->delete();
            return redirect()->route('albumns');
        }
        return redirect()->route('albumns')->withErrors('Albumn not found');
    }

    public function update(Request $request)
    {
        $validationData = $request->validate([
            'albumn_name' => ['string', 'max:255'],
            'number_songs' => ['lte:50'],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
            'short_description' => ['nullable', 'string']
        ]);

        if ($validationData) {
            $albumn = Albumn::find($request->albumn_id);
            $albumn->fill($request->only('albumn_name', 'number_songs', 'short_description'));
            $nameFile = ($request->hasFile('cover_photo')) ? UserController::handleImage($request->cover_photo) : $albumn->cover_photo;
            $albumn->cover_photo = $nameFile;
            $albumn->save();

            return redirect()->route('albumns');
        }

        return redirect()->back()->withErrors($validationData);
    }

    public function edit($albumn_id)
    {
        return view('pages.albumn-pages.edit-albumn', [
            'albumn' => Albumn::find($albumn_id)
        ]);
    }

    public function create()
    {
        return view('pages.albumn-pages.create-albumn');
    }

    public function store(Request $request)
    {
        $validationData = $request->validate([
            'albumn_name' => ['required', 'max:255', 'string'],
            'number_songs' => ['lte:50'],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
            'short_description' => ['nullable','string']
        ]);

        if ($validationData) {
            $newAlbumn = new Albumn();
            $newAlbumn->fill($request->only('albumn_name', 'number_songs', 'cover_photo'));
            $nameFile = ($request->hasFile('cover_photo')) ? UserController::handleImage($request->cover_photo) : null;
            $newAlbumn->cover_photo = $nameFile;
            $newAlbumn->save();
            
            return redirect()->route('albumns');
        }

        return redirect()->back()->withErrors($validationData);
    }
}
