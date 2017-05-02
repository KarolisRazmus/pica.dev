<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PCGrounds extends PCCoreModel
{
    protected $table = 'pc_grounds';

    protected $fillable = ['name', 'calories'];
}
