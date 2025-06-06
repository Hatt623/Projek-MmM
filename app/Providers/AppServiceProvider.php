<?php

namespace App\Providers;
use App\Models\Transaksi;
use App\Observers\TransaksiObserver;

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
        Transaksi::observe(TransaksiObserver::class);
    }
}
