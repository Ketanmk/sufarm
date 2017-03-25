<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> <?php echo e(trans('login.register')); ?></title>


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

            <h1 class="logo-name">SF</h1>

        </div>
        <h3><?php echo e(trans('login.welcome')); ?></h3>
        

        <form class="m-t" action="<?php echo e(url('/register')); ?>" method="post">
            <?php echo e(csrf_field()); ?>

            <div class="form-group <?php echo e(($errors->has('name')) ? 'has-error' : ''); ?>">
                <input type="text" name="name" class="form-control" placeholder="Name">
                <?php if($errors->has('name')): ?>
                    <span class="help-block m-b-none"><?php echo e($errors->first('name')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group <?php echo e(($errors->has('email')) ? 'has-error' : ''); ?>">
                <input type="email" name="email" class="form-control" placeholder="Email">
                <?php if($errors->has('email')): ?>
                    <span class="help-block m-b-none"><?php echo e($errors->first('email')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group  <?php echo e(($errors->has('password')) ? 'has-error' : ''); ?>">
                <input type="password" name="password" class="form-control" placeholder="Password">
                <?php if($errors->has('password')): ?>
                    <span class="help-block m-b-none"><?php echo e($errors->first('password')); ?></span>
                <?php endif; ?>
            </div>
            <div class="form-group">
                <input type="password" name="password_confirmation" class="form-control" placeholder="Password">

            </div>

            <button type="submit" class="btn btn-primary block full-width m-b"><?php echo e(trans('login.register')); ?></button>

            <p class="text-muted text-center">
                <small><?php echo e(trans('login.have_account')); ?></small>
            </p>
            <a class="btn btn-sm btn-white btn-block" href="<?php echo e(url('/login')); ?>"><?php echo e(trans('login.login')); ?></a>
        </form>
        <p class="m-t">
            <small><?php echo e(trans('login.copy')); ?> &copy; 2017</small>
        </p>
    </div>
</div>

<!-- Mainly scripts -->
<script src="<?php echo asset('js/app.js'); ?>" type="text/javascript"></script>

<?php $__env->startSection('scripts'); ?>
<?php echo $__env->yieldSection(); ?>

</body>

</html>
