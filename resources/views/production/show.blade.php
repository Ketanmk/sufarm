<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Production Data | Product #{{$productionDate->id}}
    </h4>
</div>
<div class="modal-body">
    <div class="row"></div>
    <div class="row">
        <div class="form-group"><label>Date : </label>
            {{$productionDate->date}}

        </div>
    </div>
    <div class="row">
        <div class="form-group"><label>Product Name : </label>
            {{$productionDate->product_name or ''}}
        </div>
    </div>
    <div class="row">
        <div class="form-group"><label>Product type : </label>
            {{$productionDate->product_type or ''}}
        </div>
    </div>
    <div class="row">
        <div class="form-group"><label>Quantity Produced : </label>
            {{$productionDate->quantity_produced or ''}}
        </div>
    </div>

</div>
<div class="modal-footer">
    <button type="button" class="btn default"
            name="cancel" data-dismiss="modal">Close
    </button>
</div>