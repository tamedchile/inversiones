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
                <div class="panel-heading"> <?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.package'); ?> <?php echo app('translator')->get('app.info'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'updateClient','class'=>'ajax-form','method'=>'PUT']); ?>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.name'); ?></label>
                                        <input type="text" id="name" name="name" value="<?php echo e($package->name ?? ''); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.max'); ?> <?php echo app('translator')->get('app.menu.employees'); ?></label>
                                        <input type="number" name="max_employees" id="max_employees" value="<?php echo e($package->max_employees ?? ''); ?>"  class="form-control">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.annual'); ?> <?php echo app('translator')->get('app.price'); ?> (<?php echo e($global->currency->currency_symbol); ?>)</label>
                                        <input type="number" name="annual_price" id="annual_price" value="<?php echo e($package->annual_price ?? ''); ?>"  class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.monthly'); ?> <?php echo app('translator')->get('app.price'); ?> (<?php echo e($global->currency->currency_symbol); ?>)</label>
                                        <input type="number" name="monthly_price" id="monthly_price"  value="<?php echo e($package->monthly_price ?? ''); ?>"   class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.package.stripeAnnualPlanId'); ?></label>
                                        <input type="text" id="stripe_annual_plan_id" name="stripe_annual_plan_id" value="<?php echo e($package->stripe_annual_plan_id ?? ''); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('modules.package.stripeMonthlyPlanId'); ?></label>
                                        <input type="text" name="stripe_monthly_plan_id" id="stripe_monthly_plan_id" value="<?php echo e($package->stripe_monthly_plan_id ?? ''); ?>"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.package.razorpayAnnualPlanId'); ?></label>
                                        <input type="text" id="razorpay_annual_plan_id" name="razorpay_annual_plan_id" value="<?php echo e($package->razorpay_annual_plan_id ?? ''); ?>" class="form-control" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('modules.package.razorpayMonthlyPlanId'); ?></label>
                                        <input type="text" name="razorpay_monthly_plan_id" id="razorpay_monthly_plan_id" value="<?php echo e($package->razorpay_monthly_plan_id ?? ''); ?>"  class="form-control">
                                    </div>
                                </div>
                            </div>
                            <h3 class="box-title"><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('app.module'); ?> </h3>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="checkbox checkbox-info  col-md-10">
                                            <input id="select_all_permission"
                                                    
                                                    class="select_all_permission" type="checkbox">
                                            <label for="select_all_permission"><?php echo app('translator')->get('modules.permission.selectAll'); ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <hr>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="row form-group module-in-package">


                                        <?php $__currentLoopData = $modules; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $module): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $packageModules = (array)json_decode($package->module_in_package);
                                            ?>
                                            <div class="col-md-2">
                                                <div class="checkbox checkbox-inline checkbox-info m-b-10">
                                                    <input class="module_checkbox" id="<?php echo e($module->module_name); ?>" name="module_in_package[<?php echo e($module->id); ?>]" value="<?php echo e($module->module_name); ?>" type="checkbox" <?php if(isset($packageModules) && in_array($module->module_name, $packageModules) ): ?> checked <?php endif; ?> >
                                                    <label for="<?php echo e($module->module_name); ?>"><?php echo e(ucfirst($module->module_name)); ?></label>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.description'); ?></label>
                                        <textarea name="description"  id="description"  rows="5" value="<?php echo e($package->description ?? ''); ?>" class="form-control"><?php echo e($package->description ?? ''); ?></textarea>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.update'); ?></button>
                            <a href="<?php echo e(route('super-admin.packages.index')); ?>" class="btn btn-default"><?php echo app('translator')->get('app.back'); ?></a>
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
        autoclose: true,
        weekStart:'<?php echo e($global->week_start); ?>',
    });
    
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.packages.update', [$package->id])); ?>',
            container: '#updateClient',
            type: "POST",
            redirect: true,
            data: $('#updateClient').serialize()
        })
    });

    $('.select_all_permission').change(function () {
        if($(this).is(':checked')){
            $('.module_checkbox').prop('checked', true);
        } else {
            $('.module_checkbox').prop('checked', false);
        }
    });
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/packages/edit.blade.php ENDPATH**/ ?>