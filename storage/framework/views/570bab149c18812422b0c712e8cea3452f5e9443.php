<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="clear">
                            <span class="block m-t-xs">
                                <?php echo e(trans('navigation.welcome')); ?> <strong
                                        class="font-bold"><?php echo e(\Illuminate\Support\Facades\Auth::user()->name); ?></strong>
                            </span>
                        </span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li>
                            <a href="<?php echo e(url('/logout')); ?>"
                               onclick="event.preventDefault();
                document.getElementById('logout-form').submit();"><?php echo e(trans('navigation.logout')); ?></a>
                        </li>
                    </ul>
                </div>
                <div class="logo-element">
                    SF
                </div>
            </li>
            <li class="<?php echo e(isActiveRoute('categories.index')); ?>">
                <a href="<?php echo e(url('/categories')); ?>"><i class="fa fa-th-large"></i> <span class="nav-label">Galleries</span></a>
            </li>
            <li class="<?php echo e(isActiveRoute('photos.index')); ?>">
                <a href="<?php echo e(url('/photos')); ?>"><i class="fa fa-th-large"></i> <span
                            class="nav-label">Photos</span></a>
            </li>

        </ul>

    </div>
</nav>
