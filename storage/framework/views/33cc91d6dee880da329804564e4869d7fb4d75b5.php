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

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.menu.messageSettings'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php echo Form::open(['id'=>'updateProfile','class'=>'ajax-form','method'=>'PUT']); ?>

                                    <div class="form-body">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="checkbox checkbox-info  col-md-10">
                                                        <input id="allow-client-admin" name="allow_client_admin" value="yes"
                                                               <?php if($messageSettings->allow_client_admin == 'yes'): ?> checked <?php endif; ?>
                                                               type="checkbox">
                                                        <label for="allow-client-admin"><?php echo app('translator')->get('modules.messages.allowClientAdminChat'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <div class="checkbox checkbox-info  col-md-10">
                                                        <input id="allow-client-employee" name="allow_client_employee" value="yes"
                                                               <?php if($messageSettings->allow_client_employee == 'yes'): ?> checked <?php endif; ?>
                                                               type="checkbox">
                                                        <label for="allow-client-employee"><?php echo app('translator')->get('modules.messages.allowClientEmployeeChat'); ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--/span-->

                                        </div>
                                        <!--/row-->
                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" id="save-form-2" class="btn btn-success"><i
                                                    class="fa fa-check"></i>
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>

                                    </div>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>    <!-- .row -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    $('#save-form-2').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.message-settings.update', [1])); ?>',
            container: '#updateProfile',
            type: "POST",
            data: $('#updateProfile').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/message-settings/index.blade.php ENDPATH**/ ?>