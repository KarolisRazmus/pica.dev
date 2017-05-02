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

    public function logins (  )
    {
        return $this->hasOne(CRMProjectLogins::class, 'id', 'logins_id')->with(['type']);
    }
}
