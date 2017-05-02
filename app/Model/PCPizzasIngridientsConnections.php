<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PCPizzasIngridientsConnections extends PCCoreModel
{
    protected $table = 'pc_pizzas_ingridients_connections';

    protected $fillable = ['pizzas_id', 'ingridients_id'];

    public function ingridient (  )
    {
        return $this->hasOne(PCIngridients::class, 'id', 'ingridients_id');
    }
}
