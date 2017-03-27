<?php $__env->startSection('title', 'Manage Users'); ?>

<?php $__env->startSection('content'); ?>
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>Users</h2>
            <ol class="breadcrumb">
                <li>
                    <a href="<?php echo e(url('/')); ?>">Home</a>
                </li>

                <li class="active">
                    <strong>Users</strong>
                </li>
            </ol>
        </div>
        <div class="col-lg-2">

        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <?php if(session('status')): ?>
            <div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                <?php echo session('status'); ?>.
            </div>
        <?php endif; ?>
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Here you can manage Application Users</h5>
                        <div class="ibox-tools">

                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"
                               data-href='<?php echo e(route('users.create')); ?>'>
                                Create<i class="fa fa-plus" aria-hidden="true"></i>
                            </a>
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example">
                                <thead>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Created By</th>
                                    <th>Last Updated By</th>
                                    <th width="5%"><?php echo e(trans('main.titles.status')); ?></th>
                                    <th width="20%"><?php echo e(trans('main.titles.actions')); ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr class="gradeX">
                                        <td><?php echo e($loop->iteration); ?></td>
                                        <td><?php echo e($user->name); ?></td>
                                        <td><?php echo e(isset($user->email) ? $user->email : ''); ?></td>
                                        <td><?php echo e(isset($user->createdBy->name) ? $user->createdBy->name : ''); ?></td>
                                        <td><?php echo e(isset($user->updatedBy->name) ? $user->updatedBy->name : ''); ?></td>
                                        <td>
                                            <?php echo e(($user->status) ? 'Active' : ''); ?>

                                        </td>
                                        <td class="center">
                                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"
                                               data-href='<?php echo e(route('users.editpassword',$user->id)); ?>'><i
                                                        class="fa fa-key"
                                                        aria-hidden="true"></i> </a>
                                            <a data-toggle="modal" class="btn btn-primary" href="#modal-form"
                                               data-href='<?php echo e(route('users.edit',$user->id)); ?>'>
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i> </a>
                                            <a data-popout="true" data-token='<?php echo e(csrf_token()); ?>'
                                               data-hreff='<?php echo e(route('users.destroy',$user->id)); ?>'
                                               data-url='<?php echo e(route('users.index')); ?>' data-id='<?php echo e($user->id); ?>'
                                               class="btn btn-danger red-mint delete-ajax"
                                               data-toggle="confirmation"
                                               data-original-title="<?php echo e(trans('main.labels.delete_confirmation_message')); ?>"
                                               data-placement="top"
                                               data-btn-ok-label="<?php echo e(trans('main.labels.delete')); ?>"
                                               data-btn-cancel-label=" <?php echo e(trans('main.labels.cancel')); ?>">
                                                <i class="fa fa-trash-o"></i></a>
                                            <?php if($user->status == 1): ?>
                                                <a data-popout="true" data-token='<?php echo e(csrf_token()); ?>'
                                                   class="btn btn-danger red-mint delete-ajax"
                                                   data-hreff='<?php echo e(route('users.deactivate',$user->id)); ?>'
                                                   data-url='<?php echo e(route('users.index')); ?>'
                                                   data-id='<?php echo e($user->id); ?>'
                                                   data-toggle="confirmation"
                                                   data-original-title="<?php echo e(trans('main.labels.deactivate_confirmation_message')); ?>"
                                                   data-placement="left"
                                                   data-btn-ok-label="<?php echo e(trans('main.labels.deactivate')); ?>"
                                                   data-btn-cancel-label=" <?php echo e(trans('main.labels.cancel')); ?>">
                                                    <i class="fa fa-power-off" aria-hidden="true"></i>
                                                </a>
                                            <?php else: ?>
                                                <a data-popout="true" data-token='<?php echo e(csrf_token()); ?>'
                                                   class="btn btn-success  red-mint delete-ajax"
                                                   data-hreff='<?php echo e(route('users.activate',$user->id)); ?>'
                                                   data-url='<?php echo e(route('users.index')); ?>'
                                                   data-toggle="confirmation"
                                                   data-original-title="<?php echo e(trans('main.labels.activate_confirmation_message')); ?>"
                                                   data-placement="left"
                                                   data-btn-ok-label="<?php echo e(trans('main.labels.activate')); ?>"
                                                   data-btn-cancel-label=" <?php echo e(trans('main.labels.cancel')); ?>">
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                </a>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th width="5%">#</th>
                                    <th>User Name</th>
                                    <th>User Email</th>
                                    <th>Created By</th>
                                    <th>Last Updated By</th>
                                    <th width="5%"><?php echo e(trans('main.titles.status')); ?></th>
                                    <th width="20%"><?php echo e(trans('main.titles.actions')); ?></th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="modal-form" class="modal fade" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('scripts'); ?>
    <script>
        $(document).ready(function () {


        });

    </script>
    <script src="<?php echo e(asset('js/custom.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>