<?php

namespace Koraycicekciogullari\HydroSlider\Controllers;

use App\Http\Controllers\Controller;
use Koraycicekciogullari\HydroSlider\Models\Slider;
use Illuminate\Http\Request;

class SliderOrderController extends Controller
{
    /**
     * @param Request $request
     */
    public function __invoke(Request $request)
    {
        foreach ($request->all() as $index => $id){
            Slider::find($id)->update(['order' => $index]);
        }
    }
}
