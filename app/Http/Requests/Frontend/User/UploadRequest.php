<?php

namespace App\Http\Requests\Frontend\User;

use App\Http\Requests\Request;

/**
 * Class UpdateProfileRequest.
 */
class UploadRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $rules = [
            'description' => 'required',
            'title' => 'required',
            // 'price' => 'required',
        ];
        $photos = count($this->input('file'));
        foreach(range(0, $photos) as $index) {
            $rules['file.' . $index] = 'image|mimes:jpeg,bmp,png|max:20000';
        }

        return $rules;
    }
}
