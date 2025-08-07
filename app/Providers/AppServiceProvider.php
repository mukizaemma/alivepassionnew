<?php

namespace App\Providers;

use App\Models\Campain;
use App\Models\Partner;
use App\Models\Setting;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {
        //View::share('setting', Setting::first());
        //View::share('campains', Campain::oldest()->get());
        //View::share('partners', Partner::oldest()->get());
    }
}
