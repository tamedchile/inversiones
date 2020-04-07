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
                <li><a href="<?php echo e(route('admin.settings.index')); ?>"><?php echo app('translator')->get('app.menu.settings'); ?></a></li>
                <li class="active"><?php echo e($pageTitle); ?></li>
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
                <div class="panel-heading"><?php echo app('translator')->get('modules.lead.leadAgent'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.lead_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="white-box">
                                <h3><?php echo app('translator')->get('app.addNew'); ?> <?php echo app('translator')->get('modules.lead.leadAgent'); ?></h3>

                                <?php echo Form::open(['id'=>'createTypes','class'=>'ajax-form','method'=>'POST']); ?>


                                <div class="form-body">

                                    <div class="form-group" id="user_id">
                                        <label for=""><?php echo app('translator')->get('modules.tickets.chooseAgents'); ?></label>
                                        <select class="select2 m-b-10 select2-multiple " multiple="multiple"
                                                data-placeholder="<?php echo app('translator')->get('modules.tickets.chooseAgents'); ?>" name="user_id[]">
                                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($emp->id); ?>"><?php echo e(ucwords($emp->name). ' ['.$emp->email.']'); ?> <?php if($emp->id == $user->id): ?>
                                                        (YOU) <?php endif; ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
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
                                <h3><?php echo app('translator')->get('modules.lead.leadAgent'); ?></h3>


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
                                        <?php $__empty_1 = true; $__currentLoopData = $leadAgents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$agents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <tr id="leadAgent_<?php echo e($agents->id); ?>">
                                                <td width="10%"><?php echo e(($key+1)); ?></td>
                                                <td width="60%"><?php echo e(ucwords($agents->user->name)); ?></td>
                                                <td width="30%">
                                                    <a href="javascript:;" data-type-id="<?php echo e($agents->id); ?>"
                                                        class="btn btn-sm btn-danger btn-rounded btn-outline delete-type"><i
                                                                class="fa fa-times"></i> <?php echo app('translator')->get('app.remove'); ?></a>
                                                </td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <td colspan="3" class="text-center">
                                                <div class="empty-space" style="height: 200px;">
                                                    <div class="empty-space-inner">
                                                        <div class="icon" style="font-size:30px"><i
                                                                    class="icon-layers"></i>
                                                        </div>
                                                        <div class="title m-b-15"> <?php echo app('translator')->get('messages.noLeadAgentAdded'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>


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


    
    <div class="modal fade bs-modal-md in" id="leadStatusModal" role="dialog" aria-labelledby="myModalLabel"
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
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script type="text/javascript">

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });
    //    save project members
    $('#save-type').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.lead-agent-settings.store')); ?>',
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
            text: "This will remove the lead status from the list.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.lead-agent-settings.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
                            $('#leadAgent_'+id).fadeOut();
                        }
                    }
                });
            }
        });
    });

</script>


<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/lead-settings/agent/index.blade.php ENDPATH**/ ?>