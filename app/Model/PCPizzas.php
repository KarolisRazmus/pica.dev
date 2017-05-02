<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PCPizzas extends PCCoreModel
{
    protected $table = 'pc_pizzas';

    protected $fillable = ['grounds_id', 'cheeses_id', 'name', 'calories'];

    public function connection (  )
    {
        return $this->belongsToMany(PCIngridients::class, 'pc_pizzas_ingridients_connections', 'pizzas_id', 'ingridients_id');
    }

    public function ingridientsConnections (  )
    {
        return $this->hasMany(PCPizzasIngridientsConnections::class, 'pizzas_id', 'id')
            ->with(['ingridient']);
    }

    public function ground (  )
    {
        return $this->hasOne(PCGrounds::class, 'id', 'grounds_id');
    }

    public function cheese (  )
    {
        return $this->hasOne(PCCheeses::class, 'id', 'cheeses_id');
    }
}
