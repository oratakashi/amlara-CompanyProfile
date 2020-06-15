<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'id',
        'id_category',
        'name',
        'description',
        'price',
        'discount',
        'photos',
        'status'
    ];
    public $incrementing = false;

    public function category(){
        return $this->belongsTo(Category::class, "id_category", "id");
    }
}
