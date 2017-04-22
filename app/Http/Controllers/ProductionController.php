<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductionDataRequest;
use App\Models\Production;
use Illuminate\Http\Request;

class ProductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productionData = Production::all();

        return view('production.index', compact('productionData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('production.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductionDataRequest $request)
    {
        $productionData = Production::create([
            'date' => $request->date,
            'product_name' => $request->product_name,
            'product_type' => $request->product_type,
            'quantity_produced' => $request->quantity_produced
        ]);

        return 'Product Added';
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $productionDate = Production::find($id);

        return view('production.show', compact('productionDate'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $productionData = Production::find($id);

        return view('production.create', compact('productionData'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductionDataRequest $request, $id)
    {
        $productionData = Production::find($id);

        $productionData->update([
            'date' => $request->date,
            'product_name' => $request->product_name,
            'product_type' => $request->product_type,
            'quantity_produced' => $request->quantity_produced
        ]);

        return 'Product Saved';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $productionData = Production::find($id);

        $productionData->delete();

        return 'Product Removed';
    }
}
