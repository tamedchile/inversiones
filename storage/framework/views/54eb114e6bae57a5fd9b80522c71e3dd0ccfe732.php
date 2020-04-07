<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.designations.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/icheck/skins/all.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.menu.designation'); ?></div>
                <p class="text-muted font-13"></p>

                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <?php echo Form::open(['id'=>'createCurrency','class'=>'ajax-form','method'=>'PUT']); ?>

                                <div class="form-group">
                                    <label for="company_name"><?php echo app('translator')->get('app.menu.designation'); ?></label>
                                    <input type="text" class="form-control" id="designation_name" name="designation_name" value="<?php echo e($designation->name); ?>">
                                </div>

                                <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                                    <?php echo app('translator')->get('app.save'); ?>
                                </button>
                                <?php echo Form::close(); ?>

                                <hr>
                            </div>


                            <div class="col-md-7">
                                <h3 class="box-title m-b-0"><?php echo app('translator')->get('modules.projects.members'); ?></h3>

                            <?php $__empty_1 = true; $__currentLoopData = $designation->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                    <div class="row">
                                        <div class="col-sm-2 col-md-1 p-10">
                                            <?php echo '<img src="'.$member->user->image_url.'"
                                                            alt="user" class="img-circle" width="40" height="40">'; ?>


                                        </div>
                                        <div class="col-sm-7">
                                            <h5><?php echo e(ucwords($member->user->name)); ?></h5>
                                            <h6><?php echo e($member->user->email); ?></h6>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    <?php echo app('translator')->get('messages.noRecordFound'); ?>
                                <?php endif; ?>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('js/cbpFWTabs.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/multiselect/js/jquery.multi-select.js')); ?>"></script>
    <script>
        $(".select2").select2();

        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.designations.update', [$designation->id])); ?>',
                container: '#createCurrency',
                type: "POST",
                redirect: true,
                data: $('#createCurrency').serialize()
            })
        });

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/designation/edit.blade.php ENDPATH**/ ?>