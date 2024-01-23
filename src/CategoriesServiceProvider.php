<?php

namespace Uptoolkit\Categories;

use Illuminate\Support\ServiceProvider;

class CategoriesServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_categories_tables.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_categories_tables.php'),
        ], 'migrations');

        $this->publishes([
            __DIR__.'/../config/categories.php' => config_path('categories.php'),
        ], 'config');
    }

    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/categories.php', 'categories');
    }
}
