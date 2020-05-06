<?php $__env->startSection('page-title'); ?>
<div class="row bg-title top-left-part2" style="margin: 0 0 0 -8px !important;">
    <!-- .page title -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="circle w__40 gray"><?php echo e($user->pnombre[0]); ?></span><?php echo e($user->pnombre); ?> <?php echo e($user->papellido); ?></h4>
    </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e($pageTitle); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<style>
    /*select.bs-select-hidden, select.selectpicker {*/
    /*    display: block!important;*/
    /*}*/
</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row abajo-titulo" style="    margin-top: 101px !important;">
        <div class="col-md-12" >
            <div class="white-box">

                <?php $__env->startSection('filter-section'); ?>
                <div class="row" id="ticket-filters">

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
                            <div class="form-group m-t-10">
                                <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.apply'); ?></button>
                                <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('app.reset'); ?></button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php $__env->stopSection(); ?>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="notice-table">
                        <thead>
                        <tr>
                            <th><?php echo app('translator')->get('app.id'); ?></th>
                            <th><?php echo app('translator')->get('modules.notices.notice'); ?></th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
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
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<?php if($global->locale == 'en'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.<?php echo e($global->locale); ?>-AU.min.js"></script>
<?php elseif($global->locale == 'pt-br'): ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js"></script>
<?php else: ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.<?php echo e($global->locale); ?>.min.js"></script>
<?php endif; ?>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script>
    var table;
    $(function() {

        jQuery('#date-range').datepicker({
            toggleActive: true,
            language: '<?php echo e($global->locale); ?>',
            autoclose: true,
            format: '<?php echo e($global->date_picker_format); ?>',
        });
        loadTable();



        $('body').on('click', '.sa-params', function(){
            var id = $(this).data('user-id');
            swal({
                title: "Are you sure?",
                text: "You will not be able to recover the deleted notice!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, delete it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('member.notices.destroy',':id')); ?>";
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

    });

    function showNoticeModal(id) {
        var url = '<?php echo e(route('client.notices.show', ':id')); ?>';
        url = url.replace(':id', id);
        $.ajaxModal('#projectTimerModal', url);
    }

    function loadTable () {

        var startDate = $('#start-date').val();

        if (startDate == '' || typeof startDate === 'undefined') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '' || typeof endDate === 'undefined') {
            endDate = null;
        }

        table = $('#notice-table').dataTable({
            responsive: true,
            processing: true,
            serverSide: true,
            destroy: true,
            ajax: '<?php echo route('client.notices.data'); ?>?startDate=' + startDate + '&endDate=' + endDate,
            language: {
                "url": "<?php echo __("app.datatable") ?>"
            },
            "fnDrawCallback": function( oSettings ) {
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            },
            order: [[ 0, "desc" ]],
            columns: [
                { data: 'id', name: 'id'},
                { data: 'heading', name: 'heading' },
                { data: 'created_at', name: 'created_at' },
                { data: 'action', name: 'action' }
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
        loadTable();
    })
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/client/notices/index.blade.php ENDPATH**/ ?>