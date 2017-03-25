<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo e(trans('login.title')); ?></title>


    <link rel="stylesheet" href="<?php echo asset('css/vendor.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo asset('css/app.css'); ?>"/>
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>

<body class="gray-bg">

<div class="middle-box text-center loginscreen animated fadeInDown">
    <div>
        <div>

            <h1 class="logo-name"><br/></h1>

        </div>
        <h3><?php echo e(trans('login.welcome')); ?></h3>
        

        <form class="m-t" action="<?php echo e(url('/login')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group <?php echo e(($errors->has('email')) ? 'has-error' : ''); ?>">
                <?php echo e(Form::text('email',null,['id'=>'email','class'=>'form-control','placeholder'=>trans('register.email')])); ?>

                <?php if($errors->has('email')): ?>
                    <span class="help-block m-b-none"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e(($errors->has('password')) ? 'has-error' : ''); ?>">
                <?php echo e(Form::password('password',['id'=>'password','class'=>'form-control','placeholder'=>trans('register.password')])); ?>

                <?php if($errors->has('password')): ?>
                    <span class="help-block m-b-none"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
            <button type="submit" class="btn btn-primary block full-width m-b"><?php echo e(trans('login.login')); ?></button>

            <a href="<?php echo e(url('/password/reset')); ?>">
                <small><?php echo e(trans('login.forgot')); ?></small>
            </a>
            <p class="text-muted text-center"><small>Do not have an account?</small></p>
            <a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/register')); ?>">Create an account</a>
        </form>
        <p class="m-t">
            <small><?php echo e(trans('login.copy')); ?> &copy; 2017</small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

<?php $__env->startSection('scripts'); ?>
    <script>

    </script>
<?php echo $__env->yieldSection(); ?>

</body>

</html>
