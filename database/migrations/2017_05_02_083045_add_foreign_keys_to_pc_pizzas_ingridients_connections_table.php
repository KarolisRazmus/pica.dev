<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class AddForeignKeysToPcPizzasIngridientsConnectionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('pc_pizzas_ingridients_connections', function(Blueprint $table)
		{
			$table->foreign('ingridients_id', 'fk_pc_pizzas_ingridients_connections_pc_ingridients1')->references('id')->on('pc_ingridients')->onUpdate('NO ACTION')->onDelete('NO ACTION');
			$table->foreign('pizzas_id', 'fk_pc_pizzas_ingridients_connections_pc_pizzas1')->references('id')->on('pc_pizzas')->onUpdate('NO ACTION')->onDelete('NO ACTION');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('pc_pizzas_ingridients_connections', function(Blueprint $table)
		{
			$table->dropForeign('fk_pc_pizzas_ingridients_connections_pc_ingridients1');
			$table->dropForeign('fk_pc_pizzas_ingridients_connections_pc_pizzas1');
		});
	}

}
