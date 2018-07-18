<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Links;

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
        $common_links_data = Links::where('lstate','1')->get();
        //共享数据
        view()->share(['common_cates_data'=>$common_cates_data,'common_links_data'=>$common_links_data]);
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
