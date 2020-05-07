<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class budget extends Model
{
    use SoftDeletes;
    protected $table='budgets';

    public function category(){
        return $this->hasOne(categories::class,'id','category');
    }

}
