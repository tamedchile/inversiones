<div class="navbar-default sidebar" role="navigation">
    <div class="navbar-header">
        <!-- Toggle icon for mobile view -->
        <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse"
            data-target=".navbar-collapse"><i class="ti-menu"></i></a>

        <div class="top-left-part">
            <!-- Logo -->
            <a class="logo hidden-xs text-center" href="<?php echo e(route('admin.dashboard')); ?>">
                <span class="visible-md"><img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/></span>
                <span class="visible-sm"><img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/></span>
            </a>

        </div>
        <!-- /Logo -->

        <!-- This is the message dropdown -->
        <ul class="nav navbar-top-links navbar-right pull-right visible-xs">
            <?php if(isset($activeTimerCount)): ?>
            <li class="dropdown hidden-xs">
            <span id="timer-section">
                <div class="nav navbar-top-links navbar-right pull-right m-t-10">
                    <a class="btn btn-rounded btn-default timer-modal" href="javascript:;"><?php echo app('translator')->get("modules.projects.activeTimers"); ?>
                        <span class="label label-danger" id="activeCurrentTimerCount"><?php if($activeTimerCount > 0): ?> <?php echo e($activeTimerCount); ?> <?php else: ?> 0 <?php endif; ?></span>
                    </a>
                </div>
            </span>
            </li>
            <?php endif; ?>


            <li class="dropdown">
                <select class="selectpicker language-switcher" data-width="fit">
                    <option value="en" <?php if($global->locale == "en"): ?> selected <?php endif; ?> data-content='<span class="flag-icon flag-icon-us"></span> En'>En</option>
                    <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?>  data-content='<span class="flag-icon flag-icon-<?php echo e($language->language_code); ?>"></span> <?php echo e($language->language_code); ?>'><?php echo e($language->language_code); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </li>

            <!-- .Task dropdown -->
            <li class="dropdown" id="top-notification-dropdown">
                <a class="dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="#">
                    <i class="icon-bell"></i>
                    <?php if(count($user->unreadNotifications) > 0): ?>
                        <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                    <?php endif; ?>
                </a>
                <ul class="dropdown-menu  dropdown-menu-right mailbox animated slideInDown">
                    <li>
                        <div class="drop-title"><?php echo app('translator')->get('app.newNotifications'); ?> <span
                                    class="top-notification-count"><?php echo e(count($user->unreadNotifications)); ?></span>
                        </div>
                    </li>
                    <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if(view()->exists('notifications.superadmin.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
                            <?php echo $__env->make('notifications.superadmin.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <?php if(count($user->unreadNotifications) > 0): ?>
                        <li>
                            <a class="text-center mark-notification-read"
                                href="javascript:;"> <?php echo app('translator')->get('app.markRead'); ?> <i class="fa fa-check"></i> </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </li>
            <!-- /.Task dropdown -->


            <li class="dropdown">
                <a href="<?php echo e(route('logout')); ?>" title="Logout" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();"
                ><i class="fa fa-power-off"></i>
                </a>
            </li>



        </ul>

    </div>
    <!-- /.navbar-header -->

    <div class="top-left-part">
        <a class="logo hidden-xs hidden-sm text-center" href="<?php echo e(route('admin.dashboard')); ?>">
            <img src="<?php echo e($global->logo_url); ?>" alt="home" class=" admin-logo"/>
        </a>
    </div>
    <div class="sidebar-nav navbar-collapse slimscrollsidebar">

        <!-- .User Profile -->
        <ul class="nav" id="side-menu">
            <li class="sidebar-search hidden-sm hidden-md hidden-lg">
                <!-- input-group -->
                <div class="input-group custom-search-form">
                    <input type="text" class="form-control" placeholder="Search..."> <span class="input-group-btn">
                            <button class="btn btn-default" type="button"> <i class="fa fa-search"></i> </button>
                            </span> </div>
                <!-- /input-group -->
            </li>

            <li class="user-pro hidden-sm hidden-md hidden-lg">
                <?php if(is_null($user->image)): ?>
                    <a href="#" class="waves-effect"><img src="<?php echo e(asset('img/default-profile-3.png')); ?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo e((strlen($user->name) > 24) ? substr(ucwords($user->name), 0, 20).'..' : ucwords($user->name)); ?>

                    <span class="fa arrow"></span></span>
                    </a>
                <?php else: ?>
                    <a href="#" class="waves-effect"><img src="<?php echo e(asset_url('avatar/'.$user->image)); ?>" alt="user-img" class="img-circle"> <span class="hide-menu"><?php echo e(ucwords($user->name)); ?>

                            <span class="fa arrow"></span></span>
                    </a>
                <?php endif; ?>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="<?php echo e(route('member.dashboard')); ?>">
                            <i class="fa fa-sign-in"></i> <?php echo app('translator')->get('app.loginAsEmployee'); ?>
                        </a>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();"
                        ><i class="fa fa-power-off"></i> <?php echo app('translator')->get('app.logout'); ?></a>

                    </li>
                </ul>
            </li>

            <li><a href="<?php echo e(route('super-admin.dashboard')); ?>" class="waves-effect"><i class="icon-speedometer"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.dashboard'); ?> </span></a> </li>

            <li><a href="<?php echo e(route('super-admin.profile.index')); ?>" class="waves-effect"><i class="icon-user"></i> <span class="hide-menu"><?php echo app('translator')->get('modules.employees.profile'); ?> </span></a> </li>
            <li><a href="<?php echo e(route('super-admin.packages.index')); ?>" class="waves-effect"><i class="icon-calculator"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.packages'); ?> </span></a> </li>

            <li><a href="<?php echo e(route('super-admin.companies.index')); ?>" class="waves-effect"><i class="icon-layers"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.companies'); ?> </span></a> </li>
            <li><a href="<?php echo e(route('super-admin.invoices.index')); ?>" class="waves-effect"><i class="icon-printer"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.invoices'); ?> </span></a> </li>
            <li><a href="<?php echo e(route('super-admin.faq-category.index')); ?>" class="waves-effect"><i class="icon-docs"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.faq'); ?> </span></a> </li>
            <li><a href="<?php echo e(route('super-admin.super-admin.index')); ?>" class="waves-effect"><i class="fa fa-user"></i> <span class="hide-menu"><?php echo app('translator')->get('app.superAdmin'); ?> </span></a> </li>
            <li><a href="<?php echo e(route('super-admin.offline-plan.index')); ?>" class="waves-effect"><i class="fa fa-user-secret"></i> <span class="hide-menu"><?php echo app('translator')->get('app.offlineRequest'); ?> <?php if($offlineRequestCount > 0): ?><div class="notify notification-color"><span class="heartbit"></span><span class="point"></span></div><?php endif; ?></span> </a> </li>
            <li><a href="<?php echo e(route('super-admin.theme-settings')); ?>" class="waves-effect"><i class="fa fa-cogs"></i> <span class="hide-menu"><?php echo app('translator')->get('app.front'); ?> <?php echo app('translator')->get('app.menu.settings'); ?> </span></a> </li>
            <li><a href="<?php echo e(route('super-admin.settings.index')); ?>" class="waves-effect"><i class="icon-settings"></i> <span class="hide-menu"><?php echo app('translator')->get('app.menu.settings'); ?> </span></a> </li>

        </ul>

        <div class="menu-footer">
            <div class="menu-user row">
                <div class="col-lg-6 m-b-5">
                    <div class="btn-group dropup user-dropdown">
                        <img aria-expanded="false" data-toggle="dropdown" src="<?php echo e($user->image_url); ?>" alt="user-img" class="img-circle dropdown-toggle h-30 w-30">
                        <ul role="menu" class="dropdown-menu">
                            <li><a class="bg-inverse"><strong class="text-info"><?php echo e(ucwords($user->name)); ?></strong></a></li>

                            <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                                                                document.getElementById('logout-form').submit();"
                                ><i class="fa fa-power-off"></i> <?php echo app('translator')->get('app.logout'); ?></a>
                                <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                                    <?php echo e(csrf_field()); ?>

                                </form>
                            </li>

                        </ul>
                    </div>
                </div>


                <div class="col-lg-6 text-center m-b-5">
                    <div class="btn-group dropup notification-dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="fa fa-bell"></i>
                            <?php if(count($user->unreadNotifications) > 0): ?>

                                <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
                            <?php endif; ?>
                        </a>
                        <ul class="dropdown-menu mailbox ">
                            <li>
                                <div class="drop-title"><?php echo app('translator')->get('app.newNotifications'); ?> <span class="badge badge-success top-notification-count"><?php echo e(count($user->unreadNotifications)); ?></span>
                                </div>
                            </li>
                            <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if(view()->exists('notifications.superadmin.'.\Illuminate\Support\Str::snake(class_basename($notification->type)))): ?>
                                    <?php echo $__env->make('notifications.superadmin.'.\Illuminate\Support\Str::snake(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            <?php if(count($user->unreadNotifications) > 0): ?>
                                <li>
                                    <a class="text-center mark-notification-read"
                                        href="javascript:;"> <?php echo app('translator')->get('app.markRead'); ?> <i class="fa fa-check"></i> </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>

            </div>
            <div class="menu-copy-right">
                <a href="javascript:void(0)" class="open-close hidden-xs waves-effect waves-light"><i class="ti-angle-double-right ti-angle-double-left"></i> <span class="collapse-sidebar-text"><?php echo app('translator')->get('app.collapseSidebar'); ?></span></a>
            </div>

        </div>



    </div>


</div>

<?php /**PATH D:\laragon\www\inversiones\resources\views/sections/super_admin_left_sidebar.blade.php ENDPATH**/ ?>