<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PCPizzas extends PCCoreModel
{
    protected $table = 'pc_pizzas';

    protected $fillable = ['grounds_id', 'cheeses_id', 'name', 'calories'];
}
