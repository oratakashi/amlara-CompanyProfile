<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'id',
        'id_course',
        'name'
    ];
    public $incrementing = false;

    public function details(){
        return $this->hasMany("\App\Detail", "id_product", "id");
    }
}
