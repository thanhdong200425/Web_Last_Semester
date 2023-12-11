<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $users = User::where('username', 'LIKE', '%' . $request->search . '%')->limit(5)->get();
            if ($users) {
                $output = "";
                foreach ($users as $user):
                    $imgSrc = (file_exists(public_path('uploads/' . $user->cover_photo))) ? asset('uploads/' . $user->cover_photo) : $user->cover_photo;
                    $output .= '<tr>';
                    $output .= "<td>
                                <img src='{$imgSrc}' class='image-result'  />
                                </td>";
                    $output .= "<td>
                        <a href='/admin/users/{$user->username}'>
                            {$user->username}
                        </a>
                            </td>";
                    $output .= '</tr>';
                endforeach;
                return response($output);
            }
        }
        return response('User not found');
    }
}
