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
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.menu.storageSettings'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.super_admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">

                            <div class="row">
                                <div class="col-md-12">

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12 ">
                                                <?php echo Form::open(['id'=>'updateSettings','class'=>'ajax-form','method'=>'POST']); ?>

                                                <div class="form-body">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <h3 class="box-title text-success">File Storage</h3>
                                                            <hr class="m-t-0 m-b-20">
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label class="control-label">Select Storage</label>
                                                                <select class="select2 form-control" id="storage" name="storage">
                                                                    <option value="local" <?php if(isset($localCredentials) && $localCredentials->status == 'enabled'): ?> selected <?php endif; ?>>Local (Default)</option>
                                                                    <option value="aws" <?php if(isset($awsCredentials) && $awsCredentials->status == 'enabled'): ?> selected <?php endif; ?>>AWS Storage (Amazon Web Services)</option>
                                                                </select>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12 aws-form">
                                                            <div class="form-group">
                                                                <label>AWS Key</label>
                                                                <input type="text" class="form-control" name="aws_key" <?php if(isset($awsCredentials) && isset($awsCredentials->key)): ?> value="<?php echo e($awsCredentials->key); ?>" <?php endif; ?>>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>AWS Secret</label>
                                                                <input type="text" class="form-control" name="aws_secret" <?php if(isset($awsCredentials) && isset($awsCredentials->secret)): ?> value="<?php echo e($awsCredentials->secret); ?>" <?php endif; ?>>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>AWS Region</label>
                                                                <input type="text" class="form-control" id="company_name" name="aws_region" <?php if(isset($awsCredentials) && isset($awsCredentials->region)): ?> value="<?php echo e($awsCredentials->region); ?>" <?php endif; ?>>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>AWS Bucket</label>
                                                                <input type="text" class="form-control" id="company_name" name="aws_bucket" <?php if(isset($awsCredentials) && isset($awsCredentials->bucket)): ?> value="<?php echo e($awsCredentials->bucket); ?>" <?php endif; ?>>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <!--/row-->

                                                </div>
                                                <div class="form-actions m-t-20">
                                                    <button type="submit" id="save-form-2" class="btn btn-success"><i class="fa fa-check"></i>
                                                        <?php echo app('translator')->get('app.save'); ?>
                                                    </button>

                                                </div>
                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                </div>
                            </div>

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
    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script>
        $(".select2").select2({
            formatNoMatches: function () {
                return "<?php echo e(__('messages.noRecordFound')); ?>";
            }
        });

        $(function () {
           var type = $('#storage').val();
            if (type == 'aws') {
                $('.aws-form').css('display', 'block');
            } else if(type == 'local') {
                $('.aws-form').css('display', 'none');
            }
        });

        $('#storage').on('change', function(event) {
            event.preventDefault();
            var type = $(this).val();
            if (type == 'aws') {
                $('.aws-form').css('display', 'block');
            } else if(type == 'local') {
                $('.aws-form').css('display', 'none');
            }
        });

        $('#save-form-2').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('super-admin.storage-settings.store')); ?>',
                container: '#updateSettings',
                type: "POST",
                redirect: true,
                data: $('#updateSettings').serialize()
            })
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/storage-settings/index.blade.php ENDPATH**/ ?>