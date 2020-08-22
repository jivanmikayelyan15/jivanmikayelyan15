<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property Video video
 * @property string name
 * @property string description
 * @property string tag
 */
class UpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'          => 'sometimes|required|max:50',
            'description'   => 'sometimes|required',
            'tag'           => 'sometimes|required'
        ];
    }

    public function persist(): self
    {
        $this->video->update([
            'name'          => $this->name,
            'description'   => $this->description,
            'tag'           => $this->tag
        ]);

        return $this;
    }

    public function getVideo(): Video
    {
        return $this->video;
    }
}
