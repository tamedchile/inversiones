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
    <style>
        .f-15{
            font-size: 15px !important;
        }
    </style>

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>


<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <?php if(session('message')): ?>
                <div class="alert alert-success"><?php echo e(session('message')); ?></div>
                <?php Session::forget('message');?>
            <?php endif; ?>
            <div class="white-box">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.billing.yourCurrentPlan'); ?> (<?php echo e($company->package->name); ?>)
                    <?php if(!is_null($firstInvoice) && $stripeSettings->api_key != null && $stripeSettings->api_secret != null && $firstInvoice->method == 'Stripe'): ?>
                        <?php if(!is_null($subscription) && $subscription->ends_at == null): ?>
                                <button type="button" class="btn btn-danger waves-effect waves-light unsubscription" data-type="stripe" title="Unsubscribe Plan"><i class="fa fa-ban display-small"></i> <span class="display-big"><?php echo app('translator')->get('modules.billing.unsubscribe'); ?></span></button>
                        <?php endif; ?>
                    <?php elseif(!is_null($firstInvoice) && $stripeSettings->paypal_client_id != null && $stripeSettings->paypal_secret != null && $firstInvoice->method == 'Paypal'): ?>
                        <?php if(!is_null($paypalInvoice) && $paypalInvoice->end_on == null  && $paypalInvoice->status == 'paid'): ?>
                                <button type="button" class="btn btn-danger waves-effect waves-light unsubscription" data-type="paypal" title="Unsubscribe Plan"><i class="fa fa-ban display-small"></i> <span class="display-big"><?php echo app('translator')->get('modules.billing.unsubscribe'); ?></span></button>
                        <?php endif; ?>
                    <?php elseif(!is_null($firstInvoice) && $stripeSettings->razorpay_key != null && $stripeSettings->razorpay_secret != null && $firstInvoice->method == 'Razorpay'): ?>
                        <?php if(!is_null($razorPaySubscription) && $razorPaySubscription->ends_at == null): ?>
                                <button type="button" class="btn btn-danger waves-effect waves-light unsubscription" data-type="razorpay" title="Unsubscribe Plan"><i class="fa fa-ban display-small"></i> <span class="display-big"><?php echo app('translator')->get('modules.billing.unsubscribe'); ?></span></button>
                        <?php endif; ?>
                    <?php else: ?>

                    <?php endif; ?>
                    <div class="pull-right" style="margin-top: -7px;"><a href="<?php echo e(route('admin.billing.packages')); ?>" class="btn btn-block btn-success waves-effect text-center"><?php echo app('translator')->get('modules.billing.changePlan'); ?></a> </div></div>

                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="row f-15 m-b-10">
                            <div class="col-sm-9">
                                <?php echo app('translator')->get('app.annual'); ?> <?php echo app('translator')->get('app.price'); ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo e($company->package->currency->currency_symbol); ?><?php echo e($company->package->annual_price); ?>

                            </div>
                        </div>
                        <div class="row f-15 m-b-10">
                            <div class="col-sm-9">
                                <?php echo app('translator')->get('app.monthly'); ?> <?php echo app('translator')->get('app.price'); ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo e($company->package->currency->currency_symbol); ?><?php echo e($company->package->monthly_price); ?>

                            </div>
                        </div>
                        <div class="row f-15 m-b-10">
                            <div class="col-sm-9">
                                <?php echo app('translator')->get('app.max'); ?> <?php echo app('translator')->get('app.menu.employees'); ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo e($company->package->max_employees); ?>

                            </div>
                        </div>
                        <div class="row f-15 m-b-10">
                            <div class="col-sm-9">
                                <?php echo app('translator')->get('app.active'); ?> <?php echo app('translator')->get('app.menu.employees'); ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo e($company->employees->count()); ?>

                            </div>
                        </div>
                        <div class="row f-15 m-b-10">
                            <div class="col-sm-9">
                                <?php echo app('translator')->get('modules.billing.nextPaymentDate'); ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo e($nextPaymentDate); ?>

                            </div>
                        </div>
                        <div class="row f-15 m-b-10">
                            <div class="col-sm-9">
                                <?php echo app('translator')->get('modules.billing.previousPaymentDate'); ?>
                            </div>
                            <div class="col-sm-3">
                                <?php echo e($previousPaymentDate); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-sm-12">
            <div class="white-box">
                <h3 class="box-title"><?php echo app('translator')->get('app.menu.invoices'); ?></h3>

                <div class="table-responsive">
                    <table class="table color-table inverse-table" id="users-table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th><?php echo app('translator')->get('app.menu.packages'); ?></th>
                            <th><?php echo app('translator')->get('app.amount'); ?> (<?php echo e($superadmin->currency->currency_symbol); ?>)</th>
                            <th><?php echo app('translator')->get('app.date'); ?></th>
                            <th><?php echo app('translator')->get('modules.billing.nextPaymentDate'); ?></th>
                            <th><?php echo app('translator')->get('modules.payments.paymentGateway'); ?></th>
                            <th><?php echo app('translator')->get('app.action'); ?></th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script>

        <?php if(\Session::has('message')): ?>
        toastr.success("<?php echo e(\Session::get('message')); ?>");
        <?php endif; ?>
        $(function() {
            var table = $('#users-table').dataTable({
                responsive: true,
                processing: true,
                serverSide: true,
                stateSave: true,
                "ordering": false,
                ajax: '<?php echo route('admin.billing.data'); ?>',
                language: {
                    "url": "<?php echo __("app.datatable") ?>"
                },
                "fnDrawCallback": function( oSettings ) {
                    $("body").tooltip({
                        selector: '[data-toggle="tooltip"]'
                    });
                },
                columns: [
                    { data: 'id', name: 'id' ,bSort: false },
                    { data: 'name', name: 'name' },
                    { data: 'amount', name: 'amount' },
                    { data: 'paid_on', name: 'paid_on' },
                    { data: 'next_pay_date', name: 'next_pay_date' },
                    { data: 'method', name: 'method' },
                    { data: 'action', name: 'action' }
                ]
            });
        });

        $('body').on('click', '.unsubscription', function(){
            var type = $(this).data('type');
            swal({
                title: "Are you sure?",
                text: "Do you want to unsubscribe this plan!",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "Yes, Unsubscribe it!",
                cancelButtonText: "No, cancel please!",
                closeOnConfirm: true,
                closeOnCancel: true
            }, function(isConfirm){
                if (isConfirm) {

                    var url = "<?php echo e(route('admin.billing.unsubscribe')); ?>";
                    var token = "<?php echo e(csrf_token()); ?>";
                    $.easyAjax({
                        type: 'POST',
                        url: url,
                        data: {'_token': token, '_method': 'POST', 'type': type},
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

    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/billing/index.blade.php ENDPATH**/ ?>