<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">User | Change Password</h4>
</div>
    {{ Form::model($user, ['route' => ['users.updatemypassword', \Illuminate\Support\Facades\Auth::user()->id], 'method' => 'patch', 'id'=>'formTest']) }}

<div class="modal-body">
    <div class="form-body">
        <div class="form-group">
            <div class="form-group"><label>Old Password</label>
                {{Form::password('oldpassword',['class'=>'form-control','placeholder'=>'Old Password'])}}
            </div>
        </div>
        <div class="form-group"><label>Password</label>
            {{Form::password('password',['class'=>'form-control','placeholder'=>'Password'])}}
        </div>
    </div>
        <div class="form-group">
            <div class="form-group"><label>Password Confirmation</label>
                {{Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Password Confirmation'])}}
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
