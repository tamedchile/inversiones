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
            <li><a href="<?php echo e(route('admin.all-tasks.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
            <li class="active"><?php echo app('translator')->get('app.edit'); ?></li>
        </ol>
    </div>
    <!-- /.breadcrumb -->
</div>
<?php $__env->stopSection(); ?>
 <?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.css')); ?>">

<style>
    .panel-black .panel-heading a,
    .panel-inverse .panel-heading a {
        color: unset!important;
    }
</style>

<?php $__env->stopPush(); ?>
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">

        <div class="panel panel-inverse">
            <div class="panel-heading"> <?php echo app('translator')->get('modules.tasks.updateTask'); ?></div>
            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
                    <?php echo Form::open(['id'=>'updateTask','class'=>'ajax-form','method'=>'PUT']); ?>


                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('app.title'); ?></label>
                                    <input type="text" id="heading" name="heading" class="form-control" value="<?php echo e($task->heading); ?>">
                                </div>
                            </div>
                            <?php if(in_array('projects', $modules)): ?>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.project'); ?></label>
                                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('app.selectProject'); ?>" id="project_id" name="project_id">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option
                                                            <?php if($project->id == $task->project_id): ?> selected <?php endif; ?>
                                                            value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('modules.tasks.taskCategory'); ?> <a
                                                        href="javascript:;" id="createTaskCategory"
                                                        class="btn btn-sm btn-outline btn-success"><i
                                                            class="fa fa-plus"></i> <?php echo app('translator')->get('modules.taskCategory.addTaskCategory'); ?></a>
                                            </label>
                                    <select class="selectpicker form-control" name="category_id" id="category_id" data-style="form-control">
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

                            <!--/span-->
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('app.description'); ?></label>
                                    <textarea id="description" name="description" class="form-control summernote"><?php echo e($task->description); ?></textarea>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">

                                    <div class="checkbox checkbox-info">
                                        <input id="private-task" name="is_private" value="true"
                                        <?php if($task->is_private): ?>
                                            checked
                                        <?php endif; ?>
                                               type="checkbox">
                                        <label for="private-task"><?php echo app('translator')->get('modules.tasks.makePrivate'); ?> <a class="mytooltip font-12" href="javascript:void(0)"> <i class="fa fa-info-circle"></i><span class="tooltip-content5"><span class="tooltip-text3"><span class="tooltip-inner2"><?php echo app('translator')->get('modules.tasks.privateInfo'); ?></span></span></span></a></label>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-12">
                                <div class="form-group">

                                    <div class="checkbox checkbox-info">
                                        <input id="dependent-task" name="dependent" value="yes"
                                               type="checkbox" <?php if($task->dependent_task_id != ''): ?> checked <?php endif; ?>>
                                        <label for="dependent-task"><?php echo app('translator')->get('modules.tasks.dependent'); ?></label>
                                    </div>
                                </div>
                            </div>

                            <div class="row" id="dependent-fields" <?php if($task->dependent_task_id == null): ?> style="display: none" <?php endif; ?>>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.tasks.dependentTask'); ?></label>
                                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('modules.tasks.chooseTask'); ?>" name="dependent_task_id" id="dependent_task_id" >
                                            <option value=""></option>
                                            <?php $__currentLoopData = $allTasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $allTask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($allTask->id); ?>" <?php if($allTask->id == $task->dependent_task_id): ?> selected <?php endif; ?>><?php echo e($allTask->heading); ?> (<?php echo app('translator')->get('app.dueDate'); ?>: <?php echo e($allTask->due_date->format($global->date_format)); ?>)</option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!--/span-->

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('app.startDate'); ?></label>
                                    <input type="text" name="start_date" id="start_date2" class="form-control" autocomplete="off" value="<?php if($task->start_date != '-0001-11-30 00:00:00' && $task->start_date != null): ?> <?php echo e($task->start_date->format($global->date_format)); ?> <?php endif; ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('app.dueDate'); ?></label>
                                    <input type="text" name="due_date" id="due_date2" class="form-control" autocomplete="off" value="<?php if($task->due_date != '-0001-11-30 00:00:00'): ?> <?php echo e($task->due_date->format($global->date_format)); ?> <?php endif; ?>">
                                </div>
                            </div>
                            <!--/span-->
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label class="control-label"><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label>
                                    <select class="select2 select2-multiple " multiple="multiple"
                                            data-placeholder="<?php echo app('translator')->get('modules.tasks.chooseAssignee'); ?>"
                                            name="user_id[]" id="user_id">
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
                            <div class="col-md-3">
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
                                    <label class="control-label"><?php echo app('translator')->get('modules.tasks.priority'); ?></label>

                                    <div class="radio radio-danger">
                                        <input type="radio" name="priority" id="radio13" <?php if($task->priority == 'high'): ?> checked
                                        <?php endif; ?> value="high">
                                        <label for="radio13" class="text-danger">
                                                <?php echo app('translator')->get('modules.tasks.high'); ?> </label>
                                    </div>
                                    <div class="radio radio-warning">
                                        <input type="radio" name="priority" <?php if($task->priority == 'medium'): ?> checked <?php endif; ?>
                                        id="radio14" value="medium">
                                        <label for="radio14" class="text-warning">
                                                <?php echo app('translator')->get('modules.tasks.medium'); ?> </label>
                                    </div>
                                    <div class="radio radio-success">
                                        <input type="radio" name="priority" id="radio15" <?php if($task->priority == 'low'): ?> checked
                                        <?php endif; ?> value="low">
                                        <label for="radio15" class="text-success">
                                                <?php echo app('translator')->get('modules.tasks.low'); ?> </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row m-b-20">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-block btn-outline-info btn-sm col-md-2 select-image-button" style="margin-bottom: 10px;display: none "><i class="fa fa-upload"></i> File Select Or Upload</button>
                                    <div id="file-upload-box" >
                                        <div class="row" id="file-dropzone">
                                            <div class="col-md-12">
                                                <div class="dropzone"
                                                     id="file-upload-dropzone">
                                                    <?php echo e(csrf_field()); ?>

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple/>
                                                    </div>
                                                    <input name="image_url" id="image_url"type="hidden" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="taskID" id="taskID">
                                </div>
                            </div>

                        </div>
                        <!--/row-->

                    </div>
                    <div class="form-actions">
                        <button type="button" id="update-task" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                    </div>
                    <?php echo Form::close(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- .row -->


<div class="modal fade bs-modal-md in" id="taskCategoryModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" id="modal-data-application">
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
                <button type="button" class="btn blue">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->.
</div>

<?php $__env->stopSection(); ?>
 <?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.js')); ?>"></script>


<script>
    Dropzone.autoDiscover = false;
    //Dropzone class
    myDropzone = new Dropzone("div#file-upload-dropzone", {
        url: "<?php echo e(route('admin.task-files.store')); ?>",
        headers: { 'X-CSRF-TOKEN': '<?php echo e(csrf_token()); ?>' },
        paramName: "file",
        maxFilesize: 10,
        maxFiles: 10,
        acceptedFiles: "image/*,application/pdf",
        autoProcessQueue: false,
        uploadMultiple: true,
        addRemoveLinks:true,
        parallelUploads:10,
        init: function () {
            myDropzone = this;
        }
    });

    myDropzone.on('sending', function(file, xhr, formData) {
        console.log(myDropzone.getAddedFiles().length,'sending');
        var ids = '<?php echo e($task->id); ?>';
        formData.append('task_id', ids);
    });

    myDropzone.on('completemultiple', function () {
        var msgs = "<?php echo app('translator')->get('messages.taskUpdatedSuccessfully'); ?>";
        $.showToastr(msgs, 'success');
        window.location.href = '<?php echo e(route('admin.all-tasks.index')); ?>'

    });

    //    update task
    $('#update-task').click(function () {

        var status = '<?php echo e($task->board_column->slug); ?>';
        var currentStatus =  $('#status').val();

        if(status == 'incomplete' && currentStatus == 'completed'){

            $.easyAjax({
                url: '<?php echo e(route('admin.tasks.checkTask', [$task->id])); ?>',
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
            url: '<?php echo e(route('admin.all-tasks.update', [$task->id])); ?>',
            container: '#updateTask',
            type: "POST",
            data: $('#updateTask').serialize(),
            success: function(response){
                if(myDropzone.getQueuedFiles().length > 0){
                    taskID = response.taskID;
                    $('#taskID').val(response.taskID);
                    myDropzone.processQueue();
                }
                else{
                    var msgs = "<?php echo app('translator')->get('messages.taskCreatedSuccessfully'); ?>";
                    $.showToastr(msgs, 'success');
                    window.location.href = '<?php echo e(route('admin.all-tasks.index')); ?>'
                }
            }
        })
    }

    jQuery('#due_date2, #start_date2').datepicker({
        autoclose: true,
        todayHighlight: true,
        weekStart:'<?php echo e($global->week_start); ?>',
        format: '<?php echo e($global->date_picker_format); ?>',
    });

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
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

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('file-id');
        var deleteView = $(this).data('pk');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('admin.task-files.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE', 'view': deleteView},
                    success: function (response) {
                        console.log(response);
                        if (response.status == "success") {
                            $.unblockUI();
                            $('#list ul.list-group').html(response.html);

                        }
                    }
                });
            }
        });
    });

    $('#project_id').change(function () {
        var id = $(this).val();

        // For getting dependent task
        var dependentTaskUrl = '<?php echo e(route('admin.all-tasks.dependent-tasks', [':id', ':taskId'])); ?>';
        dependentTaskUrl = dependentTaskUrl.replace(':id', id);
        dependentTaskUrl = dependentTaskUrl.replace(':taskId', '<?php echo e($task->id); ?>');
        $.easyAjax({
            url: dependentTaskUrl,
            type: "GET",
            success: function (data) {
                $('#dependent_task_id').html(data.html);
            }
        })
    });

</script>
<script>
    $('#createTaskCategory').click(function(){
        var url = '<?php echo e(route('admin.taskCategory.create-cat')); ?>';
        $('#modelHeading').html("<?php echo app('translator')->get('modules.taskCategory.manageTaskCategory'); ?>");
        $.ajaxModal('#taskCategoryModal', url);
    })

</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/tasks/edit.blade.php ENDPATH**/ ?>