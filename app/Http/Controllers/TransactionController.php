<?php

namespace App\Http\Controllers;

use App\categories;
use App\transaction;
use Illuminate\Http\Request;
use DB;

class TransactionController extends Controller
{
    public function index(Request $request){
        $month = isset($request->month)?$request->month:date('m');

        $year = isset($request->year)?$request->year:date('Y');
        //dd($month);
        $transactions = transaction::with('category')
            ->whereRaw('MONTH(`date`) = '.$month)
            ->whereRaw('YEAR(`date`) = '.$year)
            ->where('user_id',auth()->id())
            ->get();
        return $transactions;
    }

    public function getAll(Request $request){
        $month = isset($request->month)?$request->month:date('m');
        $year = isset($request->year)?$request->year:date('Y');
        //dd($year);
        $data = transaction::where('user_id',auth()->id())
                            //->where('type','expense')
                            ->whereRaw('MONTH(`date`) = '.$month)
                            ->whereRaw('YEAR(`date`) = '.$year)
                            ->select('date', DB::raw(' sum(cast(replace(amount, \',\', \'\') as decimal(18,2))) as total'))

                            ->groupBy('date')
                            ->get();



        return $data;
    }

    public function store(Request $request){
        $chk_cat = categories::where('id',$request->category)->exists();
        if ($chk_cat){
            $category = $request->category;
        }else{
            $cat = new categories();
            $cat->name = $request->category;
            $cat->user_id = auth()->id();
            $cat->save();

            $category = $cat->id;
        }

        if(isset($request->id) && $request->id!==""){
            $transaction = transaction::where('id',$request->id)->first();
        }else{
            $transaction = new transaction();
        }

        $transaction->title = $request->title;
        $transaction->category_id = $category;
        $transaction->amount = number_format($request->amount,2);
        $transaction->type = $request->type;
        $transaction->user_id = auth()->id();
        $transaction->date = date('Y-m-d',strtotime($request->date));
        $transaction->save();

        $transactions = transaction::with('category')
            ->where('user_id',auth()->id())
            ->get();
        return $transactions;
    }


    public function delete(Request $request){
        $chk= transaction::where('id',$request->id)->exists();
        if($chk){
            transaction::where('id',$request->id)->delete();

            $transactions = transaction::with('category')
                ->where('user_id',auth()->id())
                ->get();
            return $transactions;
        }else{
            abort(500,"Selected Budget Not Found");
        }
    }
}
