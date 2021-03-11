<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Admin\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*Este provider permitirá que se pueda enviar una función a la vista aside
        la cual administra los menús dinámicos deacuerdo a los roles y los permisos que estos
        tengan asignados*/
        View::composer('theme.lte.aside', function ($view) {
            $menus = Menu::getMenu(true);
            $view->with('menusComposer', $menus);
        });

        /*Provider para crear una variable que apunte a una carpeta en especial, en este caso a la
        carpeta theme */

        View::share('theme', 'lte');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
