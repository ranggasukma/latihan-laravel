<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\This;

class Articles extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $primaryKey = 'id';



    public function category(){
        return $this->belongsTo('App\Category');
    }
}
