<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Products Master
        @if(isset($product))
            edit
        @else
            Add
        @endif</h4>
</div>
@if(isset($product))
    {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'patch', 'id'=>'formTest']) }}
@else
    {{ Form::open(['route' => 'products.store', 'id'=>'formTest']) }}
@endif
<div class="modal-body">
    <div class="form-body">
        <div class="form-group"><label>Product Name</label>
            {{Form::text('name',null,['class'=>'form-control','placeholder'=>"Product Name"])}}

        </div>
        <div class="form-group">
            <div class="form-group"><label>Product Type</label>
                {{Form::select('product_type_id',$productTypes,null,['class'=>'form-control','placeholder'=>'Product Type'])}}
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
