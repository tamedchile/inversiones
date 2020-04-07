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
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>


    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo e(__($pageTitle)); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">

                                        <div class="alert alert-info ">
                                            <i class="fa fa-info-circle"></i> <?php echo app('translator')->get('messages.logTimeNote'); ?>
                                        </div>
                                        <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'POST']); ?>

                                        <div class="form-group">
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="log_time_for" <?php if($logTime->log_time_for == 'project'): ?> checked <?php endif; ?> id="for_project" value="project">
                                                        <label for="for_project"><?php echo app('translator')->get('modules.logTimeSetting.project'); ?></label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="log_time_for" id="for_task" <?php if($logTime->log_time_for == 'task'): ?> checked <?php endif; ?> value="task">
                                                        <label for="for_task"><?php echo app('translator')->get('modules.logTimeSetting.task'); ?></label>
                                                    </div>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="checkbox checkbox-info  col-md-10">
                                                <input id="auto_timer_stop" name="auto_timer_stop" value="yes"
                                                       <?php if($logTime->auto_timer_stop == "yes"): ?> checked
                                                       <?php endif; ?>
                                                       type="checkbox">
                                                <label for="auto_timer_stop"><?php echo app('translator')->get('modules.logTimeSetting.autoStopTimerAfterOfficeTime'); ?></label>
                                            </div>
                                        </div>

                                        
                                            
                                                
                                            
                                        
                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                            </div>
                            <!-- /.row -->

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

<script>

    // change Log Time For Setting
    $('input[name=log_time_for]').click(function () {
        var timeFor = $('input[name=log_time_for]:checked').val();

        $.easyAjax({
            url: '<?php echo e(route('admin.log-time-settings.store')); ?>',
            type: "POST",
            data: {'_token': '<?php echo e(csrf_token()); ?>', 'log_time_for': timeFor}
        })
    });

    $('#auto_timer_stop').click(function(){
        var auto_timer_stop = 'no';
        if($(this).prop("checked") == true){
             auto_timer_stop = 'yes';
        }
        $.easyAjax({
            url: '<?php echo e(route('admin.log-time-settings.store')); ?>',
            type: "POST",
            data: {'_token': '<?php echo e(csrf_token()); ?>', 'auto_timer_stop': auto_timer_stop}
        })
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/log-time-settings/edit.blade.php ENDPATH**/ ?>