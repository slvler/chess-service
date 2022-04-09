<?php

namespace App\View\Composers;

use App\Models\AdminMenu;
use Illuminate\View\View;

class PostComposer
{
    /**
     * @param View $view
     */
    public function compose(View $view)
    {
        $view->with('sidebar', AdminMenu::get());
    }
}
