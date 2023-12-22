<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function sign_in(Request $request)
    {
        $validationData = $request->validate([
            'username' => ['required'],
            'password' => ['required']
        ]);

        if ($validationData) {
            $user = DB::table('users')->where('username', "=", $request->username)->first();
            if ($user) {
                return response()->json([
                    'success' => true,
                    'message' => "OK",
                    'data' => $user
                ], 200);
            }

            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 404);
        }

        return response()->json([
            'success' => false,
            'message' => $validationData
        ], 404);
    }
}
