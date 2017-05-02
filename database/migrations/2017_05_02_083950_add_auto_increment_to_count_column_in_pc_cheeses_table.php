<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAutoIncrementToCountColumnInPcCheesesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pc_cheeses', function(Blueprint $table)
        {
            $table->primary('id');
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
        Schema::table('pc_cheeses', function(Blueprint $table)
        {
            $table->integer('count', false)->change();
            $table->dropPrimary('id');
        });
    }
}
