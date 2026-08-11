<?php

namespace App\Providers;

use App\Models\Campain;
use App\Models\PageHero;
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
        View::share('setting', $this->safeShare(fn () => Setting::first()));
        View::share('campains', $this->safeShare(fn () => Campain::oldest()->get(), collect()));
        View::share('partners', $this->safeShare(fn () => Partner::oldest()->get(), collect()));
        View::share('programs', $this->safeShare(fn () => Program::ordered()->get(), collect()));
        View::share('pageHeroes', $this->safeShare(fn () => PageHero::query()->pluck('image', 'page_key'), collect()));
    }

    protected function safeShare(callable $callback, $fallback = null)
    {
        try {
            return $callback();
        } catch (\Throwable $e) {
            return $fallback;
        }
    }
}
