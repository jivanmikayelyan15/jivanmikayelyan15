<?php

namespace App\Http\Controllers;

use App\Http\DataProviders\VideosDataProvider;
use App\Http\Requests\Video\IndexRequest;
use App\Http\Requests\Video\StoreRequest;
use App\Http\Requests\Video\UpdateRequest;
use App\Models\Video;

class VideosController extends Controller
{
    public function index()
    {
        $videos = Video::latest()->paginate(20);
        return view('videos.index', compact('videos'))->with('1', (request()->input('page', 1) - 1) * 20);
    }


    public function search(IndexRequest $request, VideosDataProvider $dataProvider)
    {
        $videos = $dataProvider->getData();
        return view('videos.index', compact('videos'))->with('1', (request()->input('page', 1) - 1) * 20);

    }

    public function create()
    {
        return view('videos.create');
    }

    public function store(StoreRequest $request)
    {
        $request->persist()->getVideo();

        return redirect()->route('videos.index')->with('success', "Video created");

    }

    public function edit(Video $video)
    {
        return view('videos.edit', compact('video'));
    }

    public function update(UpdateRequest $request, Video $video)
    {
        $request->persist()->getVideo();

        return redirect()->route('videos.index')->with('success', "Video updated");
    }

    public function destroy(Video $video)
    {
        $video->delete();
        return redirect()->route('videos.index')->with('success', "Video deleted");
    }




}
