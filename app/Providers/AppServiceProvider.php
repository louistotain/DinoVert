<?php

namespace App\Providers;

use App\Models\Propertiescateg;
use App\Models\Property;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*', function($view){

            $view_name = str_replace('.', '-', $view->getName());

            view()->share('view_name', $view_name);

            $lasted_properties = Property::with(['pictures' => function ($query) {
                $query->select('id', 'url');
            }])->get(['id', 'price', 'location', 'm²', 'pieces', 'state', 'year_construction', 'description', 'propertiescategs_id', 'created_at', 'updated_at'])->sortByDesc('created_at')->take(3);

            $propertiescategs = Propertiescateg::all();

            view()->share(['lasted_properties' => $lasted_properties, 'propertiescategs' => $propertiescategs]);

        });
    }
}
