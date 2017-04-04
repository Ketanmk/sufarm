<?php

namespace App\Http\Controllers\Api;

use App\Models\Categories;
use Illuminate\Http\Request;

class GalleryController extends ApiController
{
    public function index($id = '')
    {
        $limit     = request('limit') ?: 10;
        $galleries = new Categories();
        if ($id) {
            $galleries = $galleries->where('category_id', $id);
        }
        $galleries = $galleries->with('parent', 'createdBy', 'updatedBy')->paginate($limit);
        $galleries->appends(['limit' => $limit]);
        return $this->setStatusCode(200)
            ->respond(['data' => $this->transformCollection(collect($galleries->all()))
                , 'paginator' => [
                    'total_count'  => $galleries->total(),
                    'current_page' => $galleries->currentPage(),
                    'next_page'    => $galleries->nextPageUrl(),
                    'prev_page'    => $galleries->previousPageUrl(),
                    'total_pages'  => ceil($galleries->total() / $galleries->perPage()),
                ]]);
    }

    public function show($id)
    {
        $gallery = Categories::with('parent', 'createdBy', 'updatedBy')->find($id);

        return $this->transform($gallery->toArray());
    }

    private function transformCollection($galleries)
    {
        //dd($galleries->toArray());
        return array_map([$this, 'transform'], $galleries->toArray());
    }

    private function transform($galleries)
    {
        return [
            'id'           => $galleries['id'],
            'title'        => $galleries['name'],
            'main_gallery' => $galleries['parent']['name'],
            'created_by'   => $galleries['created_by']['name'],
            'active'       => (boolean) $galleries['status'],
        ];
    }
}
