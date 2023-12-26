<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

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

    public function get_music()
    {

    }

}
