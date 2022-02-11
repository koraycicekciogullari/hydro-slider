<?php

namespace Koraycicekciogullari\HydroSlider\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SliderCollection extends ResourceCollection
{

    /**
     * @param Request $request
     * @return AnonymousResourceCollection
     */
    public function toArray($request): AnonymousResourceCollection
    {
        return SliderResource::collection($this->collection);
    }
}
