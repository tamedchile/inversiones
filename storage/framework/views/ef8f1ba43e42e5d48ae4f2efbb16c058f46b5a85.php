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
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('super-admin.language-settings.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="white-box">
                <h3 class="box-title m-b-0"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.language'); ?></h3>

                <p class="text-muted m-b-30 font-13"></p>

                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <?php echo Form::open(['id'=>'createCurrency','class'=>'ajax-form','method'=>'POST']); ?>

                        <div class="form-group">
                            <label for="language_name"><?php echo app('translator')->get('app.language'); ?> <?php echo app('translator')->get('app.name'); ?></label>
                            <input type="text" class="form-control" value="<?php echo e($languageSetting->language_name); ?>" id="language_name" name="language_name"
                                   placeholder="Enter Language Name">
                        </div>
                        <div class="form-group">
                            <label for="language_code"><?php echo app('translator')->get('app.language_code'); ?></label>
                            <input type="text" class="form-control"  value="<?php echo e($languageSetting->language_code); ?>"  id="language_code" name="language_code"
                                   placeholder="Enter Language Code">
                        </div>
                        <div class="form-group ">
                            <label for="usd_price"><?php echo app('translator')->get('app.status'); ?> </label>
                            <select class="form-control"  name="status">
                                <option <?php if($languageSetting->status == 'enabled'): ?> selected <?php endif; ?> value="enabled"><?php echo app('translator')->get('app.enabled'); ?></option>
                                <option <?php if($languageSetting->status == 'disabled'): ?> selected <?php endif; ?> value="disabled"><?php echo app('translator')->get('app.disabled'); ?></option>
                            </select>
                        </div>

                        <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                            <?php echo app('translator')->get('app.save'); ?>
                        </button>
                        <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->get('app.reset'); ?></button>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>

    // update language
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.language-settings.update-data', $languageSetting->id)); ?>',
            container: '#createCurrency',
            type: "POST",
            redirect: true,
            data: $('#createCurrency').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/language-settings/edit.blade.php ENDPATH**/ ?>