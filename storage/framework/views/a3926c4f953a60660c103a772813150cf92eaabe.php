<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?>

                <span class="text-info b-l p-l-10 m-l-5"><?php echo e($totalCompanies); ?></span> <span
                class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalCompanies'); ?></span>
            </h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-6 col-xs-12 text-right">
            <a href="<?php echo e(route('super-admin.companies.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.company'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
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
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
    <script src="<?php echo e(asset('plugins/bower_components/moment/moment.js')); ?>"></script>
<?php $__env->stopPush(); ?>


<?php $__env->startSection('filter-section'); ?>
<div class="row"  id="ticket-filters">

    <form action="" id="filter-form">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo app('translator')->get('app.package'); ?></label>
                <select class="form-control selectpicker" name="package" id="package" data-style="form-control">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <?php $__currentLoopData = $packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($package->id); ?>"><?php echo e(ucwords($package->name)); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label"><?php echo app('translator')->get('app.package'); ?> <?php echo app('translator')->get('modules.invoices.type'); ?></label>
                <select class="form-control selectpicker" name="type" id="type" data-style="form-control">
                    <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                    <option value="monthly"><?php echo app('translator')->get('app.monthly'); ?></option>
                    <option value="annual"><?php echo app('translator')->get('app.annual'); ?></option>
                </select>
            </div>
        </div>
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label col-xs-12">&nbsp;</label>
                <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.apply'); ?></button>
                <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('app.reset'); ?></button>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">


        <div class="col-md-12">
            <div class="white-box">



                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="users-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo app('translator')->get('app.name'); ?></th>
                            <th><?php echo app('translator')->get('app.email'); ?></th>
                            <th><?php echo app('translator')->get('app.package'); ?></th>
                            <th><?php echo app('translator')->get('app.status'); ?></th>
                            <th><?php echo app('translator')->get('app.details'); ?></th>
                            <th><?php echo app('translator')->get('app.lastActivity'); ?></th>
                            <th><?php echo app('translator')->get('app.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <div class="modal fade bs-modal-md in" id="packageUpdateModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
            <form class="ajax-form" id="update-company-form">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading">Change Package</span>
                    </div>
                    <div class="modal-body">
                        Loading...
                    </div>
                    <div class="modal-footer">
                        <div class="form-actions">
                            <button type="submit" class="btn btn-success"><i
                                        class="fa fa-check"></i> <?php echo app('translator')->get('app.update'); ?></button>

                            <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo app('translator')->get('app.back'); ?></button>
                        </div>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- .row -->
    
    <div class="modal fade bs-modal-md in" id="offlineMethod" role="dialog" aria-labelledby="myModalLabel"
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
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script>
        $(function() {
            var modal = $('#packageUpdateModal');
            tableLoad();
            $('#reset-filters').click(function () {
                $('#filter-form')[0].reset();
                $('#filter-form').find('select').selectpicker('render');
                tableLoad();
            });
            var table;
            $('#apply-filters').click(function () {
                tableLoad();
            });


            $('.toggle-filter').click(function () {
                $('#ticket-filters').toggle('slide');
            })

            $('body').on('click', '.package-update-button', function () {
                modal.find('.modal-body').html('Loading...');
                const url = '<?php echo e(route('super-admin.companies.edit-package.get', ':companyId')); ?>' . replace(':companyId', $(this).data(
                    'company-id'
                ));
                $.easyAjax({
                    type: 'GET',
                    url: url,
                    blockUI: false,
                    messagePosition: "inline",
                    success: function (response) {
                        if (response.status === "success" && response.data) {
                            modal.find('.modal-body').html(response.data).closest('#packageUpdateModal').modal('show');
                            tableLoad();
                        } else {
                            modal.find('.modal-body').html('Loading...').closest('#packageUpdateModal').modal('show');
                        }
                    }
                });
            });

            $('#offlineMethod').on('hidden.bs.modal', function (e) {
                $('body').addClass('modal-open');
            })
        });

        tableLoad = () => {
            var packageName = $('#package').val();
            var packageType = $('#type').val();

            table = $('#users-table').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                stateSave: true,
                destroy: true,
                ajax: '<?php echo route('super-admin.companies.data'); ?>?package='+packageName+'&type='+packageType,
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
                    { data: 'company_name', name: 'company_name' },
                    { data: 'company_email', name: 'company_email' },
                    { data: 'package', name: 'package.name', 'sortable':false },
                    { data: 'status', name: 'status' },
                    { data: 'details', name: 'details', 'sortable':false },
                    { data: 'last_login', name: 'last_login'},
                    { data: 'action', name: 'action' }
                ]
            });
        }
        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('user-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted company!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('super-admin.companies.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                var total = $('#totalCompanies').text();
                                $('#totalCompanies').text(parseInt(total) - parseInt(1));
                                table._fnDraw();
                            }
                        }
                    });
                }
            });
        });

    </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/super-admin/companies/index.blade.php ENDPATH**/ ?>