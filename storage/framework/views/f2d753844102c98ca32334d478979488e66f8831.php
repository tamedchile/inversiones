<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">

<div class="panel panel-default">
    <div class="panel-heading "><i class="ti-search"></i> <?php echo app('translator')->get('modules.tasks.taskDetail'); ?>
        <div class="panel-action">
            <a href="javascript:;" id="hide-edit-task-panel" class="close " data-dismiss="modal"><i class="ti-close"></i></a>
        </div>
    </div>

    <?php if(!is_null($task->project) && $task->project->isProjectAdmin || $user->can('edit_projects')): ?>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <?php echo Form::open(['id'=>'updateTask','class'=>'ajax-form','method'=>'PUT']); ?>

                <?php echo Form::hidden('project_id', $task->project_id); ?>


                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.title'); ?></label>
                                <input type="text" id="heading" name="heading" class="form-control" value="<?php echo e($task->heading); ?>">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.description'); ?></label>
                                <textarea id="description" name="description" class="form-control summernote"><?php echo $task->description; ?></textarea>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.startDate'); ?></label>
                                <input type="text" name="start_date" autocomplete="off" id="start_date2" class="form-control" value="<?php if($task->start_date != '-0001-11-30 00:00:00' && $task->start_date != null): ?> <?php echo e($task->start_date->format($global->date_format)); ?> <?php endif; ?>">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.dueDate'); ?></label>
                                <input type="text" name="due_date" autocomplete="off" id="due_date2" class="form-control" value="<?php if($task->due_date != '-0001-11-30 00:00:00'): ?> <?php echo e($task->due_date->format($global->date_format)); ?> <?php endif; ?>">
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label>
                                <select class="select2 select2-multiple " multiple="multiple" data-placeholder="<?php echo app('translator')->get('modules.tasks.chooseAssignee'); ?>"  name="user_id[]" id="user_id2">
                                    <?php if(is_null($task->project_id)): ?>
                                        <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                            <?php
                                                $selected = '';
                                            ?>

                                            <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->id == $employee->id): ?>
                                                    <?php
                                                        $selected = 'selected';
                                                    ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <option <?php echo e($selected); ?>

                                                    value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?>

                                            </option>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php else: ?>
                                        <?php $__currentLoopData = $task->project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php
                                                $selected = '';
                                            ?>

                                            <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if($item->id == $member->user->id): ?>
                                                    <?php
                                                        $selected = 'selected';
                                                    ?>
                                                <?php endif; ?>

                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                            <option <?php echo e($selected); ?>

                                                value="<?php echo e($member->user->id); ?>"><?php echo e($member->user->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.tasks.taskCategory'); ?> </label>
                                <select class=" form-control" name="category_id" id="category_id"
                                        data-style="form-control">
                                    <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <option value="<?php echo e($category->id); ?>"
                                                <?php if($task->task_category_id == $category->id): ?>
                                                selected
                                                <?php endif; ?>
                                        ><?php echo e(ucwords($category->category_name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                        <option value=""><?php echo app('translator')->get('messages.noTaskCategoryAdded'); ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.tasks.priority'); ?></label>

                                <div class="radio radio-danger">
                                    <input type="radio" name="priority" id="radio13"
                                           <?php if($task->priority == 'high'): ?> checked <?php endif; ?>
                                           value="high">
                                    <label for="radio13" class="text-danger">
                                        <?php echo app('translator')->get('modules.tasks.high'); ?> </label>
                                </div>
                                <div class="radio radio-warning">
                                    <input type="radio" name="priority"
                                           <?php if($task->priority == 'medium'): ?> checked <?php endif; ?>
                                           id="radio14" value="medium">
                                    <label for="radio14" class="text-warning">
                                        <?php echo app('translator')->get('modules.tasks.medium'); ?> </label>
                                </div>
                                <div class="radio radio-success">
                                    <input type="radio" name="priority" id="radio15"
                                           <?php if($task->priority == 'low'): ?> checked <?php endif; ?>
                                           value="low">
                                    <label for="radio15" class="text-success">
                                        <?php echo app('translator')->get('modules.tasks.low'); ?> </label>
                                </div>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.status'); ?></label>
                                <select name="status" id="status" class="form-control">
                                    <?php $__currentLoopData = $taskBoardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskBoardColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($task->board_column_id == $taskBoardColumn->id): ?> selected <?php endif; ?> value="<?php echo e($taskBoardColumn->id); ?>"><?php echo e($taskBoardColumn->column_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->

                </div>
                <div class="form-actions">
                    <button type="button" id="update-task" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                </div>
                <?php echo Form::close(); ?>

            </div>
        </div>

    <?php else: ?>
        <div class="panel-wrapper collapse in">
            <div class="panel-body">
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.title'); ?></label>
                                <p>  <?php echo e(ucfirst($task->heading)); ?> </p>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.description'); ?></label>
                                <p>  <?php echo ucfirst($task->description); ?> </p>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('app.dueDate'); ?></label>
                                <p>  <?php echo e($task->due_date->format('d-M-Y')); ?> </p>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label>
                                <p>
                                    <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <img src="<?php echo e($item->image_url); ?>" data-toggle="tooltip"
                                            data-original-title="<?php echo e(ucwords($item->name)); ?>" data-placement="right"
                                            class="img-circle" width="25" height="25" alt="">
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                            </div>
                        </div>
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label class="control-label"><?php echo app('translator')->get('modules.tasks.priority'); ?></label>
                                    <div  class="clearfix"></div>
                                    <label for="radio13" class="text-<?php if($task->priority == 'high'): ?>danger <?php elseif($task->priority == 'medium'): ?>warning <?php else: ?> success <?php endif; ?> ">
                                        <?php if($task->priority == 'high'): ?> <?php echo app('translator')->get('modules.tasks.high'); ?> <?php elseif($task->priority == 'medium'): ?> <?php echo app('translator')->get('modules.tasks.medium'); ?> <?php else: ?> <?php echo app('translator')->get('modules.tasks.low'); ?> <?php endif; ?></label>

                            </div>
                        </div>

                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.status'); ?></label>
                                <select name="status" id="status" class="form-control">
                                    <?php $__currentLoopData = $taskBoardColumns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $taskBoardColumn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option <?php if($task->board_column_id == $taskBoardColumn->id): ?> selected <?php endif; ?> value="<?php echo e($taskBoardColumn->id); ?>"><?php echo e($taskBoardColumn->column_name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <!--/span-->
                        <!--/span-->
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><?php echo app('translator')->get('app.status'); ?></label>
                                <div  class="clearfix"></div>
                                    <label for="radio13"  style="color: <?php echo e($task->board_column->label_color); ?>;"> <?php echo e($task->board_column->column_name); ?></label>

                            </div>
                        </div>
                        <!--/span-->
                    </div>
                    <!--/row-->

                </div>
                <div class="form-actions">
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>

<script>
    $('#hide-edit-task-panel').click(function () {
        newTaskpanel.addClass('hide').removeClass('show');
        taskListPanel.switchClass("col-md-6", "col-md-12", 1000, "easeInOutQuad");
    });
</script>
<script>
     $("#dependent_task_id_project, #user_id2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });
    
    //    update task
    $('#update-task').click(function () {

        var status = '<?php echo e($task->board_column->slug); ?>';
        var currentStatus =  $('#status').val();

        if(status == 'incomplete' && currentStatus == 'completed'){

            $.easyAjax({
                url: '<?php echo e(route('member.tasks.checkTask', [$task->id])); ?>',
                type: "GET",
                data: {},
                success: function (data) {
                    console.log(data.taskCount);
                    if(data.taskCount > 0){
                        swal({
                            title: "Are you sure?",
                            text: "There is a incomplete sub-task in this task do you want to mark complete!",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#DD6B55",
                            confirmButtonText: "Yes, complete it!",
                            cancelButtonText: "No, cancel please!",
                            closeOnConfirm: true,
                            closeOnCancel: true
                        }, function (isConfirm) {
                            if (isConfirm) {
                                updateTask();
                            }
                        });
                    }
                    else{
                        updateTask();
                    }

                }
            });
        }
        else{
            updateTask();
        }

    });

    function updateTask(){
        $.easyAjax({
            url: '<?php echo e(route('member.tasks.update', [$task->id])); ?>',
            container: '#updateTask',
            type: "POST",
            data: $('#updateTask').serialize(),
            success: function (data) {
                $('#task-list-panel ul.list-group').html(data.html);
                $('#edit-task-panel').switchClass("show", "hide", 300, "easeInOutQuad");
                showTable();
            }
        })
    }

    jQuery('#due_date2 , #start_date2').datepicker({
        autoclose: true,
        todayHighlight: true,
        weekStart:'<?php echo e($global->week_start); ?>',
        format: '<?php echo e($global->date_picker_format); ?>',
    });
    $('.summernote').summernote({
        height: 200,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough']],
            ['fontsize', ['fontsize']],
            ['para', ['ul', 'ol', 'paragraph']],
            ["view", ["fullscreen"]]
        ]
    });


</script>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/tasks/edit.blade.php ENDPATH**/ ?>