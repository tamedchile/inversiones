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
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iconpicker/css/fontawesome-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">

                <div class="vtabs customvtab p-t-10">
                    <?php echo $__env->make('sections.front_setting_new_theme_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form']); ?>

                                        <h3><?php echo app('translator')->get('modules.frontCms.priceDetail'); ?></h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6 col-xs-12">
                                                <div class="form-group">
                                                    <label for="price_title"><?php echo app('translator')->get('modules.frontCms.priceTitle'); ?></label>
                                                    <input type="tel" class="form-control" id="price_title" name="price_title"
                                                           value="<?php echo e($frontDetail->price_title); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <div class="form-group">
                                                    <label for="price_description"><?php echo app('translator')->get('modules.frontCms.priceDescription'); ?></label>
                                                    <textarea class="form-control" id="price_description" rows="5"
                                                              name="price_description"><?php echo e($frontDetail->price_description); ?></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" id="save-form"
                                                class="btn btn-success waves-effect waves-light m-r-10">
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>

                                        <?php echo Form::close(); ?>

                                        <hr>
                                    </div>
                                </div>
                            </div>    <!-- .row -->

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
  <script>

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.price-setting-update')); ?>',
            container: '#editSettings',
            type: "POST",
            data: $('#editSettings').serialize()
        })
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/price-settings/index.blade.php ENDPATH**/ ?>