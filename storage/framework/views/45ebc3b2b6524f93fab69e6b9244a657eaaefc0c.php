<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo e(__($pageTitle)); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.super_admin_payment_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">

                                    <h3 class="box-title m-b-0"><?php echo app('translator')->get('app.menu.onlinePayment'); ?></h3>

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 ">
                                            <?php echo Form::open(['id'=>'updateSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3 class="box-title text-success">Paypal</h3>
                                                        <hr class="m-t-0 m-b-20">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->get('modules.paymentSetting.paypalClientId'); ?></label>
                                                            <input type="text" name="paypal_client_id" id="paypal_client_id"
                                                                   class="form-control" value="<?php echo e($credentials->paypal_client_id); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->get('modules.paymentSetting.paypalSecret'); ?></label>
                                                            <input type="password" name="paypal_secret"
                                                                   id="paypal_secret"
                                                                   class="form-control"
                                                                   value="<?php echo e($credentials->paypal_secret); ?>">
                                                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                        </div>
                                                    </div>


                                                    <!--/span-->
                                                    <div class="col-md-6">

                                                        <div class="form-group">
                                                            <label>Select environment</label>
                                                            <select class="form-control" name="paypal_mode" id="paypal_mode" data-style="form-control">
                                                                <option value="sandbox" <?php if($credentials->paypal_mode == 'sandbox'): ?> selected <?php endif; ?>>Sandbox</option>
                                                                <option value="live" <?php if($credentials->paypal_mode == 'live'): ?> selected <?php endif; ?>>Live</option>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="control-label" ><?php echo app('translator')->get('modules.payments.paypalStatus'); ?></label>
                                                            <div class="switchery-demo">
                                                                <input
                                                                        type="checkbox"
                                                                        data-type-name="paypal"
                                                                        name="paypal_status"
                                                                        <?php if($credentials->paypal_status == 'active'): ?> checked <?php endif; ?>
                                                                        class="js-switch special" id="paypalButton"
                                                                        data-color="#00c292"
                                                                        data-secondary-color="#f96262"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="mail_from_name"><?php echo app('translator')->get('app.webhook'); ?></label>
                                                            <p class="text-bold"><?php echo e(route('verify-billing-ipn')); ?></p>
                                                            <p class="text-info">(<?php echo app('translator')->get('messages.addPaypalWebhookUrl'); ?>
                                                                )</p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 m-t-20">
                                                        <h3 class="box-title text-warning"><?php echo app('translator')->get('modules.paymentSetting.stripe'); ?></h3>
                                                        <hr class="m-t-0 m-b-20">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->get('modules.paymentSetting.stripeClientId'); ?></label>
                                                            <input type="text" name="api_key" id="stripe_client_id"
                                                                   class="form-control" value="<?php echo e($credentials->api_key); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->get('modules.paymentSetting.stripeSecret'); ?></label>
                                                            <input type="password" name="api_secret" id="stripe_secret"
                                                                   class="form-control" value="<?php echo e($credentials->api_secret); ?>">
                                                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label><?php echo app('translator')->get('modules.paymentSetting.stripeWebhookSecret'); ?></label>
                                                            <input type="password" name="webhook_key" id="stripe_webhook_secret"
                                                                   class="form-control" value="<?php echo e($credentials->webhook_key); ?>">
                                                            <input type="hidden" name="bothUncheck" id="bothUncheck" >
                                                            <input type="hidden" name="type" id="type" >
                                                            <input type="hidden" name="_method" id="method" >

                                                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="mail_from_name"><?php echo app('translator')->get('app.webhook'); ?></label>
                                                            <p class="text-bold"><?php echo e(route('save_webhook')); ?></p>
                                                            <p class="text-info">(<?php echo app('translator')->get('messages.addStripeWebhookUrl'); ?>)</p>
                                                        </div>
                                                    </div>
                                                    <!--/span-->

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" ><?php echo app('translator')->get('modules.payments.stripeStatus'); ?></label>
                                                            <div class="switchery-demo">
                                                                <input
                                                                        type="checkbox"
                                                                        data-type-name="stripe"
                                                                        name="stripe_status"
                                                                        <?php if($credentials->stripe_status == 'active'): ?> checked <?php endif; ?>
                                                                        class="js-switch"
                                                                        data-color="#00c292" id="stripeButton"
                                                                        data-secondary-color="#f96262"
                                                                />
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12 m-t-20">
                                                        <h3 class="box-title text-info"><?php echo app('translator')->get('modules.paymentSetting.razorpay'); ?></h3>
                                                        <hr class="m-t-0 m-b-20">
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="">Razorpay Key</label>
                                                            <input type="text" name="razorpay_key" id="razorpay_key"
                                                                   class="form-control" value="<?php echo e($credentials->razorpay_key); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Razorpay Secret Key</label>
                                                            <input type="password" name="razorpay_secret" id="razorpay_secret"
                                                                   class="form-control" value="<?php echo e($credentials->razorpay_secret); ?>">
                                                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Razorpay Webhook Secret Key</label>
                                                            <input type="password" name="razorpay_webhook_secret" id="razorpay_webhook_secret"
                                                                   class="form-control" value="<?php echo e($credentials->razorpay_webhook_secret); ?>">
                                                            <span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label class="control-label" ><?php echo app('translator')->get('modules.payments.razorpayStatus'); ?></label>
                                                            <div class="switchery-demo">
                                                                <input type="checkbox" name="razorpay_status" <?php if($credentials->razorpay_status == 'active'): ?> checked <?php endif; ?> class="js-switch " data-color="#00c292" data-secondary-color="#f96262"  />
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>

                                                <!--/row-->

                                            </div>
                                            <div class="form-actions m-t-20">
                                                <button type="submit" id="save-form" class="btn btn-success"><i class="fa fa-check"></i>
                                                    <?php echo app('translator')->get('app.save'); ?>
                                                </button>

                                            </div>
                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>

                                </div>
                                <!-- .row -->

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
        <script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>
        <script>

            $('.js-switch').each(function() {
                new Switchery($(this)[0], $(this).data());
            });

            $('#save-form').click(function () {
                var url = '<?php echo e(route('super-admin.stripe-settings.update', $credentials->id)); ?>';
                $('#method').val('PUT');
                $.easyAjax({
                    url: url,
                    type: "POST",
                    container: '#updateSettings',
                    data: $('#updateSettings').serialize()
                })
            });

        </script>
    <?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/stripe-settings/index.blade.php ENDPATH**/ ?>