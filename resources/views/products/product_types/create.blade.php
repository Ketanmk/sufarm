<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Product Types
        @if(isset($productType))
            edit
        @else
            Add
        @endif</h4>
</div>
@if(isset($productType))
    {{ Form::model($productType, ['route' => ['product-types.update', $productType->id], 'method' => 'patch', 'id'=>'formTest']) }}
@else
    {{ Form::open(['route' => 'product-types.store', 'id'=>'formTest']) }}
@endif
<div class="modal-body">
    <div class="form-body">
        <div class="form-group"><label>Name</label>
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>"Name"])}}

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
