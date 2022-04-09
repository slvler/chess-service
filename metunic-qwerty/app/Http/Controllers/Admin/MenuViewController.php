<?php

namespace App\Http\Controllers\Admin;

use App\Models\AdminMenu;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MenuViewController extends Controller
{
    public function compose(View $view)
    {
        $sidaberMenu = AdminMenu::where('status',0)->get();
        $view->with('sidabarMenu', $sidaberMenu);

    }
}
