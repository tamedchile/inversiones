<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">

<div class="panel panel-default">
    <div class="panel-heading "><i class="ti-pencil"></i> <?php echo app('translator')->get('modules.templateTasks.updateTask'); ?>
        <div class="panel-action">
            <a href="javascript:;" class="close" id="hide-edit-task-panel" data-dismiss="modal"><i class="ti-close"></i></a>
        </div>
    </div>
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
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('modules.templateTasks.assignTo'); ?></label>
                            <select class="form-control" name="user_id" id="user_id" >
                                <?php $__currentLoopData = $task->projectTemplate->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option <?php if($task->user_id == $member->user->id): ?> selected <?php endif; ?>
                                    value="<?php echo e($member->user->id); ?>"><?php echo e($member->user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <!--/span-->
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('modules.templateTasks.priority'); ?></label>

                            <div class="radio radio-danger">
                                <input type="radio" name="priority" id="radio13"
                                       <?php if($task->priority == 'high'): ?> checked <?php endif; ?>
                                       value="high">
                                <label for="radio13" class="text-danger">
                                    <?php echo app('translator')->get('modules.templateTasks.high'); ?> </label>
                            </div>
                            <div class="radio radio-warning">
                                <input type="radio" name="priority"
                                       <?php if($task->priority == 'medium'): ?> checked <?php endif; ?>
                                       id="radio14" value="medium">
                                <label for="radio14" class="text-warning">
                                    <?php echo app('translator')->get('modules.templateTasks.medium'); ?> </label>
                            </div>
                            <div class="radio radio-success">
                                <input type="radio" name="priority" id="radio15"
                                       <?php if($task->priority == 'low'): ?> checked <?php endif; ?>
                                       value="low">
                                <label for="radio15" class="text-success">
                                    <?php echo app('translator')->get('modules.templateTasks.low'); ?> </label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/row-->

            </div>
            <div class="form-actions">
                <button type="button" id="update-task" onclick="updateTask(); return false;" class="btn btn-success"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
            </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>

<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>
<script>

    //    update task
    function updateTask(){
        $.easyAjax({
            url: '<?php echo e(route('admin.project-template-task.update', [$task->id])); ?>',
            container: '#updateTask',
            type: "POST",
            data: $('#updateTask').serialize(),
            success: function (data) {
                $('#edit-task-panel').switchClass("show", "hide", 300, "easeInOutQuad");
                showTable();
            }
        })
    }

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
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/project-template/tasks/edit.blade.php ENDPATH**/ ?>