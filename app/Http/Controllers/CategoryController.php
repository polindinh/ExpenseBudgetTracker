<?php

namespace App\Http\Controllers;

use App\categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return categories::all();
    }
}
