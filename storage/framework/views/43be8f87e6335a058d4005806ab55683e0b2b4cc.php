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
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.slackSettings.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.notification_settings_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-6">

                                    <h3 class="box-title m-b-0"><?php echo app('translator')->get("modules.slackSettings.notificationTitle"); ?></h3>

                                    <p class="text-muted m-b-10 font-13">
                                        <?php echo app('translator')->get("modules.slackSettings.notificationSubtitle"); ?>
                                    </p>

                                    <div class="row">
                                        <div class="col-sm-12 col-xs-12 b-t p-t-20">
                                            <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form form-horizontal','method'=>'PUT']); ?>


                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.userRegistration"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[4]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[4]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.employeeAssign"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[5]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[5]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.newNotice"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[6]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[6]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.taskAssign"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[7]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[7]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.expenseAdded"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[0]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[0]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.expenseMember"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[1]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[1]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.expenseStatus"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[2]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[2]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.ticketRequest"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[3]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[3]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.leaveRequest"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[8]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[8]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.taskComplete"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[9]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[9]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label class="control-label col-sm-8"><?php echo app('translator')->get("modules.emailSettings.invoiceNotification"); ?></label>

                                                <div class="col-sm-4">
                                                    <div class="switchery-demo">
                                                        <input type="checkbox"
                                                               <?php if($emailSettings[10]->send_slack == 'yes'): ?> checked
                                                               <?php endif; ?> class="js-switch change-email-setting"
                                                               data-color="#99d683"
                                                               data-setting-id="<?php echo e($emailSettings[10]->id); ?>"/>
                                                    </div>
                                                </div>
                                            </div>


                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <?php echo Form::open(['id'=>'editSlackSettings','class'=>'ajax-form','method'=>'PUT']); ?>


                                    <div class="form-body">
                                        <div class="form-group">
                                            <label for="company_name"><?php echo app('translator')->get('modules.slackSettings.slackWebhook'); ?></label>
                                            <input type="text" class="form-control" id="slack_webhook"
                                                   name="slack_webhook" value="<?php echo e($slackSettings->slack_webhook); ?>">
                                        </div>


                                        <div class="form-group">
                                            <label for="exampleInputPassword1" class="d-block"><?php echo app('translator')->get('modules.slackSettings.slackNotificationLogo'); ?></label>

                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 200px; height: 150px;">
                                                    <?php if(is_null($slackSettings->slack_logo)): ?>
                                                        <img src="https://via.placeholder.com/200x150.png?text=<?php echo e(str_replace(' ', '+', __('modules.slackSettings.uploadSlackLog'))); ?>"
                                                             alt=""/>
                                                    <?php else: ?>
                                                        <img src="<?php echo e($slackSettings->slack_logo_url); ?>"
                                                             alt=""/>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 200px; max-height: 150px;"></div>
                                                <div>
                                                        <span class="btn btn-info btn-file">
                                                            <span class="fileinput-new"> <?php echo app('translator')->get('app.selectImage'); ?> </span>
                                                            <span class="fileinput-exists"> <?php echo app('translator')->get('app.change'); ?> </span>
                                                            <input type="file" name="slack_logo" id="slack_logo">
                                                        </span>
                                                    <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                       data-dismiss="fileinput"> <?php echo app('translator')->get('app.remove'); ?> </a>
                                                </div>
                                            </div>

                                            <?php if(!is_null($slackSettings->slack_logo)): ?>
                                            <div class="form-group">
                                                <label for="removeImage"><?php echo app('translator')->get("modules.emailSettings.removeImage"); ?></label>
                                                <div class="switchery-demo">
                                                    <input type="checkbox" name="removeImage" id="removeImageButton" class="js-switch removeImage"
                                                           data-color="#99d683" />
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>


                                    <div class="form-actions m-t-20">
                                        <button type="submit" id="save-form"
                                                class="btn btn-success waves-effect waves-light m-r-10">
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>
                                        <button type="button" id="send-test-notification"
                                                class="btn btn-primary waves-effect waves-light"><?php echo app('translator')->get('modules.slackSettings.sendTestNotification'); ?></button>

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
<script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>

<script>

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.slack-settings.update', ['1'])); ?>',
            container: '#editSlackSettings',
            type: "POST",
            redirect: true,
            file: true
        })
    });
    $('#removeImageButton').change(function () {
        var removeButton;
        if ($(this).is(':checked'))
             removeButton = 'yes';
        else
             removeButton = 'no';

        var img;
        if(removeButton == 'yes'){
            img = '<img src="https://via.placeholder.com/200x150.png?text=<?php echo e(str_replace(' ', '+', __('modules.slackSettings.uploadSlackLog'))); ?>" alt=""/>';
        }
        else{
            img = '<img src="<?php echo e(asset_url('slack-logo/'.$slackSettings->slack_logo)); ?>" alt=""/>'
        }
        $('.thumbnail').html(img);

    });
</script>
<script>

    // Switchery
    var elems = Array.prototype.slice.call(document.querySelectorAll('.js-switch'));
    $('.js-switch').each(function () {
        new Switchery($(this)[0], $(this).data());

    });

    $('.change-email-setting').change(function () {
        var id = $(this).data('setting-id');

        if ($(this).is(':checked'))
            var sendSlack = 'yes';
        else
            var sendSlack = 'no';

        var url = '<?php echo e(route('admin.slack-settings.updateSlackNotification', ':id')); ?>';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "POST",
            data: {'id': id, 'send_slack': sendSlack, '_method': 'POST', '_token': '<?php echo e(csrf_token()); ?>'}
        })
    });

    $('#send-test-notification').click(function () {

        var url = '<?php echo e(route('admin.slack-settings.sendTestNotification')); ?>';

        $.easyAjax({
            url: url,
            type: "GET",
            success: function (response) {

            }
        })
    });



</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/slack-settings/index.blade.php ENDPATH**/ ?>