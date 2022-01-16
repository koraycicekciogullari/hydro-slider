<?php

use Illuminate\Support\Facades\Route;
use Koraycicekciogullari\HydroSlider\Controllers\SliderOrderController;
use Koraycicekciogullari\HydroSlider\Controllers\SliderController;

Route::middleware(['auth:sanctum', 'api'])->prefix('api/admin')->group(function () {
    Route::apiResource('slider', SliderController::class)->except('edit', 'create');
    Route::post('slider-order', SliderOrderController::class);
});
