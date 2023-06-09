<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReferenceController extends Controller
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

            return $next($request);
        });
    }

    public function getList() {

        if(Auth::user()->role!=1 )  {
            return Redirect::to(secure_url('/home'))->with("status", "Bu bölüm yapım aşamasında");
        }

        dump("referans talepleri");

    }

    public function getCreate() {

        return view('user.create_reference_request');

    }

    public function postCreate(Request $request) {

    }

}
