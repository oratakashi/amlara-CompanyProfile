<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
    protected $fillable = [
        "id",
        "id_product",
        "name"
    ];
    public $incrementing = false;
}
