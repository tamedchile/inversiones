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

                
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">

                                <div class="alert alert-info ">
                                    <i class="fa fa-info-circle"></i> <?php echo app('translator')->get('messages.taskSettingNote'); ?>
                                </div>
                                <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'POST']); ?>


                                <div class="form-group">
                                    <div class="checkbox checkbox-info  col-md-10">
                                        <input id="self_task" name="self_task" value="yes"
                                                <?php if($global->task_self == "yes"): ?> checked
                                                <?php endif; ?>
                                                type="checkbox">
                                        <label for="self_task"><?php echo app('translator')->get('messages.employeeSelfTask'); ?></label>
                                    </div>
                                </div>

                                
                                    
                                        
                                    
                                
                                <?php echo Form::close(); ?>


                            </div>
                        </div>
                    </div>
                    <!-- /.row -->

                            
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>

<script>
    // change task Setting For Setting
    $('input[name=self_task]').click(function () {
        var self_task = $('input[name=self_task]:checked').val();

        $.easyAjax({
            url: '<?php echo e(route('admin.task-settings.store')); ?>',
            type: "POST",
            data: {'_token': '<?php echo e(csrf_token()); ?>', 'self_task': self_task}
        })
    });

</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/task-settings/edit.blade.php ENDPATH**/ ?>