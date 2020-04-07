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
                <li><a href="<?php echo e(route('admin.settings.index')); ?>"><?php echo app('translator')->get('app.menu.settings'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.menu.leadSource'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.lead_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    
                            <div class="row">

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3><?php echo app('translator')->get('app.addNew'); ?> <?php echo app('translator')->get('modules.lead.leadSource'); ?></h3>

                                        <?php echo Form::open(['id'=>'createTypes','class'=>'ajax-form','method'=>'POST']); ?>


                                        <div class="form-body">

                                            <div class="form-group">
                                                <label><?php echo app('translator')->get('modules.lead.leadSource'); ?></label>
                                                <input type="text" name="type" id="type" class="form-control">
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" id="save-type" class="btn btn-success"><i
                                                            class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?>
                                                </button>
                                            </div>
                                        </div>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3><?php echo app('translator')->get('app.menu.leadSource'); ?></h3>


                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                                    <th><?php echo app('translator')->get('app.action'); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $leadSources; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$source): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td><?php echo e(($key+1)); ?></td>
                                                        <td><?php echo e(ucwords($source->type)); ?></td>
                                                        <td>
                                                            <a href="javascript:;" data-type-id="<?php echo e($source->id); ?>"
                                                               class="btn btn-sm btn-info btn-rounded btn-outline edit-type"><i
                                                                        class="fa fa-edit"></i> <?php echo app('translator')->get('app.edit'); ?></a>
                                                            <a href="javascript:;" data-type-id="<?php echo e($source->id); ?>"
                                                               class="btn btn-sm btn-danger btn-rounded btn-outline delete-type"><i
                                                                        class="fa fa-times"></i> <?php echo app('translator')->get('app.remove'); ?></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo app('translator')->get('messages.noLeadSourceAdded'); ?>
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->


    
    <div class="modal fade bs-modal-md in" id="leadSourceModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
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
<script type="text/javascript">


    //    save project members
    $('#save-type').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.lead-source-settings.store')); ?>',
            container: '#createTypes',
            type: "POST",
            data: $('#createTypes').serialize(),
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
                    window.location.reload();
                }
            }
        })
    });


    $('body').on('click', '.delete-type', function () {
        var id = $(this).data('type-id');
        swal({
            title: "Are you sure?",
            text: "This will remove the lead source from the list.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.lead-source-settings.destroy',':id')); ?>";
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


    $('.edit-type').click(function () {
        var typeId = $(this).data('type-id');
        var url = '<?php echo e(route("admin.lead-source-settings.edit", ":id")); ?>';
        url = url.replace(':id', typeId);

        $('#modelHeading').html("<?php echo e(__('app.edit')." ".__('modules.lead.leadSource')); ?>");
        $.ajaxModal('#leadSourceModal', url);
    })


</script>


<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/lead-settings/source/index.blade.php ENDPATH**/ ?>