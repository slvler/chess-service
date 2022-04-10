<?php

namespace App\Providers;

use App\View\Composers\SidebarComposer;
use App\View\Composers\SidebarDinamicComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {

        $this->sidebarMenu();
        $this->sidebarDinamicMenu();

    }
    private function sidebarMenu()
    {
        View::composer('admin.partials._sidebar', SidebarComposer::class);
    }


    private function sidebarDinamicMenu()
    {
        View::composer('admin.partials._sidebarDinamic', SidebarDinamicComposer::class);
    }




}
