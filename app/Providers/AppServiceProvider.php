<?php

namespace App\Providers;

use App\Models\Campain;
use App\Models\Partner;
use App\Models\Program;
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
        try {
            View::share('setting', Setting::first());
            View::share('campains', Campain::oldest()->get());
            View::share('partners', Partner::oldest()->get());
            View::share('programs', Program::ordered()->get());
        } catch (\Throwable $e) {
            View::share('setting', null);
            View::share('campains', collect());
            View::share('partners', collect());
            View::share('programs', collect());
        }
    }
}
