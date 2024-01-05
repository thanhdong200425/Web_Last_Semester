<?php

namespace App\Http\Controllers;

use App\Models\Singer;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class SingerController extends Controller
{

    public function index()
    {

        return view('pages.singer-pages.singers', [
            'singers' => Singer::paginate(5)
        ]);
    }

    public function create()
    {
        return view('pages.singer-pages.create-singer');
    }

    public function store(Request $request)
    {
        $genders = ['Male', 'Female', 'Other'];
        $validateData = $request->validate([
            'singer_name' => ['required', 'unique:singers', 'string', 'max:255'],
            'stage_name' => ['nullable', 'unique:singers', 'string', 'max:255'],
            'country' => ['nullable'],
            'dob' => ['required', 'date'],
            'gender' => ['required', Rule::in($genders)],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
            'short_description' => ['nullable', 'string']
        ]);

        if ($validateData) {
            $singer = new Singer();
            $singer->fill($request->only('singer_name', 'stage_name', 'country', 'dob', 'gender', 'cover_photo', 'short_description'));
            $nameFile = ($request->hasFile('cover_photo')) ? UserController::handleImage('Singer',$request->cover_photo) : $singer->cover_photo;
            $singer->cover_photo = $nameFile;
            $singer->save();
            return redirect()->route('singers');
        }

        return redirect()->route('singer.create')->withErrors($validateData);
    }

    public function edit($singer_id)
    {
        $singer = Singer::find($singer_id);
        if ($singer) {
            return view('pages.singer-pages.edit-singer', [
                'singer' => $singer
            ]);
        }
        return redirect()->route('singers')->withErrors('Singer not found!');
    }

    public function update(Request $request)
    {
        $genders = ['Male', 'Female', 'Other'];
        $validateData = $request->validate([
            'singer_name' => ['string', 'max:255'],
            'stage_name' => ['nullable', 'string', 'max:255'],
            'country' => ['nullable'],
            'dob' => ['nullable'],
            'gender' => ['nullable', Rule::in($genders)],
            'cover_photo' => ['nullable', 'image', 'max:2048'],
            'short_description' => ['nullable', 'string']
        ]);

        if ($validateData) {
            $singer = Singer::find($request->singer_id);
            $singer->fill($request->only('singer_name', 'stage_name', 'country', 'dob', 'gender', 'short_description'));
            $nameFile = ($request->hasFile('cover_photo')) ? UserController::handleImage('Singer',$request->cover_photo) : $singer->cover_photo;
            $singer->cover_photo = $nameFile;
            $singer->save();

            return redirect()->route('singers');
        }

        return redirect()->route('singer.edit', ['singer_id' => $request->singer_id])->withErrors($validateData);
    }

    public function destroy($id)
    {
        if (DB::table('singers')->where('singer_id', '=', $id)->delete()) {
            return response()->json(['success' => 'Singer deleted successfully']);
        } else {
            return response()->json(['error' => 'Delete failed!'], 500);
        }
    }
}
