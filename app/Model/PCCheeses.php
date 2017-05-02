<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PCCheeses extends PCCoreModel
{
    protected $table = 'pc_cheeses';

    protected $fillable = ['name', 'calories'];
}
