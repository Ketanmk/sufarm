<?php

namespace App\Http\Controllers;

use App\Http\Requests\PhotoRequestUpdate;
use App\Http\Requests\PhotosRequest;
use App\Models\Categories;
use App\Models\Photo;
use Illuminate\Http\Request;

class PhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $photos = Photo::get();

        return view('photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all()->pluck('name', 'id');

        return view('photos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhotosRequest $request)
    {

        $file = customUploadFile('photo', $path = "photos");
        $photo = Photo::create([
            'name' => $request->name,
            'details' => $request->details,
            'photo' => $file,
            'category_id' => $request->category_id
        ]);

        return 'Photo Uploaded!';

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = Photo::find($id);

        return view('photos.show',compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $photo = Photo::find($id);
        $categories = Categories::all()->pluck('name', 'id');

        return view('photos.create', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhotoRequestUpdate $request, $id)
    {
        $photo = Photo::find($id);

        $photo->update([
            'name' => $request->name,
            'details' => $request->details,
            'category_id' => $request->category_id
        ]);

        return 'Updated!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = Photo::find($id);
        $photo->delete();

        return 'Deleted!!';
    }

    public function activate($id)
    {
        $photo = Photo::findOrFail($id);


        $photo->status = 1;
        $photo->save();

        return trans('main.labels.activated');
    }

    public function deactivate($id)
    {
        $photo = Photo::findOrFail($id);


        $photo->status = 0;
        $photo->save();

        return trans('main.labels.deactivated');
    }
}
