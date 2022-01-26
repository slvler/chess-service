<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


    protected $fillable = ['title','body','detail','keyword','status'];

    public function getSubmenu()
    {
        return $this->hasOne('App\Models\Submenu');
    }

}
