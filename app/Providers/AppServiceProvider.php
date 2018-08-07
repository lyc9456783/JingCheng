<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Cates;
use App\Models\Goods;
use App\Models\Links;
use App\Models\Config;
use App\Models\Users;
use App\Models\ShopCars;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 共享的分类数据
       $common_cates_data = Cates::where('path','!=','0')->get();
       //友情链接数据
        $common_links_data = Links::where('lstate','1')->get();
        //网站配置数据
        $common_configs_data = Config::first();
        //购物车所有数据
        $common_shopcars_data = ShopCars::get();
        if($common_shopcars_data){
            view()->share(
            [
                'common_cates_data'   => $common_cates_data,
                'common_links_data'   => $common_links_data,
                'common_configs_data' => $common_configs_data,
                'common_shopcars_data'=> $common_shopcars_data,
            ]
            );
        }else{
            view()->share(
                [
                    'common_cates_data'  => $common_cates_data,
                    'common_links_data'  => $common_links_data,
                    'common_configs_data'=> $common_configs_data,
                ]
            );
        }

        //共享数据

	
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
