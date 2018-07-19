<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cates;
use App\Models\Goods;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $common_cates_data = Cates::where('path','!=','0')->get();
        //共享数据
        view()->share('common_cates_data', $common_cates_data);
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
