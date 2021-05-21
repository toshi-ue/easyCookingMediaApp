<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Schema::defaultStringLength(191);
        if (\App::environment('production')) {
            \URL::forceScheme('https');
        }

        $cookingtools = [
            1 => '包丁',
            2 => 'まな板',
            3 => '鍋',
            4 => '調理バサミ',
            5 => '箸',
            6 => 'ピーラー',
            7 => 'スライサー',
            8 => 'ホットプレート'
        ];
        view()->share('cookingtools', $cookingtools);
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
