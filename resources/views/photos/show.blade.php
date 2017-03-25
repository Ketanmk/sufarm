<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Photos | Photo #{{$photo->id}}
    </h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-8">
            <img src="{{url('uploads/'.$photo->photo)}}" alt="" style="width: 500px;height: 500px;">
        </div>
        <div class="col-md-2"></div>

    </div>
    <div class="row">
        <hr>
    </div>
    <div class="row"></div>
    <div class="row">
        <div class="form-group"><label>Name : </label>
            {{$photo->name}}

        </div>
    </div>
    <div class="row">
        <div class="form-group"><label>Gallery : </label>
            {{$photo->category->name or ''}}
        </div>
    </div>
    <div class="row">
        <div class="form-group"><label>Description : </label>
            {{$photo->details or ''}}
        </div>
    </div>
    <div class="row">
        <div class="form-group"><label>Status : </label>
            {{($photo->status) ? 'Active' : ''}}
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn default"
            name="cancel" data-dismiss="modal">Close
    </button>
</div>