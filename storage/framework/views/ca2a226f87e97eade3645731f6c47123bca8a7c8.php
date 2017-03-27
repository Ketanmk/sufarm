<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">User |
        <?php if(isset($user)): ?>
            edit
        <?php else: ?>
            Add
        <?php endif; ?></h4>
</div>
<?php if(isset($user)): ?>
    <?php echo e(Form::model($user, ['route' => ['users.updatepassword', $user->id], 'method' => 'patch', 'id'=>'formTest'])); ?>

<?php else: ?>
    <?php echo e(Form::open(['route' => 'users.store', 'id'=>'formTest'])); ?>

<?php endif; ?>
<div class="modal-body">
    <div class="form-body">
        <div class="form-group">
            <div class="form-group"><label>Password</label>
                <?php echo e(Form::password('password',['class'=>'form-control','placeholder'=>'Password'])); ?>

            </div>
        </div>
        <div class="form-group">
            <div class="form-group"><label>Password Confirmation</label>
                <?php echo e(Form::password('password_confirmation',['class'=>'form-control','placeholder'=>'Password Confirmation'])); ?>

            </div>
        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="submit" class="btn green" name="status" value="1"
            data-loading-text="<?php echo e(trans('main.labels.loading')); ?>..."
            id="save" data-style="expand-right"><?php echo e(trans('main.labels.save')); ?>

    </button>

    <button type="button" class="btn default"
            name="cancel" data-dismiss="modal"><?php echo e(trans('main.labels.cancel')); ?>

    </button>
</div>
<?php echo e(Form::close()); ?>

