<?php

namespace App\Providers;

use App\Models\Appoiment;
use App\Models\System;
use App\Observers\AppoimentObserver;
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
        app()->singleton('allowedToAddAppoiment',function(){
            $appoiment = new Appoiment();
            return $appoiment->checkExaminationServiceExist();
        });

        app()->singleton('getSystemVariable',function($app,$param){
            return System::where('key',$param['key'])->first();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Appoiment::observe(AppoimentObserver::class);
    }
}
