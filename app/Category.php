<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['id', 'name'];
    public $incrementing = false;

    public function course(){
        return $this->hasMany(Course::class, "id_category", "id");
    }
}
