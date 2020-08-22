<?php

namespace App\Http\Requests\Video;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string name_starting
 * @property string name_ending
 */
class IndexRequest extends FormRequest
{
    public function rules()
    {
        return [
            //
        ];
    }
}
