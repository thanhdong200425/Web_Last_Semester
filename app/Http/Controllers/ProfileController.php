<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $adminInfo = session('admin');
        return view('pages.profile', [
            'admin' => $adminInfo 
        ]);
    }

    public function update(Request $request)
    {
        $validationData = $request->validate([
            'username' => ['nullable','string', 'max:255', 'unique:users,username'],
            'email' => ['nullable','string', 'email', 'max:255', 'unique:users,email'],
            'dob' => ['nullable','date'],
            'gender' => ['nullable'],
            'country' => ['nullable'],
            'phone_number' => ['nullable', 'digits_between:10,11'],
            'facebook' => ['nullable', 'url'],
            'instagram' => ['nullable', 'url'],
            'twitter' => ['nullable', 'url'],
            'tiktok' => ['nullable', 'url'],
            'youtube' => ['nullable', 'url'],
        ]);

        //dd($validationData, session('admin'));

        if ($validationData) {
            // Update the user profile
            $user = User::find(session('admin')->id);

            $user->username = (!empty($validationData['username'])) ? $validationData['username'] : $user->username;
            $user->email = (!empty($validationData['email'])) ? $validationData['email'] : $user->email;
            $user->gender = (!empty($validationData['gender'])) ? $validationData['gender'] : $user->gender;
            $user->country = (!empty($validationData['country'])) ? $validationData['country'] : $user->country;
            $user->phone_number = (!empty($validationData['phone_number'])) ? $validationData['phone_number'] : $user->phone_number;
            $user->facebook = (!empty($validationData['facebook'])) ? $validationData['facebook'] : $user->facebook;
            $user->instagram = (!empty($validationData['instagram'])) ? $validationData['instagram'] : $user->instagram;
            $user->twitter = (!empty($validationData['twitter'])) ? $validationData['twitter'] : $user->twitter;
            $user->tiktok = (!empty($validationData['tiktok'])) ? $validationData['tiktok'] : $user->tiktok;
            $user->youtube = (!empty($validationData['youtube'])) ? $validationData['youtube'] : $user->youtube;

            // Handle the date of birth
            if (!empty($validationData['dob'])) {
                $dates = explode(' ', $validationData['dob']);
                $dates[1] = date('m', strtotime($dates[1]));
                $user->dob = $dates[2].'-'.$dates[1].'-'.$dates[0];
            }
            $user->save();
            session([
                'admin' => $user,
            ]);

            return redirect()->back()->with('success', 'Update profile successfully!');
        }

        return redirect()->back()->withErrors($validationData);
    }
}
