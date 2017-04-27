<?php

namespace App\Http\Controllers\Api;

use App\Models\Production;
use Illuminate\Http\Request;

class ProductController extends ApiController
{

    public function index($id = '')
    {
        $limit = request('limit') ?: 10;

        $products = new Production();

        if ($id) {
            $photos = $products->where('category_id', $id);
        }

        if (request('from')){
            $products = $products->where('date','>=',request('from'));
        }
        if (request('to')){
            $products = $products->where('date','<=',request('to'));
        }
        $products = $products->orderBy('created_at')->with(['product','productType'])->paginate($limit);
        $products->appends(['limit' => $limit]);
        return $this->setStatusCode(200)
            ->respond(['data' => $this->transformCollection(collect($products->all()))
                , 'paginator' => [
                    'total_count'  => $products->total(),
                    'current_page' => $products->currentPage(),
                    'next_page'    => $products->nextPageUrl(),
                    'prev_page'    => $products->previousPageUrl(),
                    'total_pages'  => ceil($products->total() / $products->perPage()),
                ]]);
    }
    private function transformCollection($products)
    {
        //dd($galleries->toArray());
        return array_map([$this, 'transform'], $products->toArray());
    }

    private function transform($products)
    {
       // dd($products);
        if (request('fetch') == 'product'){
            return [
                'product'=>$products['product']['name']
            ];
        }
        if (request('fetch') == 'quantity') {
            return [
                'quantity' => $products['quantity_produced']
            ];
        }
        return [
            'id'           => $products['id'],
            'date'        => $products['date'],
            'product'        => $products['product']['name'],
            'product_type' => $products['product_type']['name'],
            'quantity_produced' => $products['quantity_produced'],
            'created'      => $products['created_at_timestamp'],
        ];
    }
}
