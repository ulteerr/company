<?php

namespace App\Http\Controllers;


use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller

{
    function getUpdateUser()
    {
        return view('personal', [

        ]);
    }

    function postUpdateUser(Request $request)
    {
        if ($request->file('file')) {
            $image = $request->file('file');
            $imageName = time() . '.' . $image->extension();
            $image->move(public_path('images'), $imageName);
        } else {
            $imageName = substr(strrchr(
                User::where('id', auth()->user()->getAuthIdentifier())->value('avatar'), "/"),
                1);
        }


        Auth::user()->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'avatar' => '/images/' . $imageName
        ]);

        return redirect()->route('home');


    }

    public function deleteAvatar()
    {
        $user_id = auth()->user()->getAuthIdentifier();
        $user = User::where('id', $user_id)->value('avatar');
        unlink(public_path($user));
        Auth::user()->update([
            'avatar' => '/images/no_image.png'
        ]);

    }
}
