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
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bootstrap-colorselector/bootstrap-colorselector.min.css')); ?>">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.menu.leaveSettings'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">

                                    <div class="form-group">
                                        <div class="radio-list">
                                            <label class="radio-inline p-0">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="leaves_start_from" <?php if($global->leaves_start_from == 'joining_date'): ?> checked <?php endif; ?> id="crypto_currency_joining" value="joining_date">
                                                    <label for="crypto_currency_joining"><?php echo app('translator')->get('modules.leaves.countLeavesFromDateOfJoining'); ?></label>
                                                </div>
                                            </label>
                                            <label class="radio-inline">
                                                <div class="radio radio-info">
                                                    <input type="radio" name="leaves_start_from" <?php if($global->leaves_start_from == 'year_start'): ?> checked <?php endif; ?> id="crypto_currency_year" value="year_start">
                                                    <label for="crypto_currency_year"><?php echo app('translator')->get('modules.leaves.countLeavesFromStartOfYear'); ?></label>
                                                </div>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="table-responsive">
                                        <table class="table" id="leave-type-table">
                                            <thead>
                                            <tr>
                                                <th><?php echo app('translator')->get('modules.leaves.leaveType'); ?></th>
                                                <th><?php echo app('translator')->get('modules.leaves.noOfLeaves'); ?></th>
                                                <th><?php echo app('translator')->get('app.action'); ?></th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $__empty_1 = true; $__currentLoopData = $leaveTypes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$leaveType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <tr id="type-<?php echo e($leaveType->id); ?>">
                                                    <td>
                                                        <label class="label label-<?php echo e($leaveType->color); ?>"><?php echo e(ucwords($leaveType->type_name)); ?></label>
                                                    </td>
                                                    <td>
                                                        <input type="number" min="0" value="<?php echo e($leaveType->no_of_leaves); ?>"
                                                                class="form-control leave-count-<?php echo e($leaveType->id); ?>">
                                                    </td>
                                                    <td>
                                                        <button type="button" data-type-id="<?php echo e($leaveType->id); ?>"
                                                                class="btn btn-sm btn-success btn-rounded update-category">
                                                            <i class="fa fa-check"></i></button>
                                                        <button type="button" data-cat-id="<?php echo e($leaveType->id); ?>"
                                                                class="btn btn-sm btn-danger btn-rounded delete-category">
                                                            <i class="fa fa-times"></i></button>
                                                    </td>
                                                </tr>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <tr>
                                                    <td colspan="3"><?php echo app('translator')->get('messages.noLeaveTypeAdded'); ?></td>
                                                </tr>
                                            <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <hr>
                                    <?php echo Form::open(['id'=>'createLeaveType','class'=>'ajax-form','method'=>'POST']); ?>

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-xs-12 ">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('modules.leaves.leaveType'); ?></label>
                                                    <input type="text" name="type_name" id="type_name"
                                                           class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-xs-12 ">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('modules.customFields.label'); ?> <?php echo app('translator')->get('modules.sticky.colors'); ?></label>
                                                    <select id="colorselector" name="color">
                                                        <option value="info" data-color="#5475ed" selected>Blue
                                                        </option>
                                                        <option value="warning" data-color="#f1c411">Yellow</option>
                                                        <option value="purple" data-color="#ab8ce4">Purple</option>
                                                        <option value="danger" data-color="#ed4040">Red</option>
                                                        <option value="success" data-color="#00c292">Green</option>
                                                        <option value="inverse" data-color="#4c5667">Grey</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <button type="button" id="save-type" class="btn btn-success"><i
                                                    class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                                    </div>
                                    <?php echo Form::close(); ?>

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
    <script src="<?php echo e(asset('plugins/bootstrap-colorselector/bootstrap-colorselector.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>

    <script>

        $('#leave-type-table').dataTable({
            responsive: true,
            "columnDefs": [
                { responsivePriority: 1, targets: 0 },
                { responsivePriority: 2, targets: 1 }
            ],
            searching: false,
            paging: false,
            info: false
        });

        $('#colorselector').colorselector();

        $('#createLeaveType').submit(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.leaveType.store')); ?>',
                container: '#createLeaveType',
                type: "POST",
                data: $('#createLeaveType').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
            return false;
        })

        $('.update-category').click(function () {
            var id = $(this).data('type-id');
            var leaves = $('.leave-count-'+id).val();
            var url = "<?php echo e(route('admin.leaveType.update',':id')); ?>";
            url = url.replace(':id', id);

            var token = "<?php echo e(csrf_token()); ?>";

            $.easyAjax({
                type: 'POST',
                url: url,
                data: {'_token': token, '_method': 'PUT', 'leaves': leaves}
            });
        });

        $('body').on('click', '.delete-category', function () {
            var id = $(this).data('cat-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted leave type!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function (isConfirm) {
                if (isConfirm) {
                    var url = "<?php echo e(route('admin.leaveType.destroy',':id')); ?>";
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
                                $('#type-' + id).fadeOut();
                            }
                        }
                    });
                }
            });
        });

        $('#save-type').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.leaveType.store')); ?>',
                container: '#createLeaveType',
                type: "POST",
                data: $('#createLeaveType').serialize(),
                success: function (response) {
                    if (response.status == 'success') {
                        window.location.reload();
                    }
                }
            })
        });

        $('input[name=leaves_start_from]').click(function () {
            var leaveCountFrom = $('input[name=leaves_start_from]:checked').val();
            $.easyAjax({
                url: '<?php echo e(route('admin.leaves-settings.store')); ?>',
                type: "POST",
                data: {'_token': '<?php echo e(csrf_token()); ?>', 'leaveCountFrom': leaveCountFrom}
            })
        });
    </script>


<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/leaves-settings/index.blade.php ENDPATH**/ ?>