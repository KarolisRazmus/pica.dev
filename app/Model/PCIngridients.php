<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PCIngridients extends PCCoreModel
{
    protected $table = 'pc_ingridients';

    protected $fillable = ['name', 'calories'];

    public function ingridientsConnections (  )
    {
        return $this->hasMany(PCPizzasIngridientsConnections::class, 'ingridients_id', 'id');
    }
}
