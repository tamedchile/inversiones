<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?> #<?php echo e($project->id); ?> - <span
                        class="font-bold"><?php echo e(ucwords($project->project_name)); ?></span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('client.dashboard.index')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('client.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.menu.invoices'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li><a href="<?php echo e(route('client.projects.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.overview'); ?></span></a></li>
                                <?php if(in_array('employees',$modules)): ?>
                                <li><a href="<?php echo e(route('client.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.members'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if($project->client_view_task == 'enable' && in_array('tasks',$modules)): ?>
                                    <li><a href="<?php echo e(route('client.tasks.edit', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.tasks'); ?></span></a></li>
                                <?php endif; ?>

                                <li><a href="<?php echo e(route('client.files.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.files'); ?></span></a></li>
                                <?php if(in_array('timelogs',$modules)): ?>
                                <li><a href="<?php echo e(route('client.time-log.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.timeLogs'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(in_array('invoices',$modules)): ?>
                                <li class="tab-current"><a href="<?php echo e(route('client.project-invoice.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.invoices'); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="invoices-list-panel">
                                    <div class="white-box">
                                        <h2><?php echo app('translator')->get('app.menu.invoices'); ?></h2>


                                        <ul class="list-group" id="invoices-list">
                                            <?php $__empty_1 = true; $__currentLoopData = $project->invoices; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $invoice): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-5 col-xs-12">
                                                             <?php echo e($invoice->invoice_number); ?>

                                                        </div>
                                                        <div class="col-md-2 col-xs-6">
                                                            <?php echo e($invoice->currency->currency_symbol); ?> <?php echo e($invoice->total); ?>

                                                        </div>
                                                        <div class="col-md-2 col-xs-6">
                                                            <?php if($invoice->status == 'unpaid'): ?>
                                                                <label class="label label-danger"><?php echo e(strtoupper($invoice->status)); ?></label>
                                                            <?php else: ?>
                                                                <label class="label label-success"><?php echo e(strtoupper($invoice->status)); ?></label>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="<?php echo e(route('client.project-invoice.download', $invoice->id)); ?>" data-toggle="tooltip" data-original-title="Download" class="btn btn-default btn-circle"><i class="fa fa-download"></i></a>
                                                            <span class="m-l-10"><?php echo e($invoice->issue_date->format($global->date_format)); ?></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-7">
                                                            <?php echo app('translator')->get('messages.noInvoice'); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif; ?>
                                        </ul>
                                    </div>
                                </div>

                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

    
    <div class="modal fade bs-modal-lg in" id="add-invoice-modal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="modal-data-application">
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
                    <button type="button" class="btn btn-success">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    $('#show-invoice-modal').click(function(){
        var url = '<?php echo e(route('admin.invoices.createInvoice', $project->id)); ?>';
        $('#modelHeading').html('Add Invoice');
        $.ajaxModal('#add-invoice-modal',url);
    })

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('invoice-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted invoice!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.invoices.destroy',':id')); ?>";
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
                            $('#invoices-list-panel ul.list-group').html(response.html);

                        }
                    }
                });
            }
        });
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/project-invoices/show.blade.php ENDPATH**/ ?>