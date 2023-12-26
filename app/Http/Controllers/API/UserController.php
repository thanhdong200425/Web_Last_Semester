<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function sign_in(Request $request): JsonResponse
    {
        $data = DB::table('users')
            ->where('username', '=', $request->username)
            ->where('role', '=', 1)
            ->first();

        if ($data != null):
            if (Hash::check($request->password, $data->password)):
                return response()->json([
                    'status' => true,
                    'data' => User::find($data->id)
                ]);
            endif;
            return response()->json([
                'status' => false,
                'data' => []
            ]);
        endif;

        return response()->json([
            'status' => false,
            'data' => []
        ]);
    }

    public function sign_up(Request $request): JsonResponse
    {
        $data = DB::table('users')->insert([
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'origin_password' => $request->password,
            'email' => $request->email,
            'role' => 1,
            'is_active' => 1,
            'remember_token' => Str::random(60)
        ]);
        if ($data) {
            return response()->json(['status' => true]);
        }

        return response()->json([
            'status'=>false
        ]);
    }
}
