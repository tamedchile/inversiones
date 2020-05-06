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
                <li class="active"><?php echo app('translator')->get('app.edit'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet"
          href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->get('modules.employees.updateTitle'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'updateEmployee','class'=>'ajax-form','method'=>'PUT']); ?>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.name'); ?></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="<?php echo e($userDetail->name); ?>" autocomplete="nope">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.email'); ?></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="<?php echo e($userDetail->email); ?>" autocomplete="nope">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('modules.employees.employeePassword'); ?></label>
                                        <input type="password" style="display: none">
                                        <input type="password" name="password" id="password" class="form-control" autocomplete="nope">
                                        <span class="help-block"> <?php echo app('translator')->get('modules.profile.passwordNote'); ?></span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label><?php echo app('translator')->get('modules.profile.profilePicture'); ?></label>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                                <img src="<?php echo e($userDetail->image_url); ?>" alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->get('app.selectImage'); ?> </span>
                                    <span class="fileinput-exists"> <?php echo app('translator')->get('app.change'); ?> </span>
                                    <input type="file" name="image" id="image"> </span>
                                                <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"> <?php echo app('translator')->get('app.remove'); ?> </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"><i
                                        class="fa fa-check"></i> <?php echo app('translator')->get('app.update'); ?></button>
                            <a href="<?php echo e(route('super-admin.dashboard')); ?>" class="btn btn-default"><?php echo app('translator')->get('app.back'); ?></a>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

    <script>
        $("#joining_date, .date-picker").datepicker({
            todayHighlight: true,
            autoclose: true,
            weekStart:'<?php echo e($global->week_start); ?>',
            format: '<?php echo e($global->date_picker_format); ?>',
        });


        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('super-admin.profile.update', [$userDetail->id])); ?>',
                container: '#updateEmployee',
                type: "POST",
                redirect: true,
                file: true,
            })
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/super-admin/profile/edit.blade.php ENDPATH**/ ?>