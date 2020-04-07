<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">

<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><i class="ti-plus"></i> <?php echo app('translator')->get('modules.tasks.newTask'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">

        <?php echo Form::open(['id'=>'storeTask','class'=>'ajax-form','method'=>'POST']); ?>


        <div class="form-body">
            <div class="row">

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get('app.project'); ?></label>
                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get("app.selectProject"); ?>" id="task_project_id" name="task_project_id">
                            <option value=""></option>
                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($project->id); ?>" <?php if(isset($projectId) && $projectId == $project->id): ?> selected <?php endif; ?>><?php echo e(ucwords($project->project_name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get('app.title'); ?></label>
                        <input type="text" id="heading" name="heading" class="form-control" >
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get('app.description'); ?></label>
                        <textarea id="description" name="description" class="form-control"></textarea>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">

                        <div class="checkbox checkbox-info">
                            <input id="dependent-task" name="dependent" value="yes"
                                   type="checkbox">
                            <label for="dependent-task"><?php echo app('translator')->get('modules.tasks.dependent'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="row" id="dependent-fields" style="display: none">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('modules.tasks.dependentTask'); ?></label>
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('modules.tasks.chooseTask'); ?>" name="dependent_task_id" id="dependent_task_id" >
                                <option value=""></option>
                                <?php $__currentLoopData = $allTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allTask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($allTask->id); ?>"><?php echo e($allTask->heading); ?> (<?php echo app('translator')->get('app.dueDate'); ?>: <?php echo e($allTask->due_date->format($global->date_format)); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get('app.startDate'); ?></label>
                        <input type="text" name="start_date" id="start_date2" class="form-control" autocomplete="off">
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get('app.dueDate'); ?></label>
                        <input type="text" name="due_date" autocomplete="off" id="due_date2" class="form-control">
                    </div>
                </div>
                <!--/span-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label required"><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label>
                        <select class="select2 select2-multiple" multiple="multiple" data-placeholder="<?php echo app('translator')->get('modules.tasks.chooseAssignee'); ?>" name="user_id[]" id="task_user_id" >
                            <option value=""></option>
                            <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">

                        <div class="checkbox checkbox-info">
                            <input id="repeat-task" name="repeat" value="yes"
                                   type="checkbox">
                            <label for="repeat-task"><?php echo app('translator')->get('modules.events.repeat'); ?></label>
                        </div>
                    </div>
                </div>

                <div class="row" id="repeat-fields" style="display: none">
                    <div class="col-xs-12 col-md-12">
                        <div class="col-xs-6 col-md-3 ">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('modules.events.repeatEvery'); ?></label>
                                <input type="number" min="1" value="1" name="repeat_count" class="form-control">
                            </div>
                        </div>
                        <div class="col-xs-6 col-md-3">
                            <div class="form-group">
                                <label>&nbsp;</label>
                                <select name="repeat_type" id="" class="form-control">
                                    <option value="day"><?php echo app('translator')->get('app.day'); ?></option>
                                    <option value="week"><?php echo app('translator')->get('app.week'); ?></option>
                                    <option value="month"><?php echo app('translator')->get('app.month'); ?></option>
                                    <option value="year"><?php echo app('translator')->get('app.year'); ?></option>
                                </select>
                            </div>
                        </div>

                        <div class="col-xs-6 col-md-3">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('modules.events.cycles'); ?> <a class="mytooltip" href="javascript:void(0)"> <i class="fa fa-info-circle"></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2"><?php echo app('translator')->get('modules.tasks.cyclesToolTip'); ?></span></span></span></a></label>
                                <input type="number" name="repeat_cycles" id="repeat_cycles" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <!--/span-->
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get('modules.tasks.priority'); ?></label>

                        <div class="radio radio-danger">
                            <input type="radio" name="priority" id="radio13"
                                   value="high">
                            <label for="radio13" class="text-danger">
                                <?php echo app('translator')->get('modules.tasks.high'); ?> </label>
                        </div>
                        <div class="radio radio-warning">
                            <input type="radio" name="priority"
                                   id="radio14" checked value="medium">
                            <label for="radio14" class="text-warning">
                                <?php echo app('translator')->get('modules.tasks.medium'); ?> </label>
                        </div>
                        <div class="radio radio-success">
                            <input type="radio" name="priority" id="radio15"
                                   value="low">
                            <label for="radio15" class="text-success">
                                <?php echo app('translator')->get('modules.tasks.low'); ?> </label>
                        </div>
                    </div>
                </div>
                <!--/span-->

            </div>
            <!--/row-->

        </div>
        <div class="form-actions">
            <button type="button" id="store-task" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>

        <?php if(isset($columnId)): ?>
            <?php echo Form::hidden('board_column_id', $columnId); ?>

        <?php endif; ?>

        <?php if(isset($pageName)): ?>
            <?php echo Form::hidden('page_name', $pageName); ?>

        <?php endif; ?>

        <?php if(isset($parentGanttId)): ?>
            <?php echo Form::hidden('parent_gantt_id', $parentGanttId); ?>

        <?php endif; ?>

        <?php echo Form::close(); ?>

    </div>
</div>

<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script>
    //    update task
    $('#store-task').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.all-tasks.store')); ?>',
            container: '#storeTask',
            type: "POST",
            data: $('#storeTask').serialize(),
            success: function (response) {
                if(response.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });

    jQuery('#due_date2, #start_date2').datepicker({
        autoclose: true,
        todayHighlight: true,
        weekStart:'<?php echo e($global->week_start); ?>',
        format: '<?php echo e($global->date_picker_format); ?>',
    });

    $("#task_project_id").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $("#dependent_task_id").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $("#task_user_id").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('#task_project_id').change(function () {
        var id = $(this).val();
        var url = '<?php echo e(route('member.all-tasks.members', ':id')); ?>';
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            type: "GET",
            redirect: true,
            success: function (data) {
                $('#task_user_id').html(data.html);
            }
        })

        // For getting dependent task
        var dependentTaskUrl = '<?php echo e(route('member.all-tasks.dependent-tasks', ':id')); ?>';
        dependentTaskUrl = dependentTaskUrl.replace(':id', id);
        $.easyAjax({
            url: dependentTaskUrl,
            type: "GET",
            success: function (data) {
                $('#dependent_task_id').html(data.html);
            }
        })
    });

    $('#repeat-task').change(function () {
        if($(this).is(':checked')){
            $('#repeat-fields').show();
        }
        else{
            $('#repeat-fields').hide();
        }
    })

    $('#dependent-task').change(function () {
        if($(this).is(':checked')){
            $('#dependent-fields').show();
        }
        else{
            $('#dependent-fields').hide();
        }
    })
</script>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/all-tasks/ajax_create.blade.php ENDPATH**/ ?>