<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserFavoriteController extends Controller
{
    public function store(Request $request, $micropost)
    {
        \Auth::user()->give_favorite($micropost);
        return redirect()->back();
    }

    public function destroy($micropost)
    {
        \Auth::user()->cancel_favorite($micropost);
        return redirect()->back();
    }
    
    public function index(Request $request, $id)
    {
        if (\Auth::check()) {
            $user = \Auth::user();
            $microposts = $user->favorite_with()->orderBy('created_at', 'desc')->paginate(10);

            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
            $data += $this->counts($user);
            return view('users.favorite_with', $data);
        }
            return view('welcome');
    }    
    
}
