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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">

        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-md-12">
                        <h4 class="text-capitalize"><?php echo app('translator')->get('app.menu.employees'); ?> <?php echo app('translator')->get('modules.dashboard.freeEmployees'); ?></h4>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">

                            <a href="<?php echo e(route('admin.employees.index')); ?>" class="btn btn-outline btn-info btn-sm text-capitalize" ><?php echo app('translator')->get('app.view'); ?> <?php echo app('translator')->get('app.all'); ?></a>
                        </div>
                    </div>

                </div>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="users-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('app.id'); ?></th>
                            <th><?php echo app('translator')->get('app.name'); ?></th>
                            <th><?php echo app('translator')->get('app.email'); ?></th>
                            <th><?php echo app('translator')->get('app.status'); ?></th>
                            <th><?php echo app('translator')->get('app.createdAt'); ?></th>
                            <th><?php echo app('translator')->get('app.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script>

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });
    var table;

    $(function() {
        loadTable();

        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('user-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted user!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('admin.employees.destroy',':id')); ?>";
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
                                table._fnDraw();
                            }
                        }
                    });
                }
            });
        });

        $('body').on('click', '.assign_role', function(){
            var id = $(this).data('user-id');
            var role = $(this).data('role-id');
            var token = "<?php echo e(csrf_token()); ?>";


            $.easyAjax({
                url: '<?php echo e(route('admin.employees.assignRole')); ?>',
                type: "POST",
                data: {role: role, userId: id, _token : token},
                success: function (response) {
                    if(response.status == "success"){
                        $.unblockUI();
                        table._fnDraw();
                    }
                }
            })

        });
    });
    function loadTable(){

        table = $('#users-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            destroy: true,
            stateSave: true,
            ajax: '<?php echo route('admin.employees.freeEmployees'); ?>',
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            columns: [
                { data: 'id', name: 'id' },
                { data: 'name', name: 'name' },
                { data: 'email', name: 'email' },
                { data: 'status', name: 'status'},
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action', width: '15%' }
            ]
        });
    }

    $('.toggle-filter').click(function () {
        $('#ticket-filters').toggle('slide');
    })

    $('#apply-filters').click(function () {
        loadTable();
    });

    $('#reset-filters').click(function () {
        $('#filter-form')[0].reset();
        $('#status').val('all');
        $('.select2').val('all');
        $('#filter-form').find('select').select2();
        loadTable();
    })

    function exportData(){

        var employee = $('#employee').val();
        var status   = $('#status').val();
        var role     = $('#role').val();

        var url = '<?php echo e(route('admin.employees.export', [':status' ,':employee', ':role'])); ?>';
        url = url.replace(':role', role);
        url = url.replace(':status', status);
        url = url.replace(':employee', employee);

        window.location.href = url;
    }

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/employees/free_employees.blade.php ENDPATH**/ ?>