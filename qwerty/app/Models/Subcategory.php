<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    use HasFactory;


    protected $fillable = ['title','category_id','body','detail','keyword','status'];

    public function getCategory()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
