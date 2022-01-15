<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index(Request $request)
    {
        $company = Company::orderBy('id', 'desc')->take(3)->get();

        if ($request->input('name')) {
            $c = new Company;
            $c->user_id = auth()->user()->getAuthIdentifier();
            $c->name = $request->input('name');
            $c->inn = $request->input('inn');
            $c->director = $request->input('director');
            $c->info = $request->input('info');
            $c->address = $request->input('address');
            $c->phone = $request->input('phone');
            $c->created_at = time();
            $c->updated_at = time();
            $c->save();

            return response()->json(['success' => 'Компания добавленна'
            ]);

        }
        return view('index', ['company' => $company]);
    }

    public function home()
    {
        $id = auth()->user()->getAuthIdentifier();
        $user = User::find($id);
        return view('home', ['user' => $user]);
    }
}
