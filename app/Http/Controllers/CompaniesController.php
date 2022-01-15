<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use App\Models\Company;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CompaniesController
{
    public function index()
    {
        $companies = Company::paginate(5);
        return view('allcompany', ['companies' => $companies]);
    }

    public function show(
        $id,
        Request $request
    )
    {
        $company = Company::where('id', $id)->first();


        if(Auth::check()) {
            $user_id = auth()->user()->getAuthIdentifier();
            $user = User::find($user_id);
            $comments = Comments::where('user_id', $user_id)->where('company_id', $id)
                ->orderBy('id')
                ->get();
        } else {
            $user = null;
            $comments = [];
        }


        if ($request->input()) {
            $c = new Comments;
            $c->user_id = $user_id;
            $c->company_id = $id;

            $c->main = $request->input('main');
            $c->inn = $request->input('inn');
            $c->director = $request->input('director');
            $c->info = $request->input('info');
            $c->address = $request->input('address');
            $c->phone = $request->input('phone');
            $c->created_at = time();
            $c->updated_at = time();
            $c->save();

            return response()->json([$request->input()
            ]);
        }
        return view('show', [
            'company' => $company,
            'comments' => $comments,
            'user' => $user
        ]);
    }
}
