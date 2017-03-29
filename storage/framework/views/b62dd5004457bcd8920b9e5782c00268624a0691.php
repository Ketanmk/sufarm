<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Photos |
        <?php if(isset($photo)): ?>
            edit
        <?php else: ?>
            Add
        <?php endif; ?></h4>
</div>
<?php if(isset($photo)): ?>
    <?php echo e(Form::model($photo, ['route' => ['photos.update', $photo->id], 'method' => 'patch', 'id'=>'formTest'])); ?>

<?php else: ?>
    <?php echo e(Form::open(['route' => 'photos.store', 'id'=>'formTest'])); ?>

<?php endif; ?>
<div class="modal-body">
    <div class="form-body">
        <div class="form-group"><label>Name</label>
            <?php echo e(Form::text('name',null,['class'=>'form-control','placeholder'=>"Name"])); ?>


        </div>
        <?php if(!isset($photo)): ?>
            <div class="row">
                <div class="col-lg-12">
                    <label>Photo:</label>
                    <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                        <div class="form-control" data-trigger="fileinput">
                            <i class="glyphicon glyphicon-file fileinput-exists"></i>
                            <span class="fileinput-filename"></span>
                        </div>
                        <span class="input-group-addon btn btn-default btn-file">
                        <span class="fileinput-new">Select file</span>
                        <span class="fileinput-exists">Change</span>
                        <input type="file" name="photo"/>
                    </span>
                        <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>

                    </div>
                </div>
            </div>
        <?php endif; ?>
        <div class="form-group"><label>Description</label>
            <?php echo e(Form::textarea('details',null,['class'=>'form-control','placeholder'=>"Description",'size' => '30x5'])); ?>


        </div>
        <div class="form-group">
            <div class="form-group"><label>Main Gallery</label>
                <?php echo e(Form::select('category_id',$categories,null,['class'=>'form-control','placeholder'=>'Main Gallery'])); ?>

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

