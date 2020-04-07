<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
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
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.menu.attendanceSettings'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                            <div class="row">
                                <div class="form-body ">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <label><?php echo app('translator')->get('modules.attendance.officeStartTime'); ?></label>
                                                <input type="text" name="office_start_time" id="office_start_time"
                                                       class="form-control"
                                                       value="<?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $attendanceSetting->office_start_time)->format($global->time_format)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <label><?php echo app('translator')->get('modules.attendance.officeEndTime'); ?></label>
                                                <input type="text" name="office_end_time" id="office_end_time"
                                                       class="form-control"
                                                       value="<?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $attendanceSetting->office_end_time)->format($global->time_format)); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <div class="input-group bootstrap-timepicker timepicker">
                                                <label><?php echo app('translator')->get('modules.attendance.halfDayMarkTime'); ?></label>
                                                <input type="text" name="halfday_mark_time" id="halfday_mark_time"
                                                       class="form-control"
                                                       value="<?php if($attendanceSetting->halfday_mark_time): ?><?php echo e(\Carbon\Carbon::createFromFormat('H:i:s', $attendanceSetting->halfday_mark_time)->format($global->time_format)); ?><?php else: ?> 01:00 <?php endif; ?>">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label for="late_mark_duration"><?php echo app('translator')->get('modules.attendance.lateMark'); ?></label>
                                            <input type="number" class="form-control" id="late_mark_duration"
                                                   name="late_mark_duration"
                                                   value="<?php echo e($attendanceSetting->late_mark_duration); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="late_mark_duration"><?php echo app('translator')->get('modules.attendance.checkininday'); ?></label>
                                            <input type="number" class="form-control" id="clockin_in_day"
                                                   name="clockin_in_day"
                                                   value="<?php echo e($attendanceSetting->clockin_in_day); ?>">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-info  col-md-10">
                                                <input id="employee_clock_in_out" name="employee_clock_in_out" value="yes"
                                                       <?php if($attendanceSetting->employee_clock_in_out == "yes"): ?> checked
                                                       <?php endif; ?>
                                                       type="checkbox">
                                                <label for="employee_clock_in_out"><?php echo app('translator')->get('modules.attendance.allowSelfClock'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-info  col-md-10">
                                                <input id="radius_check" name="radius_check" value="yes"
                                                       <?php if($attendanceSetting->radius_check == "yes"): ?> checked
                                                       <?php endif; ?>
                                                       type="checkbox">
                                                <label for="radius_check"><?php echo app('translator')->get('modules.attendance.checkForRadius'); ?></label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12 <?php if($attendanceSetting->radius_check == "no"): ?> hidden <?php endif; ?>" id="radiusBox">
                                        <div class="form-group">
                                            <label for="late_mark_duration"><?php echo app('translator')->get('modules.attendance.radius'); ?></label>
                                            <input type="number" class="form-control" id="radius"
                                                   name="radius"
                                                   value="<?php echo e($attendanceSetting->radius); ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="checkbox checkbox-info  col-md-10">
                                                <input id="ip_check" name="ip_check" value="yes"
                                                       <?php if($attendanceSetting->ip_check == "yes"): ?> checked
                                                        <?php endif; ?>
                                                    type="checkbox">
                                                <label for="ip_check"><?php echo app('translator')->get('modules.attendance.checkForIp'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12 <?php if($attendanceSetting->ip_check == "no"): ?> hidden <?php endif; ?>" id="ipBox">
                                        <div id="addMoreBox1" class="clearfix">
                                            <?php $__empty_1 = true; $__currentLoopData = $ipAddresses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $ipAddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                            <div class="col-md-5" style="margin-left: 5px;">
                                                <div class="form-group" id="occasionBox">
                                                    <input class="form-control"  type="text" value="<?php echo e($ipAddress); ?>" name="ip[<?php echo e($index); ?>]" placeholder="<?php echo app('translator')->get('modules.attendance.ipAddress'); ?>"/>
                                                    <div id="errorOccasion"></div>
                                                </div>
                                            </div>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                            <div class="col-md-5" style="margin-left: 5px;">
                                                <div class="form-group" id="occasionBox">
                                                    <input class="form-control"  type="text" name="ip[0]" placeholder="<?php echo app('translator')->get('modules.attendance.ipAddress'); ?>"/>
                                                    <div id="errorOccasion"></div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
                                            <div class="col-md-1">
                                                
                                            </div>
                                        </div>
                                        <div id="insertBefore"></div>
                                        <div class="clearfix">

                                        </div>
                                        <button type="button" id="plusButton" class="btn btn-sm btn-info" style="margin-bottom: 20px;margin-left: 13px">
                                            Add More <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="col-xs-12">
                                        <hr>
                                        <label class="control-label col-md-12 p-l-0"><?php echo app('translator')->get('modules.attendance.officeOpenDays'); ?></label>
                                        <div class="form-group">
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_mon" name="office_open_days[]" value="1"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                           <?php if($day == 1): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_mon"><?php echo app('translator')->get('app.monday'); ?></label>
                                            </div>
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_tues" name="office_open_days[]" value="2"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($day == 2): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_tues"><?php echo app('translator')->get('app.tuesday'); ?></label>
                                            </div>
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_wed" name="office_open_days[]" value="3"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($day == 3): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_wed"><?php echo app('translator')->get('app.wednesday'); ?></label>
                                            </div>
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_thurs" name="office_open_days[]" value="4"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($day == 4): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_thurs"><?php echo app('translator')->get('app.thursday'); ?></label>
                                            </div>
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_fri" name="office_open_days[]" value="5"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($day == 5): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_fri"><?php echo app('translator')->get('app.friday'); ?></label>
                                            </div>
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_sat" name="office_open_days[]" value="6"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($day == 6): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_sat"><?php echo app('translator')->get('app.saturday'); ?></label>
                                            </div>
                                            <div class="checkbox checkbox-inline checkbox-info  col-md-2 m-b-10">
                                                <input id="open_sun" name="office_open_days[]" value="0"
                                                       <?php $__currentLoopData = $openDays; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $day): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                       <?php if($day == 0): ?> checked <?php endif; ?>
                                                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                       type="checkbox">
                                                <label for="open_sun"><?php echo app('translator')->get('app.sunday'); ?></label>
                                            </div>
                                        </div>
                                    </div>

                                <div class="col-md-12">
                                    <div class="form-actions m-t-15">
                                        <button type="submit" id="save-form"
                                                class="btn btn-success waves-effect waves-light m-r-10">
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>

                                    </div>

                                </div>

                                </div>



                            </div>
                            <?php echo Form::close(); ?>


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
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.js')); ?>"></script>


<script>
    var $insertBefore = $('#insertBefore');
    var $i = <?php echo e(count($ipAddresses)); ?>;
    $('#office_end_time, #office_start_time, #halfday_mark_time').timepicker({
        <?php if($global->time_format == 'H:i'): ?>
        showMeridian: false
        <?php endif; ?>
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.attendance-settings.update', ['1'])); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            data: $('#editSettings').serialize()
        })
    });

    $('#radius_check').click(function(){
        if($(this).prop("checked") == true){
            $('#radiusBox').attr("style", "display: block !important");
        }
        else if($(this).prop("checked") == false){
            $('#radiusBox').attr("style", "display: none !important");
        }
    });
    $('#ip_check').click(function(){
        if($(this).prop("checked") == true){
            $('#ipBox').attr("style", "display: block !important");
        }
        else if($(this).prop("checked") == false){
            $('#ipBox').attr("style", "display: none !important");
        }
    });
    // Add More Inputs
    $('#plusButton').click(function(){

        $i = $i+1;
        var indexs = $i+1;
        $(' <div id="addMoreBox'+indexs+'" class="clearfix"> ' +
            '<div class="col-md-5 "style="margin-left:5px;"><div class="form-group"><input class="form-control " name="ip['+$i+']" type="text" value="" placeholder="<?php echo app('translator')->get('modules.attendance.ipAddress'); ?>"/></div></div>' +
            '<div class="col-md-1"><button type="button" onclick="removeBox('+indexs+')" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></div>' +
            '</div>').insertBefore($insertBefore);

    });
    // Remove fields
    function removeBox(index){
        $('#addMoreBox'+index).remove();
    }

</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/attendance-settings/index.blade.php ENDPATH**/ ?>