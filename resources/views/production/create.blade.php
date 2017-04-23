<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Production Data |
        @if(isset($productionData))
            edit
        @else
            Add
        @endif</h4>
</div>
@if(isset($productionData))
    {{ Form::model($productionData, ['route' => ['production.update', $productionData->id], 'method' => 'patch', 'id'=>'formTest']) }}
@else
    {{ Form::open(['route' => 'production.store', 'id'=>'formTest']) }}
@endif
<div class="modal-body">
    <div class="form-body">
        <div class="form-group"><label>Date</label>
            {{Form::date('date',null,['class'=>'form-control','placeholder'=>"Date"])}}
        </div>

        <div class="form-group"><label>Product Name</label>
            {{Form::select('product_id',$products,null,['class'=>'form-control','placeholder'=>"Product Name"])}}
        </div>

        <div class="form-group"><label>Product type</label>
            {{Form::select('product_type_id',$productTypes,null,['class'=>'form-control','placeholder'=>"Product type"])}}

        </div>

        <div class="form-group"><label>Quantity Produced</label>
            {{Form::text('quantity_produced',null,['class'=>'form-control','placeholder'=>"Quantity Produced"])}}
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
