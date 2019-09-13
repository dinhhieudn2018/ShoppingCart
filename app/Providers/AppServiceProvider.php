<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Categories;
use App\Models\ProductTypes;
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
        $category = Categories::where('status',1)->get();
        $producttype = ProductTypes::where('status',1)->get();
        view()->share(['category' => $category, 'producttype' => $producttype]);
    }
}
