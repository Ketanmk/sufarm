<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
    <h4 class="modal-title">Galleries
        <?php if(isset($category)): ?>
            edit
        <?php else: ?>
            Add
        <?php endif; ?></h4>
</div>
<?php if(isset($category)): ?>
    <?php echo e(Form::model($category, ['route' => ['categories.update', $category->id], 'method' => 'patch', 'id'=>'formTest'])); ?>

<?php else: ?>
    <?php echo e(Form::open(['route' => 'categories.store', 'id'=>'formTest'])); ?>

<?php endif; ?>
<div class="modal-body">
    <div class="form-body">
        <div class="form-group"><label>Name</label>
            <?php echo e(Form::text('name',null,['class'=>'form-control','placeholder'=>"Name"])); ?>


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

