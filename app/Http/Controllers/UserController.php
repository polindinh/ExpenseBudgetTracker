<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function getme(Request $request)
    {
        return  User::with('my_currency')->where('id',auth()->user()->id)->first();
    }

    public function store(Request $request)
    {
        User::where('id',$request->id)->update([
           'currency'=> $request->currency
        ]);

        if(isset($request->password)&&$request->password!==""){
            User::where('id',$request->id)->update([
                'password'=> Hash::make($request->password)
            ]);
        }

        return $request->all();

    }
}
