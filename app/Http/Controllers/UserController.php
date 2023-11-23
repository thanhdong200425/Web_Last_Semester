<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    //
    public function index()
    {

        $userList = User::where('role', 1)->paginate(10);
        return view('pages.user-pages.users', [
            'userList' => $userList,
        ]);
    }

    public function create()
    {
        return view('pages.user-pages.create-user');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required', 'max:50', 'unique:users,username'],
            'password' => ['required', 'min:8', 'max:50'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'phone_number' => ['numeric', 'digits_between:10,11'],
            'dob' => ['required'],
            'cover_photo' => ['nullable', 'max:2048', 'image']
        ]);

        if ($validateData):
            $user = new User();
            $user->fill($request->only('username', 'password', 'email', 'phone_number', 'gender', 'country', 'dob'));
            $user->role = 1;
            $nameFile = null;
            if ($request->hasFile('cover_photo')):
                $nameFile = UserController::handleImage($request->cover_photo);
            endif;
            $user->cover_photo = $nameFile;
            $user->save();
            return redirect()->route('users');
        else:
            return redirect()->route('users.create')->withErrors($validateData);
        endif;
    }

    public function destroy(Request $request)
    {
        $user = User::find($request->id);
        $user->delete();
        return redirect()->route('users');
    }

    public function edit(Request $request)
    {
        $user = User::find($request->id);
        return view('pages.user-pages.edit-user', [
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        // Validating data
        $validateData = $request->validate([
            'username' => ['max:50'],
            'email' => ['email', 'max:255'],
            'cover_photo' => ['image', 'max:2048']
        ]);

        // Hanlde when data is valid or not
        if ($validateData) {
            $nameFile = null;
            if ($request->has('cover_photo')) {
                $nameFile = UserController::handleImage($request->cover_photo);
            }
            $user = User::find($request->id);
            $user->fill($request->only('username', 'email', 'gender', 'country', 'dob', 'phone_number'));
            $user->cover_photo = $nameFile;
            $user->save();
            return redirect()->route('users.edit', ['id' => $user->id]);
        } else {
            return redirect()->route('users.edit', ['id' => $request->id])->withErrors($validateData);
        }
    }

    public static function handleImage($urlImage)
    {
        $name = $urlImage->getClientOriginalName();
        $urlImage->move(public_path('uploads/'), $name);
        return $name;
    }
}
