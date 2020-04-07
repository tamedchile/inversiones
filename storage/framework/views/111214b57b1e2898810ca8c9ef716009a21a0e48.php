<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12 text-right">
            <a href="<?php echo e(route('admin.leads.create')); ?>"
            class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->get('modules.lead.addNewLead'); ?> <i class="fa fa-plus"
                                                                                            aria-hidden="true"></i></a>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row dashboard-stats">
        <div class="col-md-12 m-b-30">
            <div class="white-box">
                <div class="col-md-4 text-center">
                    <h4><span class="text-dark"><?php echo e($totalLeads); ?></span> <span
                                class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalLeads'); ?></span></h4>
                </div>
                <div class="col-md-4 text-center b-l">
                    <h4><span class="text-info"><?php echo e($totalClientConverted); ?></span> <span
                                class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalConvertedClient'); ?></span>
                    </h4>
                </div>
                <div class="col-md-4 text-center b-l">
                    <h4><span class="text-warning"><?php echo e($pendingLeadFollowUps); ?></span> <span
                                class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalPendingFollowUps'); ?></span>
                    </h4>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
 

        <div class="col-md-12">
            <div class="white-box">
                
                <?php $__env->startSection('filter-section'); ?>
                <div class="row" id="ticket-filters">
                    
                    <form action="" id="filter-form">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.lead.client'); ?></label>
                                <select class="form-control selectpicker" name="client" id="client" data-style="form-control">
                                    <option value="all"><?php echo app('translator')->get('modules.lead.all'); ?></option>
                                    <option value="lead"><?php echo app('translator')->get('modules.lead.lead'); ?></option>
                                    <option value="client"><?php echo app('translator')->get('modules.lead.client'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.lead.followUp'); ?></label>
                                <select class="form-control selectpicker" name="followUp" id="followUp" data-style="form-control">
                                    <option value="all"><?php echo app('translator')->get('modules.lead.all'); ?></option>
                                    <option value="pending"><?php echo app('translator')->get('modules.lead.pending'); ?></option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
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
    
    <div class="modal fade bs-modal-md in" id="followUpModal" role="dialog" aria-labelledby="myModalLabel"
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
    <script src="//cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo e(asset('js/datatables/buttons.server-side.js')); ?>"></script>

    <?php echo $dataTable->scripts(); ?>

    <script>
        var table;
        function tableLoad() {
            window.LaravelDataTables["leads-table"].draw();
        }
        $(function() {
            tableLoad();
            $('#reset-filters').click(function () {
                $('#filter-form')[0].reset();
                $('#filter-form').find('select').selectpicker('render');
                $.easyBlockUI('#leads-table');
                tableLoad();
                $.easyUnblockUI('#leads-table');
            })
            var table;
            $('#apply-filters').click(function () {
                $('#leads-table').on('preXhr.dt', function (e, settings, data) {
                    var client = $('#client').val();
                    var followUp = $('#followUp').val();
                    data['client'] = client;
                    data['followUp'] = followUp;
                });
                $.easyBlockUI('#leads-table');
                tableLoad();
                $.easyUnblockUI('#leads-table');
            });

            $('body').on('click', '.sa-params', function(){
                var id = $(this).data('user-id');
                swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover the deleted lead!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel please!",
                    closeOnConfirm: true,
                    closeOnCancel: true
                }, function(isConfirm){
                    if (isConfirm) {

                        var url = "<?php echo e(route('admin.leads.destroy',':id')); ?>";
                        url = url.replace(':id', id);

                        var token = "<?php echo e(csrf_token()); ?>";

                        $.easyAjax({
                            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                            success: function (response) {
                                if (response.status == "success") {
                                    $.easyBlockUI('#leads-table');
                                    tableLoad();
                                    $.easyUnblockUI('#leads-table');
                                }
                            }
                        });
                    }
                });
            });
        });

       function changeStatus(leadID, statusID){
           var url = "<?php echo e(route('admin.leads.change-status')); ?>";
           var token = "<?php echo e(csrf_token()); ?>";

           $.easyAjax({
               type: 'POST',
               url: url,
               data: {'_token': token,'leadID': leadID,'statusID': statusID},
               success: function (response) {
                   if (response.status == "success") {
                    $.easyBlockUI('#leads-table');
                    tableLoad();
                    $.easyUnblockUI('#leads-table');
                   }
               }
           });
        }

        $('.edit-column').click(function () {
            var id = $(this).data('column-id');
            var url = '<?php echo e(route("admin.taskboard.edit", ':id')); ?>';
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#edit-column-form').html(response.view);
                    $(".colorpicker").asColorPicker();
                    $('#edit-column-form').show();
                }
            })
        })

        function followUp (leadID) {

            var url = '<?php echo e(route('admin.leads.follow-up', ':id')); ?>';
            url = url.replace(':id', leadID);

            $('#modelHeading').html('Add Follow Up');
            $.ajaxModal('#followUpModal', url);
        }
        $('.toggle-filter').click(function () {
            $('#ticket-filters').toggle('slide');
        })
        function exportData(){

            var client = $('#client').val();
            var followUp = $('#followUp').val();

            var url = '<?php echo e(route('admin.leads.export', [':followUp', ':client'])); ?>';
            url = url.replace(':client', client);
            url = url.replace(':followUp', followUp);

            window.location.href = url;
        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/lead/index.blade.php ENDPATH**/ ?>