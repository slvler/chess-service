<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Submenu extends Model
{
    use HasFactory;

    protected $fillable = ['title','menu_id','body','detail','keyword','status'];

    public function getMenu()
    {
         return $this->belongsTo('App\Models\Menu');
    }


}
