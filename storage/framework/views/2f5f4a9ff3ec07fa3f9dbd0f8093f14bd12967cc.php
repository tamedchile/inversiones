<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get("app.update"); ?> <?php echo app('translator')->get("app.package"); ?> <?php echo app('translator')->get('app.menu.settings'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.super_admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0"> <?php echo app('translator')->get("app.freeTrial"); ?> <?php echo app('translator')->get('app.menu.settings'); ?></h3>

                                        <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                                            <hr>
                                            <div class="row">
                                                <div class="col-sm-12 col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                        <label class="control-label"><?php echo app('translator')->get('app.name'); ?></label>
                                                        <input type="text" id="name" name="name" value="<?php echo e($package->name ?? ''); ?>" class="form-control" >
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                        <label><?php echo app('translator')->get('app.max'); ?> <?php echo app('translator')->get('app.menu.employees'); ?></label>
                                                        <input type="number" name="max_employees" id="max_employees" value="<?php echo e($package->max_employees ?? ''); ?>"  class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="no_of_days"><?php echo app('translator')->get('modules.packageSetting.noOfDays'); ?></label>
                                                        <input type="number" class="form-control" id="no_of_days" name="no_of_days"
                                                               value="<?php echo e($packageSetting->no_of_days); ?>">
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-3 col-xs-12">
                                                    <div class="form-group">
                                                        <label for="no_of_days"><?php echo app('translator')->get('modules.packageSetting.notificationBeforeDays'); ?></label>
                                                        <input type="number" class="form-control" id="notification_before" name="notification_before"
                                                               value="<?php echo e($packageSetting->notification_before); ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <h3 class="box-title"><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('app.module'); ?></h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="row form-group module-in-package">
                                                        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php
                                                                $packageModules = (array)json_decode($packageSetting->modules);
                                                            ?>
                                                            <div class="col-md-2">
                                                                <div class="checkbox checkbox-inline checkbox-info m-b-10">
                                                                    <input id="<?php echo e($module->module_name); ?>" name="module_in_package[<?php echo e($module->id); ?>]" value="<?php echo e($module->module_name); ?>" type="checkbox" <?php if(isset($packageModules) && in_array($module->module_name, $packageModules) ): ?> checked <?php endif; ?>>
                                                                    <label for="<?php echo e($module->module_name); ?>"><?php echo e(ucfirst($module->module_name)); ?></label>
                                                                </div>
                                                            </div>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="control-label" ><?php echo app('translator')->get('app.status'); ?></label>
                                                    <div class="switchery-demo">
                                                        <input type="checkbox" name="status" <?php if($packageSetting->status == 'active'): ?> checked <?php endif; ?> class="js-switch " data-color="#00c292" data-secondary-color="#f96262"  />
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" id="save-form"
                                                    class="btn btn-success waves-effect waves-light m-r-10">
                                                <?php echo app('translator')->get('app.update'); ?>
                                            </button>

                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>
                                    </div>
                                </div>

                            </div>
                            <!-- .row -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- .row -->



<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>

    <script>
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function() {
            new Switchery($(this)[0], $(this).data());

        });
        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('super-admin.package-settings.update', $packageSetting->id)); ?>',
                container: '#editSettings',
                type: "POST",
                redirect: true,
                file: true,
            })
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/package-settings/index.blade.php ENDPATH**/ ?>