<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePcPizzasIngridientsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pc_pizzas_ingridients_connections', function(Blueprint $table)
		{
			$table->integer('count')->unique('count_UNIQUE');
			$table->timestamps();
			$table->softDeletes();
			$table->string('pizzas_id', 36)->index('fk_pc_pizzas_ingridients_connections_pc_pizzas1_idx');
			$table->string('ingridients_id', 36)->index('fk_pc_pizzas_ingridients_connections_pc_ingridients1_idx');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('pc_pizzas_ingridients_connections');
	}

}
