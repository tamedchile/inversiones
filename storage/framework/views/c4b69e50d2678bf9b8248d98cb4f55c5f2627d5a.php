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
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('member.all-tasks.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
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

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->get('modules.tasks.newTask'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'storeTask','class'=>'ajax-form','method'=>'POST']); ?>


                        <?php if(!$user->can('add_tasks')): ?>
                            <input type="hidden" name="user_id" value="<?php echo e($user->id); ?>" />
                        <?php endif; ?>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.project'); ?></label>
                                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get("app.selectProject"); ?>" id="project_id" name="project_id">
                                            <option value=""></option>
                                            <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.tasks.taskCategory'); ?>
                                        </label>
                                        <select class="selectpicker form-control" name="category_id" id="category_id"
                                                data-style="form-control">
                                            <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                <option value="<?php echo e($category->id); ?>"><?php echo e(ucwords($category->category_name)); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                <option value=""><?php echo app('translator')->get('messages.noTaskCategoryAdded'); ?></option>
                                            <?php endif; ?>
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
                                        <textarea id="description" name="description" class="form-control summernote"></textarea>
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.startDate'); ?></label>
                                        <input type="text" name="start_date" id="start_date2" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('app.dueDate'); ?></label>
                                        <input type="text" name="due_date" id="due_date2" autocomplete="off" class="form-control">
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

                                <?php if($user->can('add_tasks')): ?>
                                    <!--/span-->
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="control-label required"><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label>
                                       
                                            <select class="select2 select2-multiple " multiple="multiple" data-placeholder="<?php echo app('translator')->get('modules.tasks.chooseAssignee'); ?>"  name="user_id[]" id="user_id">
                                                <option value=""></option>
                                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                    <!--/span-->
                                <?php endif; ?>

                                <?php if($user->hasRole('admin')): ?>
                                    <input type="hidden" value="<?php echo e($user->id); ?>" name="user_id[]">
                                <?php endif; ?>
                                
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
                            <button type="button" id="store-task" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

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
        url: "<?php echo e(route('member.task-files.store')); ?>",
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
        var ids = $('#taskID').val();
        formData.append('task_id', ids);
    });

    myDropzone.on('completemultiple', function () {
        var msgs = "<?php echo app('translator')->get('messages.taskCreatedSuccessfully'); ?>";
        $.showToastr(msgs, 'success');
        window.location.href = '<?php echo e(route('member.all-tasks.index')); ?>'

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

    //    update task
    $('#store-task').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.all-tasks.store')); ?>',
            container: '#storeTask',
            type: "POST",
            data: $('#storeTask').serialize(),
            success: function(response){
                if(myDropzone.getQueuedFiles().length > 0){
                    taskID = response.taskID;
                    $('#taskID').val(response.taskID);
                    myDropzone.processQueue();
                }
                else{
                    var msgs = "<?php echo app('translator')->get('messages.taskCreatedSuccessfully'); ?>";
                    $.showToastr(msgs, 'success');
                    window.location.href = '<?php echo e(route('member.all-tasks.index')); ?>'
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

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('#project_id').change(function () {
        var id = $(this).val();
        var url = '<?php echo e(route('member.all-tasks.members', ':id')); ?>';
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            type: "GET",
            redirect: true,
            success: function (data) {
                $('#user_id').html(data.html);
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
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/all-tasks/create.blade.php ENDPATH**/ ?>