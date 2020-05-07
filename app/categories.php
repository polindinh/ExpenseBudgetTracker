<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $table="categories";

    public function getTransactions(){
        return $this->hasMany(transaction::class,'category_id','id');
    }
}
