<?php

namespace App\View\Composers;

use App\Models\AdminMenu;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('sidebar', AdminMenu::query()->where('menu_type','0')->get());
    }
}
