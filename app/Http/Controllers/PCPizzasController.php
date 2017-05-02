<?php namespace App\Http\Controllers;

use App\Model\PCCheeses;
use App\Model\PCGrounds;
use App\Model\PCIngridients;
use App\Model\PCPizzas;
use Illuminate\Routing\Controller;

class PCPizzasController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pcpizzas
	 *
	 * @return Response
	 */
	public function index()
	{
		return PCPizzas::all()->toArray();
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

////        $data['calories']=
//        foreach ($data['$ingridient'] as $ingridient)
//        {
//            DB::table('pc_ingridients')->where('id', '=', '$ingridient')->select('calories')->get()->pluck('calories');
//        }


        $record = PCPizzas::create ([
            'name' => $data['name'],
            'ground_id' => $data['ground'],
            'cheese_id' => $data['cheese'],
            'calories' => rand(500,1000),

        ]);

        $record->connection()->sync($data['ingridients']);

        $record['grounds']=PCGrounds::all()->pluck('name', 'id')->toArray();
        $record['cheeses']=PCCheeses::all()->pluck('name', 'id')->toArray();
        $record['ingridients']=PCIngridients::all()->pluck('name', 'id')->toArray();

        return view('content.form_pizza', $record);
	}
}