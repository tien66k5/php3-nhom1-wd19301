<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */

    public function boot()
    {
        // DB::listen(function ($query) {
        //     Log::info('SQL Executed:', [
        //         'query' => $query->sql,
        //         'bindings' => $query->bindings,
        //         'time' => $query->time . 'ms'
        //     ]);
        // }); 
        //  kiểm tra log sql
      
    }
}
