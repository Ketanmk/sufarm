<?php $__env->startSection('title', 'Main page'); ?>
<?php $__env->startSection('content'); ?>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="passport" id="passport">
                    <!-- let people make clients -->

                    <!-- list of clients people have authorized to access our account -->
                    <passport-authorized-clients></passport-authorized-clients>

                    <!-- make it simple to generate a token right in the UI to play with -->
                    <passport-personal-access-tokens></passport-personal-access-tokens>
                </div>
            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
    <script src="<?php echo asset('js/passport.js'); ?>" type="text/javascript"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.apptokens', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>