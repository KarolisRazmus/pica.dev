<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoIncrementToCountColumnInPcPizzasIngridientsConnectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_pizzas_ingridients_connections', function(Blueprint $table)
        {
            $table->integer('count', true)->change();
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
            $table->integer('count', false)->change();
        });
    }
}
