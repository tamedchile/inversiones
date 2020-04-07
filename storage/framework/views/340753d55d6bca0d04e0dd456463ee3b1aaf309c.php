<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12 text-right">
            <?php if($user->can('add_lead')): ?>
                <a href="<?php echo e(route('member.leads.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->get('modules.lead.addNewLead'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
            <?php endif; ?>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
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
                    <h4><span class="text-dark"><?php echo e($totalLeads); ?></span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalLeads'); ?></span></h4>
                </div>
                <div class="col-md-4 text-center b-l">
                    <h4><span class="text-info"><?php echo e($totalClientConverted); ?></span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalConvertedClient'); ?></span></h4>
                </div>
                <div class="col-md-4 text-center b-l">
                    <h4><span class="text-warning"><?php echo e($pendingLeadFollowUps); ?></span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.dashboard.totalPendingFollowUps'); ?></span></h4>
                </div>
            </div>
        </div>

    </div>

    <div class="row">

        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <?php if($user->can('add_lead')): ?>
                                <a href="<?php echo e(route('member.leads.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->get('modules.lead.addNewLead'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
                            <?php endif; ?>
                            <?php if($user->can('view_lead')): ?>
                                <a href="javascript:;" id="toggle-filter" class="btn btn-outline btn-danger btn-sm toggle-filter"><i
                                        class="fa fa-sliders"></i> <?php echo app('translator')->get('app.filterResults'); ?></a>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php if($user->can('view_lead')): ?>
                    <?php $__env->startSection('filter-section'); ?> 
                    <div class="row"  id="ticket-filters">
                     
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
                                    <label class="control-label col-xs-12">&nbsp;</label>
                                    <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.apply'); ?></button>
                                    <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('app.reset'); ?></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <?php $__env->stopSection(); ?>
                <?php endif; ?>
                <div class="table-responsive">
                <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="users-table">
                    <thead>
                    <tr>
                        <th><?php echo app('translator')->get('app.id'); ?></th>
                        <th><?php echo app('translator')->get('app.clientName'); ?></th>
                        <th><?php echo app('translator')->get('modules.lead.companyName'); ?></th>
                        <th><?php echo app('translator')->get('app.createdOn'); ?></th>
                        <th><?php echo app('translator')->get('modules.lead.nextFollowUp'); ?></th>
                        <th><?php echo app('translator')->get('app.status'); ?></th>
                        <th><?php echo app('translator')->get('app.action'); ?></th>
                    </tr>
                    </thead>
                </table>
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
    <script>
        var table;
        $(function() {
            tableLoad();
            $('#reset-filters').click(function () {
                $('#filter-form')[0].reset();
                $('#filter-form').find('select').selectpicker('render');
                tableLoad();
            })
            var table;
        $('#apply-filters').click(function () {
            tableLoad();
        });
      function tableLoad() {
          var client = $('#client').val();
          var followUp = $('#followUp').val();

          table = $('#users-table').dataTable({
              responsive: true,
              processing: true,
              serverSide: true,
              destroy: true,
              stateSave: true,
              ajax: '<?php echo route('member.leads.data'); ?>?client='+client+'&followUp='+followUp,
              language: {
                  "url": "<?php echo __("app.datatable") ?>"
              },
              "fnDrawCallback": function( oSettings ) {
                  $("body").tooltip({
                      selector: '[data-toggle="tooltip"]'
                  });
              },
              columns: [
                  { data: 'DT_RowIndex', orderable: false, searchable: false },
                  { data: 'client_name', name: 'client_name' },
                  { data: 'company_name', name: 'company_name' },
                  { data: 'created_at', name: 'created_at' },
                  { data: 'next_follow_up_date', name: 'next_follow_up_date' },
                  { data: 'status', name: 'status'},
                  { data: 'action', name: 'action'}
              ]
          });
      }


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

                        var url = "<?php echo e(route('member.leads.destroy',':id')); ?>";
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

       function changeStatus(leadID, statusID){
           var url = "<?php echo e(route('member.leads.change-status')); ?>";
           var token = "<?php echo e(csrf_token()); ?>";

           $.easyAjax({
               type: 'POST',
               url: url,
               data: {'_token': token,'leadID': leadID,'statusID': statusID},
               success: function (response) {
                   if (response.status == "success") {
                       $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
//                        table._fnDraw();
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

            var url = '<?php echo e(route('member.leads.follow-up', ':id')); ?>';
            url = url.replace(':id', leadID);

            $('#modelHeading').html('Add Follow Up');
            $.ajaxModal('#followUpModal', url);
        }

        $('.toggle-filter').click(function () {
            $('#ticket-filters').toggle('slide');
        })
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/lead/index.blade.php ENDPATH**/ ?>