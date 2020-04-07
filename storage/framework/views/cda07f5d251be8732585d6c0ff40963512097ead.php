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

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.menu.ticketAgents'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.ticket_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3><?php echo app('translator')->get('app.addNew'); ?> <?php echo app('translator')->get('modules.tickets.agents'); ?></h3>

                                        <?php echo Form::open(['id'=>'createAgents','class'=>'ajax-form','method'=>'POST']); ?>


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

                                            <div class="form-group">
                                                <label for=""><?php echo app('translator')->get('modules.tickets.assignGroup'); ?>
                                                    <a href="javascript:;" class="btn btn-info btn-sm btn-outline" id="manage-groups"><i class="ti-settings"></i> <?php echo app('translator')->get('modules.tickets.manageGroups'); ?></a>
                                                </label>
                                                <select class="selectpicker form-control" name="group_id" id="group_id"
                                                        data-style="form-control">
                                                    <option value=""><?php echo app('translator')->get('modules.tickets.noGroupAssigned'); ?></option>

                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($group->id); ?>"><?php echo e(ucwords($group->group_name)); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" id="save-members" class="btn btn-success"><i
                                                            class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?>
                                                </button>
                                            </div>
                                        </div>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3><?php echo app('translator')->get('modules.tickets.agents'); ?> </h3>

                                        <div class="table-responsive">
                                            <table class="table" id="agents-table">
                                                <thead>
                                                <tr>
                                                    <th><?php echo app('translator')->get('app.name'); ?></th>
                                                    <th><?php echo app('translator')->get('modules.tickets.group'); ?></th>
                                                    <th><?php echo app('translator')->get('app.status'); ?></th>
                                                    <th><?php echo app('translator')->get('app.action'); ?></th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php $__empty_1 = true; $__currentLoopData = $agents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <tr>
                                                        <td>
                                                            <a href="javascript:void(0)">
                                                                <?php echo '<img src="'.$agent->user->image_url.'" alt="user" class="img-circle" width="40" height="40">'; ?>


                                                                <?php echo e(ucwords($agent->user->name)); ?>

                                                            </a>
                                                        </td>
                                                        <td>
                                                            <select class="change-agent-group" data-agent-id="<?php echo e($agent->id); ?>">
                                                                <option value="">No group assigned</option>
                                                                <?php $__currentLoopData = $groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                    <option
                                                                            <?php if($group->id == $agent->group_id): ?> selected <?php endif; ?>
                                                                    value="<?php echo e($group->id); ?>"><?php echo e($group->group_name); ?></option>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                            </select>
                                                        </td>
                                                        <td>
                                                            <select class="change-agent-status" data-agent-id="<?php echo e($agent->id); ?>">
                                                                <option <?php if($agent->status == 'enabled'): ?> selected <?php endif; ?>>enabled</option>
                                                                <option <?php if($agent->status == 'disabled'): ?> selected <?php endif; ?>>disabled</option>
                                                            </select>
                                                        </td>
                                                        <td>
                                                            <a href="javascript:;" data-agent-id="<?php echo e($agent->id); ?>"
                                                               class="btn btn-sm btn-danger btn-rounded btn-outline delete-agents"><i
                                                                        class="fa fa-times"></i> <?php echo app('translator')->get('app.remove'); ?></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                    <td colspan="4" class="text-center">
                                                        <div class="empty-space" style="height: 200px;">
                                                            <div class="empty-space-inner">
                                                                <div class="icon" style="font-size:30px"><i
                                                                            class="icon-layers"></i>
                                                                </div>
                                                                <div class="title m-b-15"> <?php echo app('translator')->get('messages.noAgentAdded'); ?>
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

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->


    
    <div class="modal fade bs-modal-md in" id="ticketGroupModal" role="dialog" aria-labelledby="myModalLabel"
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
<script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>

<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/multiselect/js/jquery.multi-select.js')); ?>"></script>


<script type="text/javascript">



    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    //    save project members
    $('#save-members').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.ticket-agents.store')); ?>',
            container: '#createAgents',
            type: "POST",
            data: $('#createAgents').serialize(),
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
                    window.location.reload();
                }
            }
        })
    });


    $('body').on('click', '.delete-agents', function () {
        var id = $(this).data('agent-id');
        swal({
            title: "Are you sure?",
            text: "This will remove the agent from the list.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.ticket-agents.destroy',':id')); ?>";
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

    $('.change-agent-status').change(function () {
        var agentId = $(this).data('agent-id');
        var status = $(this).val();
        var token = '<?php echo e(csrf_token()); ?>';
        var url = '<?php echo e(route("admin.ticket-agents.update", ':id')); ?>';
        url = url.replace(':id', agentId);

        $.easyAjax({
            type: 'PUT',
            url: url,
            data: {'_token': token, 'status': status}
        });

    })

    $('.change-agent-group').change(function () {
        var agentId = $(this).data('agent-id');
        var groupId = $(this).val();
        var token = '<?php echo e(csrf_token()); ?>';
        var url = '<?php echo e(route("admin.ticket-agents.update-group", ':id')); ?>';
        url = url.replace(':id', agentId);

        $.easyAjax({
            type: 'POST',
            url: url,
            data: {'_token': token, 'groupId': groupId}
        });

    })

    $('#manage-groups').click(function () {
        var url = '<?php echo e(route("admin.ticket-groups.create")); ?>';
        $('#modelHeading').html("<?php echo e(__('modules.tickets.manageGroups')); ?>");
        $.ajaxModal('#ticketGroupModal', url);
    })


</script>


<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/ticket-settings/agents/index.blade.php ENDPATH**/ ?>