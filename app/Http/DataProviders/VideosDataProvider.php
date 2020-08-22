<?php

namespace App\Http\DataProviders;

use App\Http\Requests\Video\IndexRequest;
use App\Models\Video;
use Illuminate\Database\Eloquent\Builder;

class VideosDataProvider
{
    private $request;

    public function __construct(IndexRequest $request)
    {
        $this->request = $request;
    }

    private function query(): Builder
    {
        return Video::where(function (Builder $query){
            $query->orWhere('name', 'like', $this->request->name_starting.'%');
        })->where(function (Builder $query){
            $query->orWhere('name', 'like', '%'.$this->request->name_ending);
        });

    }

    public function getData(){
        return $this->query()->latest()->paginate(20);
    }
}
