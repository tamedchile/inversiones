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
                <li><a href="<?php echo e(route('super-admin.packages.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.edit'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.superAdmin'); ?>
                    [ <?php echo e($userDetail->name); ?> ]
                    <?php ($class = ($userDetail->status == 'active') ? 'label-custom' : 'label-danger'); ?>
                    <span class="label <?php echo e($class); ?>"><?php echo e(ucfirst($userDetail->status)); ?></span>
                </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'updateClient','class'=>'ajax-form','method'=>'PUT']); ?>


                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-3 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.name'); ?></label>
                                        <input type="text" name="name" id="name" class="form-control"
                                               value="<?php echo e($userDetail->name); ?>" autocomplete="nope">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.email'); ?></label>
                                        <input type="email" name="email" id="email" class="form-control"
                                               value="<?php echo e($userDetail->email); ?>" autocomplete="nope">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('modules.employees.employeePassword'); ?></label>
                                        <input type="password" style="display: none">
                                        <input type="password" name="password" id="password" class="form-control" autocomplete="nope">
                                        <span class="help-block"> <?php echo app('translator')->get('modules.profile.passwordNote'); ?></span>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <?php if($user->id != $userDetail->id): ?>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('app.status'); ?></label>
                                                <select name="status" id="status" class="form-control">
                                                    <option <?php if($userDetail->status == 'active'): ?> selected <?php endif; ?> value="active"><?php echo app('translator')->get('app.active'); ?></option>
                                                    <option <?php if($userDetail->status == 'deactive'): ?> selected <?php endif; ?> value="deactive"><?php echo app('translator')->get('app.deactive'); ?></option>
                                                </select>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <label><?php echo app('translator')->get('modules.profile.profilePicture'); ?></label>
                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail" style="width: 100px; height: 75px;">
                                                <img src="<?php echo e($userDetail->image_url); ?>" alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 100px; max-height: 75px;"></div>
                                            <div>
                                <span class="btn btn-info btn-sm btn-small btn-file">
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
                            <a href="<?php echo e(route('super-admin.super-admin.index')); ?>" class="btn btn-default"><?php echo app('translator')->get('app.back'); ?></a>
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
    $(".date-picker").datepicker({
        todayHighlight: true,
        autoclose: true
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.super-admin.update', [$userDetail->id])); ?>',
            container: '#updateClient',
            type: "POST",
            redirect: true,
            file: true
        })
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/super-admin/edit.blade.php ENDPATH**/ ?>