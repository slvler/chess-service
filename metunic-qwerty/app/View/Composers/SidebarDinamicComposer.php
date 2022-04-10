<?php

namespace App\View\Composers;

use App\Models\AdminMenu;
use Illuminate\View\View;

class SidebarDinamicComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('sidebarDinamic', AdminMenu::query()->where('menu_type','1')->get());
    }
}
