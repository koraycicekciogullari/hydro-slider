<?php

namespace Koraycicekciogullari\HydroSlider\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SliderUpdateRequest extends FormRequest
{

    /**
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * @return string[][]
     */
    public function rules(): array
    {
        return [
            'title'         => ['required'],
            'description'   => ['required'],
            'button_text'   => ['required'],
            'button_link'   => ['required'],
        ];
    }
}
