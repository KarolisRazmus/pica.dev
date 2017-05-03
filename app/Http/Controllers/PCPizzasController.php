<?php namespace App\Http\Controllers;

use App\Model\PCCheeses;
use App\Model\PCGrounds;
use App\Model\PCIngridients;
use App\Model\PCPizzas;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;

class PCPizzasController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pcpizzas
	 *
	 * @return Response
	 */
	public function index()
	{
//        dd($configuration['all_pizzas'] = PCPizzas::with(['ingridientsConnections'])->with(['ground'])->with(['cheese'])->get()->toArray());

        $configuration['all_pizzas'] = PCPizzas::with(['ingridientsConnections'])->with(['ground'])->with(['cheese'])->get()->toArray();

         return view('content.list_pizzas', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pcpizzas/create
	 *
	 * @return Response
	 */
	public function form()
	{

		$configuration['grounds']=PCGrounds::all()->pluck('name', 'id')->toArray();
		$configuration['cheeses']=PCCheeses::all()->pluck('name', 'id')->toArray();
		$configuration['ingridients']=PCIngridients::all()->pluck('name', 'id')->toArray();
		$configuration['data']=['ingridients' => ['1','2','3']];

//        dd($configuration);

        return view('content.form_pizza', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pcpizzas
	 *
	 * @return Response
	 */
	public function addPizza()
	{
        $data = request()->all();

//        dd($data);

        if(sizeOf($data['ingridients']) != 3) {
            $configuration['grounds']=PCGrounds::all()->pluck('name', 'id')->toArray();
            $configuration['cheeses']=PCCheeses::all()->pluck('name', 'id')->toArray();
            $configuration['ingridients']=PCIngridients::all()->pluck('name', 'id')->toArray();
            $configuration['data']=['ingridients' => ['1','2','3','4']];

            return view('content.form_pizza', $configuration);
        }

        $ground_calories = array_sum(DB::table('pc_grounds')->where('id', '=', $data['ground'])->select('calories')->get()->pluck('calories')->toArray());
        $cheeses_calories = array_sum(DB::table('pc_cheeses')->where('id', '=', $data['cheese'])->select('calories')->get()->pluck('calories')->toArray());

        $ingridients_calories = 0;

        foreach ($data['ingridients'] as $ingridient)
        {
            $ingridient_calories = DB::table('pc_ingridients')->where('id', '=', $ingridient)->select('calories')->get()->pluck('calories')->toArray();
            $ingridients_calories+= array_sum($ingridient_calories);
        }
        $pizzas_calories = $ground_calories + $cheeses_calories + $ingridients_calories;


        $record = PCPizzas::create ([
            'name' => $data['name'],
            'grounds_id' => $data['ground'],
            'cheeses_id' => $data['cheese'],
            'calories' => $pizzas_calories,
        ]);

        $record->connection()->sync($data['ingridients']);

        $record['grounds']=PCGrounds::all()->pluck('name', 'id')->toArray();
        $record['cheeses']=PCCheeses::all()->pluck('name', 'id')->toArray();
        $record['ingridients']=PCIngridients::all()->pluck('name', 'id')->toArray();
        $record['data']=['ingridients' => ['1','2','3']];

        return view('content.form_pizza', $record);
	}

}

