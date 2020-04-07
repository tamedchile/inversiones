<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<div class="rpanel-title"> <?php echo app('translator')->get('app.task'); ?> #<?php echo e($task->id); ?> <span><i class="ti-close right-side-toggle"></i></span> </div>
<div class="r-panel-body">

    <div class="row">
        <div class="col-xs-12">
            <a href="javascript:;" id="completedButton" class="btn btn-success btn-sm m-b-10 btn-rounded btn-outline <?php if($task->board_column->slug == 'completed'): ?> hidden <?php endif; ?> "  onclick="markComplete('completed')" ><i class="fa fa-check"></i> <?php echo app('translator')->get('modules.tasks.markComplete'); ?></a>
            <a href="javascript:;" id="inCompletedButton" class="btn btn-default btn-outline btn-sm m-b-10 btn-rounded <?php if($task->board_column->slug != 'completed'): ?> hidden <?php endif; ?>"  onclick="markComplete('incomplete')"><i class="fa fa-times"></i> <?php echo app('translator')->get('modules.tasks.markIncomplete'); ?></a>
            <?php if($task->board_column->slug != 'completed' && $user->can('edit_tasks')): ?>
                <a href="javascript:;" id="reminderButton" class="btn btn-info btn-sm m-b-10 btn-rounded btn-outline pull-right" title="<?php echo app('translator')->get('messages.remindToAssignedEmployee'); ?>"><i class="fa fa-envelope"></i> <?php echo app('translator')->get('modules.tasks.reminder'); ?></a>
            <?php endif; ?>
        </div>
        <div class="col-xs-12">
            <h5><?php echo e(ucwords($task->heading)); ?>

                <?php if($task->task_category_id): ?>
                    <label class="label label-default text-dark m-l-5 font-light"><?php echo e(ucwords($task->category->category_name)); ?></label>
                <?php endif; ?>

                <label class="m-l-5 font-light label
            <?php if($task->priority == 'high'): ?>
                        label-danger
                    <?php elseif($task->priority == 'medium'): ?>
                        label-warning
                    <?php else: ?>
                        label-success
                    <?php endif; ?>
                        ">
                    <span class="text-dark"><?php echo app('translator')->get('modules.tasks.priority'); ?> ></span>  <?php echo e(ucfirst($task->priority)); ?>

                </label>

            </h5>
            <?php if(!is_null($task->project_id)): ?>
                <p><i class="icon-layers"></i> <?php echo e(ucfirst($task->project->project_name)); ?></p>
            <?php endif; ?>
        </div>

        <ul class="nav customtab nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#home1" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><?php echo app('translator')->get('app.task'); ?></a></li>
            <li role="presentation" class=""><a href="#profile1" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->get('modules.tasks.subTask'); ?>(<?php echo e(count($task->subtasks)); ?>)</a></li>
            <li role="presentation" class=""><a href="#messages1" aria-controls="messages" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->get('app.file'); ?> (<?php echo e(sizeof($task->files)); ?>)</a></li>
            <li role="presentation" class=""><a href="#settings1" aria-controls="settings" role="tab" data-toggle="tab" aria-expanded="false"><?php echo app('translator')->get('modules.tasks.comment'); ?> (<?php echo e(count($task->comments)); ?>)</a></li>
            <li role="presentation" class="pull-right">  <a href="javascript:;" id="view-task-history" data-task-id="<?php echo e($task->id); ?>" class="pull-right text-muted font-12 btn btn-sm btn-default btn-outline"> <i class="fa fa-history"></i> <span class="hidden-xs"><?php echo app('translator')->get('app.view'); ?> <?php echo app('translator')->get('modules.tasks.history'); ?></span></a></li>
            <li role="presentation" class="pull-right" >  <a href="javascript:;" class="close-task-history pull-right text-muted" style="display:none"><span class="hidden-xs"><?php echo app('translator')->get('app.close'); ?> <?php echo app('translator')->get('modules.tasks.history'); ?></span> <i class="fa fa-times"></i></a></li>
        </ul>

        <div class="tab-content" id="task-detail-section">
            <div role="tabpanel" class="tab-pane fade active in" id="home1">
                <div class="col-xs-12" >
                    <div class="col-xs-6 col-md-3 font-12">
                        <label class="font-12" for=""><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label><br>
                         <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <img src="<?php echo e($item->image_url); ?>" data-toggle="tooltip" data-original-title="<?php echo e(ucwords($item->name)); ?>" data-placement="right" class="img-circle" width="25" height="25" alt="">
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <?php if($task->created_by): ?>
                    <div class="col-xs-6 col-md-3 font-12">
                        <label class="font-12" for=""><?php echo app('translator')->get('modules.tasks.assignBy'); ?></label><br>
                        <img src="<?php echo e($task->create_by->image_url); ?>" class="img-circle" width="25" height="25" alt="">

                        <?php echo e(ucwords($task->create_by->name)); ?>

                    </div>
                    <?php endif; ?>

                    <?php if($task->start_date): ?>
                    <div class="col-xs-6 col-md-3 font-12">
                        <label class="font-12" for=""><?php echo app('translator')->get('app.startDate'); ?></label><br>
                        <span class="text-success" ><?php echo e($task->start_date->format($global->date_format)); ?></span><br>
                    </div>
                    <?php endif; ?>
                    <div class="col-xs-6 col-md-3 font-12">
                        <label class="font-12" for=""><?php echo app('translator')->get('app.dueDate'); ?></label><br>
                        <span <?php if($task->due_date->isPast()): ?> class="text-danger" <?php endif; ?>>
                            <?php echo e($task->due_date->format($global->date_format)); ?>

                        </span>

                        <span style="color: <?php echo e($task->board_column->label_color); ?>" id="columnStatus"> <?php echo e($task->board_column->column_name); ?></span>

                    </div>
                    <div class="col-xs-12 task-description b-all p-10 m-t-20">
                        <?php echo ucfirst($task->description); ?>

                    </div>

                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="profile1">
                <div class="col-xs-12 m-t-5">
                    <h5><i class="ti-check-box"></i> <?php echo app('translator')->get('modules.tasks.subTask'); ?>
                        <?php if(count($task->subtasks) > 0): ?>
                            <span class="pull-right"><span class="donut" data-peity='{ "fill": ["#00c292", "#eeeeee"],    "innerRadius": 5, "radius": 8 }'><?php echo e(count($task->completedSubtasks)); ?>/<?php echo e(count($task->subtasks)); ?></span> <span class="text-muted font-12"><?php echo e(floor((count($task->completedSubtasks)/count($task->subtasks))*100)); ?>%</span></span>
                        <?php endif; ?>

                    </h5>

                    <ul class="list-group b-t" id="sub-task-list">
                        <?php $__currentLoopData = $task->subtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="list-group-item row">
                                <div class="col-xs-9">
                                    <div class="checkbox checkbox-success checkbox-circle task-checkbox">
                                        <input class="task-check" data-sub-task-id="<?php echo e($subtask->id); ?>" id="checkbox<?php echo e($subtask->id); ?>" type="checkbox"
                                               <?php if($subtask->status == 'complete'): ?> checked <?php endif; ?>>
                                        <label for="checkbox<?php echo e($subtask->id); ?>">&nbsp;</label>
                                        <span><?php echo e(ucfirst($subtask->title)); ?></span>
                                    </div>
                                    <?php if($subtask->due_date): ?><span class="text-muted m-l-5"> - <?php echo app('translator')->get('modules.invoices.due'); ?>: <?php echo e($subtask->due_date->format($global->date_format)); ?></span><?php endif; ?>
                                </div>

                                <div class="col-xs-3 text-right">
                                    <a href="javascript:;" data-sub-task-id="<?php echo e($subtask->id); ?>" class="edit-sub-task"><i class="fa fa-pencil"></i></a>&nbsp;
                                    <a href="javascript:;" data-sub-task-id="<?php echo e($subtask->id); ?>" class="delete-sub-task"><i class="fa fa-trash"></i></a>
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
                <div class="col-xs-12 m-t-20 m-b-10">
                    <a href="javascript:;"  data-task-id="<?php echo e($task->id); ?>" class="add-sub-task"><i class="icon-plus"></i> <?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('modules.tasks.subTask'); ?></a>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="messages1">
                <div class="col-xs-12 m-t-10">
                    <a href="javascript:;" id="uploadedFiles" class="btn btn-primary btn-sm btn-rounded btn-outline"><i class="fa fa-image"></i> <?php echo app('translator')->get('modules.tasks.uplodedFiles'); ?> (<span id="totalUploadedFiles"><?php echo e(sizeof($task->files)); ?></span>) </a>
                </div>
            </div>

            <div role="tabpanel" class="tab-pane" id="settings1">


                <div class="col-xs-12 m-t-15">
                    <h5><?php echo app('translator')->get('modules.tasks.comment'); ?></h5>
                </div>

                <div class="col-xs-12" id="comment-container">
                    <div id="comment-list">
                        <?php $__empty_1 = true; $__currentLoopData = $task->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="row b-b m-b-5 font-12">
                                <div class="col-xs-12">
                                    <h5><?php echo e(ucwords($comment->user->name)); ?> <span class="text-muted font-12"><?php echo e(ucfirst($comment->created_at->diffForHumans())); ?></span></h5>
                                </div>
                                <div class="col-xs-10">
                                    <?php echo ucfirst($comment->comment); ?>

                                </div>
                                <?php if($comment->user->id == $user->id || $user->can('delete_tasks')): ?>
                                    <div class="col-xs-2 text-right">
                                        <a href="javascript:;" data-comment-id="<?php echo e($comment->id); ?>" class="text-danger " onclick="deleteComment('<?php echo e($comment->id); ?>');return false;"><?php echo app('translator')->get('app.delete'); ?></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="col-xs-12">
                                <?php echo app('translator')->get('messages.noRecordFound'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>

                <div class="form-group" id="comment-box">
                    <div class="col-xs-12">
                        <textarea name="comment" id="task-comment" class="summernote" placeholder="<?php echo app('translator')->get('modules.tasks.comment'); ?>"></textarea>
                    </div>
                    <div class="col-xs-12">
                        <a href="javascript:;" id="submit-comment" class="btn btn-info btn-sm"><i class="fa fa-send"></i> <?php echo app('translator')->get('app.submit'); ?></a>
                    </div>
                </div>
            </div>
        </div>



        <div class="col-xs-12" id="task-history-section">
        </div>

    </div>

</div>



<script src="<?php echo e(asset('plugins/bower_components/moment/moment.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="<?php echo e(asset('plugins/bower_components/peity/jquery.peity.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/peity/jquery.peity.init.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script>

    $('body').on('click', '.edit-sub-task', function () {
        var id = $(this).data('sub-task-id');
        var url = '<?php echo e(route('member.sub-task.edit', ':id')); ?>';
        url = url.replace(':id', id);

        $('#subTaskModelHeading').html('Sub Task');
        $.ajaxModal('#subTaskModal', url);
    });

    $('body').on('click', '.add-sub-task', function () {
        console.log('add-sub-task');
        var id = $(this).data('task-id');
        var url = '<?php echo e(route('member.sub-task.create')); ?>?task_id='+id;

        $('#subTaskModelHeading').html('Sub Task');
        $.ajaxModal('#subTaskModal', url);
    });

    $('#reminderButton').click(function () {
        swal({
            title: "Are you sure?",
            text: "Do you want to send reminder to assigned employee?",
            dangerMode: true,
            icon: 'warning',
            buttons: {
                cancel: "No, cancel please!",
                confirm: {
                    text: "Yes, send it!",
                    value: true,
                    visible: true,
                    className: "danger",
                }
            }
        }).then(function (isConfirm) {
            if (isConfirm) {

                var url = '<?php echo e(route('member.all-tasks.reminder', $task->id)); ?>';

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        //
                    }
                });
            }
        });
    })

    function saveSubTask() {
        $.easyAjax({
            url: '<?php echo e(route('member.sub-task.store')); ?>',
            container: '#createSubTask',
            type: "POST",
            data: $('#createSubTask').serialize(),
            success: function (response) {
                $('#subTaskModal').modal('hide');
                $('#sub-task-list').html(response.view)
            }
        })
    }

    function updateSubTask(id) {
        var url = '<?php echo e(route('member.sub-task.update', ':id')); ?>';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            container: '#createSubTask',
            type: "POST",
            data: $('#createSubTask').serialize(),
            success: function (response) {
                $('#subTaskModal').modal('hide');
                $('#sub-task-list').html(response.view)
            }
        })
    }

    $('#view-task-history').click(function () {
        var id = $(this).data('task-id');

        var url = '<?php echo e(route('member.all-tasks.history', ':id')); ?>';
        url = url.replace(':id', id);
        $.easyAjax({
            url: url,
            type: "GET",
            success: function (response) {
                $('#task-detail-section').hide();
                $('#task-history-section').html(response.view);
                $('#view-task-history').hide();
                $('.close-task-history').show();
            }
        })

    })

    $('.close-task-history').click(function () {
        $('#task-detail-section').show();
        $('#task-history-section').html('');
        $(this).hide();
        $('#view-task-history').show();

    })

    $('.summernote').summernote({
        height: 100,                 // set editor height
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


    $('body').on('click', '.delete-sub-task', function () {
        var id = $(this).data('sub-task-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted sub task!",
            dangerMode: true,
            icon: 'warning',
            buttons: {
                cancel: "No, cancel please!",
                confirm: {
                    text: "Yes, delete it!",
                    value: true,
                    visible: true,
                    className: "danger",
                }
            }
        }).then(function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('member.sub-task.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $('#sub-task-list').html(response.view);
                        }
                    }
                });
            }
        });
    });

    //    change sub task status
    $('#sub-task-list').on('click', '.task-check', function () {
        if ($(this).is(':checked')) {
            var status = 'complete';
        }else{
            var status = 'incomplete';
        }

        var id = $(this).data('sub-task-id');
        var url = "<?php echo e(route('member.sub-task.changeStatus')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            url: url,
            type: "POST",
            data: {'_token': token, subTaskId: id, status: status},
            success: function (response) {
                if (response.status == "success") {
                    $('#sub-task-list').html(response.view);
                }
            }
        })
    });

    $('#uploadedFiles').click(function () {

        var url = '<?php echo e(route("member.all-tasks.show-files", ':id')); ?>';

        var id = <?php echo e($task->id); ?>;
        url = url.replace(':id', id);

        $('#subTaskModelHeading').html('Sub Task');
        $.ajaxModal('#subTaskModal', url);
    });

    $('#submit-comment').click(function () {
        var comment = $('#task-comment').val();
        var token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: '<?php echo e(route("member.task-comment.store")); ?>',
            type: "POST",
            data: {'_token': token, comment: comment, taskId: '<?php echo e($task->id); ?>'},
            success: function (response) {
                if (response.status == "success") {
                    $('#comment-list').html(response.view);
                    $('.summernote').summernote("reset");
                }
            }
        })
    });


    function deleteComment(id) {

        var commentId = id;
        var token = '<?php echo e(csrf_token()); ?>';

        var url = '<?php echo e(route("member.task-comment.destroy", ':id')); ?>';
        url = url.replace(':id', commentId);

        $.easyAjax({
            url: url,
            type: "POST",
            data: {'_token': token, '_method': 'DELETE', commentId: commentId},
            success: function (response) {
                if (response.status == "success") {
                    $('#comment-list').html(response.view);
                }
            }
        })
    }

    //    change task status
    function markComplete(status) {

        var id = <?php echo e($task->id); ?>;

        if(status == 'completed'){
            var checkUrl = '<?php echo e(route('member.tasks.checkTask', ':id')); ?>';
            checkUrl = checkUrl.replace(':id', id);
            $.easyAjax({
                url: checkUrl,
                type: "GET",
                container: '#task-list-panel',
                data: {},
                success: function (data) {
                    if(data.taskCount > 0){
                        swal({
                            title: "Are you sure?",
                            text: "There is a incomplete sub-task in this task do you want to mark complete!",
                            dangerMode: true,
                            icon: 'warning',
                            buttons: {
                                cancel: "No, cancel please!",
                                confirm: {
                                    text: "Yes, complete it!",
                                    value: true,
                                    visible: true,
                                    className: "danger",
                                }
                            }
                        }).then(function (isConfirm) {
                            if (isConfirm) {
                                updateTask(id,status)
                            }
                        });
                    }
                    else{
                        updateTask(id,status)
                    }

                }
            });
        }
        else{
            updateTask(id,status)
        }


    }

    // Update Task
    function updateTask(id,status){
        var url = "<?php echo e(route('member.tasks.changeStatus')); ?>";
        var token = "<?php echo e(csrf_token()); ?>";
        $.easyAjax({
            url: url,
            type: "POST",
            container: '.r-panel-body',
            data: {'_token': token, taskId: id, status: status, sortBy: 'id'},
            async: false,
            success: function (data) {
                $('#columnStatus').css('color', data.textColor);
                $('#columnStatus').html(data.column);
                if(status == 'completed'){

                    $('#inCompletedButton').removeClass('hidden');
                    $('#completedButton').addClass('hidden');
                    if($('#reminderButton').length){
                        $('#reminderButton').addClass('hidden');
                    }
                }
                else{
                    $('#completedButton').removeClass('hidden');
                    $('#inCompletedButton').addClass('hidden');
                    if($('#reminderButton').length){
                        $('#reminderButton').removeClass('hidden');
                    }
                }

                if( typeof table !== 'undefined'){
                    table._fnDraw();
                }
                else{
                    if ($.fn.showTable) {
                        showTable();
                    }
                }
            }
        })
    }

</script>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/all-tasks/show.blade.php ENDPATH**/ ?>