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
        $configuration['all_pizzas'] = PCPizzas::with(['pizzasConnections'])->with(['ground'])->with(['cheese'])->get()->toArray();

//        dd($configuration);

         return view('content.list_pizzas', $configuration);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /pcpizzas/create
	 *
	 * @return Response
	 */
	public function create()
	{

	    $configuration = $this->getFormData();

//        dd($configuration);

        return view('content.form_pizza', $configuration);
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pcpizzas
	 *
	 * @return Response
	 */
	public function store()
	{
        $configuration = $this->getFormData();

        $data = request()->all();



        if(!isset($data['ingridients']))
        {
            $configuration['error'] = ['message' => trans('no_ingredients')];

            return view('content.form_pizza', $configuration);
        }

        if(sizeOf($data['ingridients']) > 3)
        {
            $configuration['error'] = ['message' => trans('more_than3_ingredients')];

            return view('content.form_pizza', $configuration);
        }

        if(!isset($data['name']))
        {
            $configuration['error'] = ['message' => trans('no_name')];

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



        $configuration['comment'] = ['message' => trans('confirmation_message')];

        return view('content.form_pizza',  $configuration);
	}

    public function getFormData()
    {
        $configuration['grounds']=PCGrounds::all()->pluck('name', 'id')->toArray();
        $configuration['cheeses']=PCCheeses::all()->pluck('name', 'id')->toArray();
        $configuration['ingridients']=PCIngridients::all()->pluck('name', 'id')->toArray();

        return $configuration;
	}
}

