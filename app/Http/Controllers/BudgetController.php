<?php

namespace App\Http\Controllers;

use App\budget;
use App\categories;
use App\transaction;
use Illuminate\Http\Request;

class BudgetController extends Controller
{
    public function index(Request $request){
        $month = isset($request->month)?$request->month:date('m');
        $year = isset($request->year)?$request->month:date('Y');
        $user_id = auth()->user()->id;
        $budgets= budget::with(['category.getTransactions'=>function($query) use($month,$year,$user_id){
            $query->whereRaw('MONTH(`date`) = '.$month.' AND YEAR(`date`) = '.$year.' AND user_id='.$user_id);
        }])
                        ->where('user_id',auth()->id())
                        ->get();
        return $budgets;
    }

    public function store(Request $request){
        if($request->newCat){
            $cat = new categories();
            $cat->name = $request->category;
            $cat->user_id = auth()->user()->id;
            $cat->save();
            $cat_id = $cat->id;
        }else{
            $cat_id = $request->category;
        }

        $check_bud = budget::where('category',$cat_id)->exists();

        if($check_bud){
            $bud = budget::where('category',$cat_id)->first();
            budget::where('category',$cat_id)->update([
                'amount'=>$bud->amount+$request->amount
            ]);
        }

        if(isset($request->id) && $request->id!==""){
            $chk = budget::where('id',$request->id)->exists();
            if($chk){
                $budget = budget::where('id',$request->id)->first();

                $budget->category=$cat_id;
                $budget->amount=$request->amount;
                $budget->save();
            }else{
                abort(500);
            }
        }else{
            $budget = new budget();
            $budget->category= $cat_id;
            $budget->amount= number_format($request->amount,2);
            $budget->user_id= auth()->id();
            $budget->save();
        }
        $budgets= budget::with('category')
            ->where('user_id',auth()->id())
            ->get();
        return $budgets;
    }


    public function delete(Request $request){
        $chk= budget::where('id',$request->id)->exists();
        if($chk){
            budget::where('id',$request->id)->delete();

            $budgets= budget::with('category')
                ->where('user_id',auth()->id())
                ->get();
            return $budgets;
        }else{
            abort(500,"Selected Budget Not Found");
        }
    }
}
