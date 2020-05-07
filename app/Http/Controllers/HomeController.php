<?php

namespace App\Http\Controllers;

use App\currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except' => ['signup']]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


    public function signup(Request $request){
        $currencys = currency::all();
        return view('auth.register',compact('currencys'));
    }


    public function dates(Request $request){
        $user_id = \auth()->user()->id;
        $dates = DB::select("SELECT
                                        MONTH(`date`) as month,
                                        YEAR(`date`) as year
                                    FROM
                                        transactions
                                    WHERE
	                                    user_id='{$user_id}'
                                    GROUP BY
                                        YEAR(`date`),
                                        MONTH(`date`)
                                        ");

        if($dates){
            return $dates;
        }else{
            return [
                'month'=> date('m'),
                'year'=>date('Y')
            ];
        }
    }

    public function currency(Request $request){
        return currency::all();
    }


    public function signout(Request $request) {
        Auth::logout();
        return redirect('/login');
    }

}
