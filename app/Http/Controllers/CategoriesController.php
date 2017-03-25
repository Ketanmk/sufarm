<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoriesRequest;
use App\Models\Categories;
use Illuminate\Http\Request;

class CategoriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Categories::all()->pluck('name', 'id');

        return view('categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoriesRequest $request)
    {
        $category = Categories::create([
            'name' => $request->name,
            'category_id' => ($request->category_id) ? $request->category_id : NULL,
        ]);

        return 'Gallery Created!!';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Categories::where('id', '<>', $id)->get()->pluck('name', 'id');
        $category = Categories::find($id);
        return view('categories.create', compact('categories', 'category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoriesRequest $request, $id)
    {
        $category = Categories::find($id);
        $category->update([
            'name' => $request->name,
            'category_id' => ($request->category_id) ? $request->category_id : NULL,
        ]);

        return 'Gallery Updated!!';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::with('child','photos')->find($id);
        if (count($category->child) > 0) {
            return 'you can\'t delete this gallery you should delete child galleries first';
        }
        if (count($category->photos) > 0) {
            return 'you can\'t delete this gallery you should delete child photos first';
        }

        $category->delete();

        return 'Gallery deleted';

    }

    public function activate($id)
    {
        $category = Categories::findOrFail($id);


        $category->status = 1;
        $category->save();

        return trans('main.labels.activated');
    }

    public function deactivate($id)
    {
        $category = Categories::findOrFail($id);


        $category->status = 0;
        $category->save();

        return trans('main.labels.deactivated');
    }
}
