<?php

namespace Koraycicekciogullari\HydroSlider;

class ServiceProvider extends \Illuminate\Support\ServiceProvider
{
    const CONFIG_PATH = __DIR__ . '/../config/hydro-slider.php';

    public function boot()
    {
        $this->publishes([
            self::CONFIG_PATH => config_path('hydro-slider.php'),
        ], 'config');
        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
        $this->loadRoutesFrom(__DIR__ . '/Routes/slider-route.php');
    }

    public function register()
    {
        $this->mergeConfigFrom(
            self::CONFIG_PATH,
            'hydro-slider'
        );
    }
}
