<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class transaction extends Model
{
    use SoftDeletes;
    protected $table="transactions";

    public function category(){
        return $this->hasOne(categories::class,'id','category_id');
    }
}
