<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Helpers\Contracts\SearchInterface;
use App\Helpers\SQLsearch;
use App\Helpers\EloqumentSearch;
use App;

class SearchProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        App::singleton(SearchInterface::class, SQLsearch::class);
        //App::singleton(SearchInterface::class, EloqumentSearch::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
