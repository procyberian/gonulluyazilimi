<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;

use App\Model\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->middleware('auth');

            if(!Auth::check() ) {
                return redirect('/login')->with('redirect', URL::full() );
            }

            if(!Auth::user()->role!=1 ) {
                return redirect('/login')->with('redirect', URL::full() );
            }

            return $next($request);
        });
    }

    public function users() {

        $users = Users::where("status", 1)->get();

        return view('admin.users', ["users" => $users]);
    }

}
