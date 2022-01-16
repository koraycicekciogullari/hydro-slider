<?php

namespace Koraycicekciogullari\HydroSlider\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $media
 * @property mixed $description
 * @property mixed $button_text
 * @property mixed $button_link
 */
class SliderResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            'id'            => $this->id,
            'title'         => $this->title,
            'description'   => $this->description,
            'button_text'   => $this->button_text,
            'button_link'   => $this->button_link,
            'image'         => collect($this->media)->whereIn('collection_name', 'default')->first(),
        ];
    }
}
