<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use Illuminate\Http\Request;

class ApiPhotosController extends ApiController
{
    //
    public function index($id = '')
    {
        $limit = request('limit') ?: 10;

        $photos = new Photo();
        if ($id){
            $photos = $photos->where('category_id',$id);
        }

        $photos = $photos->with('category', 'createdBy', 'updatedBy')->paginate($limit);
        $photos->appends(['limit' => $limit]);
        return $this->setStatusCode(200)
            ->respond(['photos' => $this->transformCollection(collect($photos->all()))
                , 'paginator' => [
                    'total_count' => $photos->total(),
                    'current_page' => $photos->currentPage(),
                    'next_page' => $photos->nextPageUrl(),
                    'prev_page' => $photos->previousPageUrl(),
                    'total_pages' => ceil($photos->total() / $photos->perPage()),
                ]]);
       // dd($photos->all());
    }
    public function show($id)
    {
        $photo = Photo::with('category', 'createdBy', 'updatedBy')->find($id);

        return $this->transform($photo->toArray());
    }

    private function transformCollection($photos)
    {
        //dd($galleries->toArray());
        return array_map([$this, 'transform'], $photos->toArray());
    }

    private function transform($photos)
    {
        return [
            'id' => $photos['id'],
            'title' => $photos['name'],
            'photo'=>url("uploads/" . $photos['photo']),
            'main_gallery' => $photos['category']['name'],
            'created_by' => $photos['created_by']['name'],
            'active' => (boolean)$photos['status']
        ];
    }
}
