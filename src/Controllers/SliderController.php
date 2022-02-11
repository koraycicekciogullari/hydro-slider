<?php

namespace Koraycicekciogullari\HydroSlider\Controllers;

use App\Http\Controllers\Controller;
use Koraycicekciogullari\HydroSlider\Models\Slider;
use Koraycicekciogullari\HydroSlider\Requests\SliderStoreRequest;
use Koraycicekciogullari\HydroSlider\Requests\SliderUpdateRequest;
use Koraycicekciogullari\HydroSlider\Resources\SliderCollection;
use Koraycicekciogullari\HydroSlider\Resources\SliderResource;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;

class SliderController extends Controller
{

    public function __construct()
    {
        $this->middleware('role_or_permission:admin|root|slider index')->only(['index']);
        $this->middleware('role_or_permission:admin|root|slider store')->only(['store']);
        $this->middleware('role_or_permission:admin|root|slider show')->only(['show']);
        $this->middleware('role_or_permission:admin|root|slider update')->only(['update']);
        $this->middleware('role_or_permission:admin|root|slider destroy')->only(['destroy']);
    }

    /**
     * @return SliderCollection
     */
    public function index(): SliderCollection
    {
        return new SliderCollection(Slider::orderBy('order')->get());
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function store(SliderStoreRequest $request): SliderResource
    {
        return new SliderResource(Slider::create($request->validated())->addMediaFromRequest('image')->toMediaCollection());
    }

    /**
     * @param Slider $slider
     * @return SliderResource
     */
    public function show(Slider $slider): SliderResource
    {
        return new SliderResource($slider->load('media'));
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function update(SliderUpdateRequest $request, Slider $slider): SliderResource
    {
        $slider->update($request->validated());
        if($request->hasFile('image')){
            $slider->clearMediaCollection();
            $slider->addMediaFromRequest('image')->toMediaCollection();
        }
        return new SliderResource($slider->load('media'));
    }

    /**
     * @param Slider $slider
     */
    public function destroy(Slider $slider)
    {
        $slider->clearMediaCollection();
        $slider->delete();
    }
}
