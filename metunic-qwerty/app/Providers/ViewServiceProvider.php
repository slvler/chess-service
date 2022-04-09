<?php

namespace App\Providers;

use App\Models\AdminMenu;
use App\View\Composers\PostComposer;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Use following code if you prefer to create a class
        // Based view composer otherwise use callback
        View::composer('admin.partials._sidebar', PostComposer::class);


        // Use following code if you want to use callback
     /*   // Based view composer instead of class based view composer
        View::composer('post.list', function ($view) {

            // following code will create $posts variable which we can use
            // in our post.list view you can also create more variables if needed
            $view->with('posts', Post::orderByDesc('created_at')->paginate());
        });*/
    }
}
