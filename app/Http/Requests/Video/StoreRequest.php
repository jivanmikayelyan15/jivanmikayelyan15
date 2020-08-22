<?php

namespace App\Http\Requests\Video;

use App\Models\Video;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property string name
 * @property string description
 * @property string tag
 */
class StoreRequest extends FormRequest
{
    public $video;

    public function rules(): array
    {
        return [
            'name'          => 'required|max:50',
            'description'   => 'required',
            'tag'           => 'required'
        ];
    }

    public function persist(): self
    {
        $this->video = Video::create([
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
