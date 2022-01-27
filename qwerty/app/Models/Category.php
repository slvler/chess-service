<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;


    protected $fillable = ['title','body','detail','keyword','status'];

    public function getSubcategory()
    {
        return $this->hasOne('App\Models\Subcategory');
    }

}
