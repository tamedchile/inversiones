<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
            <a href="<?php echo e(route('admin.contracts.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->get('modules.contracts.createContract'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>

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
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row dashboard-stats">
        <div class="col-md-12 m-b-30">
            <div class="white-box">
                <div class="col-sm-4 text-center">
                    <h4><span class="text-dark" id="totalProjects"><?php echo e($contractCounts); ?></span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.contracts.totalContracts'); ?></span></h4>
                </div>
                <div class="col-sm-4 b-l text-center">
                    <h4><span class="text-warning" id="daysPresent"><?php echo e($aboutToExpireCounts); ?></span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.contracts.aboutToExpire'); ?></span></h4>
                </div>
                <div class="col-sm-4 b-l text-center">
                    <h4><span class="text-danger" id="overdueProjects"><?php echo e($expiredCounts); ?></span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.contracts.expired'); ?></span></h4>
                </div>
                
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="white-box">
                
                <?php $__env->startSection('filter-section'); ?>                    
                    <div class="row"  id="ticket-filters">
                        
                        <form action="" id="filter-form">
                            <div class="col-md-12">
                                <h5 ><?php echo app('translator')->get('app.selectDateRange'); ?></h5>
                                <div class="input-daterange input-group" id="date-range">
                                    <input type="text" class="form-control" id="start-date" placeholder="<?php echo app('translator')->get('app.startDate'); ?>"
                                        value=""/>
                                    <span class="input-group-addon bg-info b-0 text-white"><?php echo app('translator')->get('app.to'); ?></span>
                                    <input type="text" class="form-control" id="end-date" placeholder="<?php echo app('translator')->get('app.endDate'); ?>"
                                        value=""/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 ><?php echo app('translator')->get('app.client'); ?></h5>
                                <div class="form-group">
                                    <div>
                                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('app.client'); ?>" name="client" id="clientID">
                                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($client->id); ?>"><?php echo e(ucwords($client->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <h5 ><?php echo app('translator')->get('modules.contracts.contractType'); ?></h5>
                                <div class="form-group">
                                    <div>
                                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('modules.contracts.contractType'); ?>" name="contractType" id="contractType">
                                            <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                            <?php $__currentLoopData = $contractType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                <option value="<?php echo e($type->id); ?>"><?php echo e(ucwords($type->name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group m-t-10">
                                    <label class="control-label col-xs-12">&nbsp;</label>
                                    <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.apply'); ?></button>
                                    <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('app.reset'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                <?php $__env->stopSection(); ?>

                <div class="table-responsive">
                    <?php echo $dataTable->table(['class' => 'table table-bordered table-hover toggle-circle default footable-loaded footable']); ?>

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
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<?php if($global->locale == 'en'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.<?php echo e($global->locale); ?>-AU.min.js"></script>
<?php else: ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.<?php echo e($global->locale); ?>.min.js"></script>
<?php endif; ?>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
<script src="<?php echo e(asset('js/datatables/buttons.server-side.js')); ?>"></script>

<?php echo $dataTable->scripts(); ?>

<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });
    var table;
    $(function() {
        jQuery('#date-range').datepicker({
            toggleActive: true,
            weekStart:'<?php echo e($global->week_start); ?>',
            language: '<?php echo e($global->locale); ?>',
            autoclose: true,
            format: '<?php echo e($global->date_picker_format); ?>',
        });

        loadTable();

        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('contract-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted contract!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('admin.contracts.destroy',':id')); ?>";
                    url = url.replace(':id', id);

                    var token = "<?php echo e(csrf_token()); ?>";

                    $.easyAjax({
                        type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                        success: function (response) {
                            if (response.status == "success") {
                                $.unblockUI();
                                loadTable();
                            }
                        }
                    });
                }
            });
        });

    });


    $('.toggle-filter').click(function () {
        $('#ticket-filters').toggle('slide');
    })
    $('#contracts-table').on('preXhr.dt', function (e, settings, data) {
        var startDate = $('#start-date').val();
        if (startDate == '') {
            startDate = null;
        }
        var endDate = $('#end-date').val();
        if (endDate == '') {
            endDate = null;
        }
        var clientID = $('#clientID').val();
        var contractType = $('#contractType').val();
        var status = $('#status').val();
        data['startDate'] = startDate;
        data['endDate'] = endDate;
        data['status'] = status;
        data['clientID'] = clientID;
        data['contractType'] = contractType;
    });

    $('#apply-filters').click(function () {
        loadTable();
    });

    function loadTable(){
        window.LaravelDataTables["contracts-table"].draw();
    }

    $('#reset-filters').click(function () {
        console.log('hii from ');
        $('#filter-form')[0].reset();
        $('.select2').val('all');
        $('#filter-form').find('select').select2();
        loadTable();
    });

    function exportData(){

        var startDate = $('#start-date').val();

        if (startDate == '') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '') {
            endDate = null;
        }

        var status = $('#status').val();

        var url = '<?php echo e(route('admin.estimates.export', [':startDate', ':endDate', ':status'])); ?>';
        url = url.replace(':startDate', startDate);
        url = url.replace(':endDate', endDate);
        url = url.replace(':status', status);

        window.location.href = url;
    }

</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/contracts/index.blade.php ENDPATH**/ ?>