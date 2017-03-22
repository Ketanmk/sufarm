<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Galleries
        @if(isset($category))
            edit
        @else
            Add
        @endif</h4>
</div>
@if(isset($category))
    {{ Form::model($device, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'id'=>'formTest']) }}
@else
    {{ Form::open(['route' => 'categories.store', 'id'=>'formTest']) }}
@endif
<div class="modal-body">
    <div class="form-body">
        <div class="form-group"><label>Name</label>
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>"Name"])}}

        </div>
        <div class="form-group">
            <div class="form-group"><label>Main Gallery</label>
                {{Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Main Gallery'])}}
            </div>

        </div>


    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn green" name="status" value="1"
            data-loading-text="{{ trans('main.labels.loading') }}..."
            id="save" data-style="expand-right">{{ trans('main.labels.save') }}
    </button>

    <button type="button" class="btn default"
            name="cancel" data-dismiss="modal">{{ trans('main.labels.cancel') }}
    </button>
</div>
{{Form::close()}}
