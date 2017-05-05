<?php namespace App\Http\Controllers;

use App\Model\PCIngridients;
use Illuminate\Routing\Controller;

class PCIngridientsController extends Controller {

	/**
	 * Display a listing of the resource.
	 * GET /pcingridients
	 *
	 * @return Response
	 */
	public function index()
    {
        $configuration['all_ingridients'] = PCIngridients::with(['ingridientsConnections'])->get()->toArray();




        foreach ($configuration['$all_ingridients'] as $ingridient)

             $name = $ingridient['name'];
            $connections_sum = sizeof($ingridient['ingridients_connections']);

             array_push($configuration['popularity'],$name => $connections_sum )



             $stack = array("orange", "banana");
            array_push($stack, "apple", "raspberry");
            print_r($stack);



             $configuration['error'] = ['message' => trans('no_ingredients')];


                        order_by('created_at', 'asc')

//        Collection::sort()
//
//        $fruits = array("d" => "lemon", "a" => "orange", "b" => "banana", "c" => "apple");
//        arsort($fruits);
//        foreach ($fruits as $key => $val) {
//            echo "$key = $val\n";
//        }
//



        dd($configuration);

        return view('content.list_ingridients',  $configuration);

    }

	/**
	 * Show the form for creating a new resource.
	 * GET /pcingridients/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /pcingridients
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /pcingridients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /pcingridients/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /pcingridients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /pcingridients/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}