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
    <link rel="stylesheet" href="<?php echo e(asset('plugins/image-picker/image-picker.css')); ?>">
    <style>
        .thumbnail{
            color: black;
            font-weight: 600;
            text-align: center;
        }
        .thumbnail.selected{
            background-color: #f8c234 !important;
        }
        a{
            color:yellow;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">

                <div class="vtabs customvtab p-t-10">
                    <?php if($global->front_design == 1): ?>
                        <?php echo $__env->make('sections.front_setting_new_theme_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('sections.front_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="alert alert-info ">
                                    <h4 class="text-white">Favicon</h4>
                                    <i class="fa fa-info-circle" ></i> <?php echo app('translator')->get('messages.faviconNote'); ?>
                                </div>

                            </div>
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <h3 class="box-title m-b-10"><?php echo app('translator')->get('app.selectTheme'); ?> </h3>
                                    <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'POST']); ?>

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12">
                                            <div class="form-group" >
                                                <select name="theme" id="theme" class="image-picker show-labels show-html" style="color: white">
                                                    <option
                                                            data-img-src="<?php echo e(asset('img/old-design.jpg')); ?>"
                                                            <?php if($global->front_design == 0): ?> selected <?php endif; ?>
                                                            value="0">
                                                        Theme 1
                                                    </option>

                                                    <option data-img-src="<?php echo e(asset('img/new-design.jpg')); ?>"
                                                            data-toggle="tooltip" data-original-title="Edit"
                                                            <?php if($global->front_design == 1): ?> selected <?php endif; ?>
                                                            value="1">Theme 2
                                                    </option>

                                                </select>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>
                                    </div>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>
                        </div>    <!-- .row -->
                </div>

            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/image-picker/image-picker.min.js')); ?>"></script>

<script>
    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });
    $(".image-picker").imagepicker({
        show_label: true
    });
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.theme-update')); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            data: $('#editSettings').serialize()
        })
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/front-theme-settings/index.blade.php ENDPATH**/ ?>