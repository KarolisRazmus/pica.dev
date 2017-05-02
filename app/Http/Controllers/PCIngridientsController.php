<?php

namespace App\Http\Controllers;

use App\Model\PCIngridients;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PCIngridientsController extends Controller
{
    /**
     *
     */
    public function index()
    {
//        return PCIngridients::with(['persons'])->get();

//        return PCIngridients::with(['persons'])->get();

//        dd(PCIngridients::table('pc_ingridients')->toArray());

//        dd(PCIngridients::where('name', '=', 'Salami')->get())->toArray();
//
//        dd(PCIngridients::find()->toArray());
//
//        dd(PCIngridients::where('string', 'Salami')->get());

        return DB::table('pc_ingridients')->where('name', '=', 'Salami')->select('calories')->get()->pluck('calories');




    }
}
