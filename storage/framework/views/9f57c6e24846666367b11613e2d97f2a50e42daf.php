<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
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
                    <?php if($global->front_design == 1): ?>
                        <?php echo $__env->make('sections.saas.feature_page_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php else: ?>
                        <?php echo $__env->make('sections.front_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <?php if($type !== 'icon'): ?>
                                            <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form']); ?>

                                                <input type="hidden" name="type" value="<?php echo e($type); ?>">
                                                <h4><?php echo e(ucwords($type)); ?> <?php echo app('translator')->get('app.section'); ?></h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="title"><?php echo app('translator')->get('app.title'); ?></label>
                                                            <input type="text" class="form-control" id="title" name="title"
                                                            <?php if($type == 'task'): ?>
                                                                 value="<?php echo e($frontDetail->task_management_title); ?>"
                                                            <?php elseif($type == 'bills'): ?>
                                                                 value="<?php echo e($frontDetail->manage_bills_title); ?>"
                                                            <?php elseif($type == 'image'): ?>
                                                                 value="<?php echo e($frontDetail->feature_title); ?>"
                                                            <?php elseif($type == 'team'): ?>
                                                                value="<?php echo e($frontDetail->teamates_title); ?>"
                                                            <?php elseif($type == 'apps'): ?>
                                                                value="<?php echo e($frontDetail->favourite_apps_title); ?>"
                                                            <?php endif; ?>
                                                            >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="address"><?php echo app('translator')->get('app.description'); ?></label>

                                                            <?php if($type == 'task'): ?>
                                                                <textarea class="form-control" id="detail" rows="5" name="detail"><?php echo e($frontDetail->task_management_detail); ?></textarea>
                                                            <?php elseif($type == 'bills'): ?>
                                                                <textarea class="form-control" id="detail" rows="5" name="detail"><?php echo e($frontDetail->manage_bills_detail); ?></textarea>
                                                            <?php elseif($type == 'image'): ?>
                                                                <textarea class="form-control" id="detail" rows="5" name="detail"><?php echo e($frontDetail->feature_description); ?></textarea>
                                                            <?php elseif($type == 'team'): ?>
                                                                <textarea class="form-control" id="detail" rows="5" name="detail"><?php echo e($frontDetail->teamates_detail); ?></textarea>
                                                            <?php elseif($type == 'apps'): ?>
                                                                <textarea class="form-control" id="detail" rows="5" name="detail"><?php echo e($frontDetail->favourite_apps_detail); ?></textarea>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </div>

                                                <button type="submit" id="save-form"
                                                        class="btn btn-success waves-effect waves-light m-r-10">
                                                    <?php echo app('translator')->get('app.update'); ?>
                                                </button>

                                            <?php echo Form::close(); ?>

                                        <?php endif; ?>
                                        <br>
                                        <hr>
                                        <h3 class="box-title m-b-0"><?php echo app('translator')->get('modules.feature.setting'); ?></h3>

                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <a href="javascript:;" class="btn btn-outline btn-success btn-sm addFeature"><?php echo app('translator')->get('modules.featureSetting.addFeature'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.title'); ?></th>
                                                    <?php if($type !== 'apps'): ?>
                                                     <th><?php echo app('translator')->get('app.description'); ?></th>
                                                    <?php endif; ?>
                                                    <th><?php echo e(ucwords($type)); ?></th>
                                                    <th class="text-nowrap"><?php echo app('translator')->get('app.action'); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e(ucwords($feature->title)); ?></td>
                                                        <?php if($type !== 'apps'): ?>
                                                         <td><?php echo $feature->description; ?></td>
                                                        <?php endif; ?>
                                                        <td <?php if($feature->type != 'image' && $feature->type != 'apps'): ?> style="font-size: 27px" <?php endif; ?>>
                                                            <?php if($feature->type == 'image' || $feature->type == 'apps'): ?>
                                                                <img height="100" width="85" src="<?php echo e($feature->image_url); ?>" alt=""/>
                                                            <?php else: ?>
                                                                <i class="<?php echo e($feature->icon); ?>"></i>
                                                            <?php endif; ?>


                                                        </td>
                                                        <td class="text-nowrap">
                                                            <a href="javascript:;" data-feature-id="<?php echo e($feature->id); ?>" class="btn btn-info btn-circle editFeature"
                                                               data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                            <a href="javascript:;" class="btn btn-danger btn-circle sa-params"
                                                               data-toggle="tooltip" data-feature-id="<?php echo e($feature->id); ?>" data-original-title="Delete"><i class="fa fa-times" aria-hidden="true"></i></a>
                                                        </td>
                                                    </tr>
                                                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td colspan="4" class="text-center"><?php echo app('translator')->get('messages.noRecordFound'); ?></td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
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
    <!-- .row -->
    
    <div class="modal fade bs-modal-md in" id="projectCategoryModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
                </div>
                <div class="modal-body">
                    Loading...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn blue">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
  <script>
    $('.editFeature').click( function () {
        var id = $(this).data('feature-id');
        var url = '<?php echo e(route('super-admin.feature-settings.edit', ':id')); ?>?type=<?php echo e($type); ?>';
        url = url.replace(':id', id);
        $('#modelHeading').html('Currency Convert Key');
        $.ajaxModal('#projectCategoryModal', url);
    })
    $('.addFeature').click( function () {
        var url = '<?php echo e(route('super-admin.feature-settings.create')); ?>?type=<?php echo e($type); ?>';
        $('#modelHeading').html('Currency Convert Key');
        $.ajaxModal('#projectCategoryModal', url);
    })

    $('body').on('click', '.sa-params', function(){
        var id = $(this).data('feature-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted feature!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "<?php echo e(route('super-admin.feature-settings.destroy',':id')); ?>?type=<?php echo e($type); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.feature-settings.title-update')); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true,
        })
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/feature-settings/index.blade.php ENDPATH**/ ?>