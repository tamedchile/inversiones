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
                <div class="panel-heading"><?php echo app('translator')->get('app.language'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></div>

                <div class="p-10 m-t-10">
                    <?php echo $__env->make('sections.super_admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row">
                        <div class="col-sm-12 col-xs-12">
                            <a href="<?php echo e(route('super-admin.language-settings.create')); ?>" class="btn btn-outline btn-success btn-sm m-b-30"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.language'); ?>  <i class="fa fa-plus" aria-hidden="true"></i></a>
                            <a href="<?php echo e(url('/translations')); ?>" target="_blank" class="btn btn-sm m-b-30 btn-warning"><i class="ti-settings"></i> Translate</a>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th><?php echo app('translator')->get('app.language'); ?> <?php echo app('translator')->get('app.name'); ?></th>
                                <th><?php echo app('translator')->get('app.language_code'); ?></th>
                                <th><?php echo app('translator')->get('app.status'); ?></th>
                                <th class="text-nowrap"><?php echo app('translator')->get('app.action'); ?></th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr id="languageRow<?php echo e($language->id); ?>">
                                    <td><?php echo e(ucwords($language->language_name)); ?></td>
                                    <td><?php echo e(strtoupper($language->language_code)); ?></td>
                                    <td>
                                        <div class="switchery-demo">
                                            <input type="checkbox"
                                                   <?php if($language->status == 'enabled'): ?> checked
                                                   <?php endif; ?> class="js-switch change-language-setting"
                                                   data-color="#99d683"
                                                   data-setting-id="<?php echo e($language->id); ?>"/>
                                        </div>
                                    </td>
                                    <td class="text-nowrap">
                                        <a href="<?php echo e(route('super-admin.language-settings.edit', [$language->id])); ?>" class="btn btn-info btn-circle"
                                           data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>

                                        <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
                                           data-toggle="tooltip" data-language-id="<?php echo e($language->id); ?>" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>    <!-- .row -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>
    <script>
        // Switchery
        var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
        $('.js-switch').each(function () {
            new Switchery($(this)[0], $(this).data());

        });

        $('.change-language-setting').change(function () {
            var id = $(this).data('setting-id');

            if ($(this).is(':checked'))
                var status = 'enabled';
            else
                var status = 'disabled';

            var url = '<?php echo e(route('super-admin.language-settings.update', ':id')); ?>';
            url = url.replace(':id', id);
            $.easyAjax({
                url: url,
                type: "POST",
                data: {'id': id, 'status': status, '_method': 'PUT', '_token': '<?php echo e(csrf_token()); ?>'}
            })
        });
        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('language-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted language!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('super-admin.language-settings.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                $('#languageRow'+id).fadeOut();
                            }
                        }
                    });
                }
            });
        });
    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/language-settings/index.blade.php ENDPATH**/ ?>