<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">

<div class="rpanel-title"> <?php echo app('translator')->get('app.task'); ?> <span><i class="ti-close right-side-toggle"></i></span> </div>
<div class="r-panel-body">

    <div class="row">
        <div class="col-xs-12">
            <h3><?php echo e(ucwords($task->heading)); ?></h3>
        </div>
        <div class="col-xs-6">
            <label for=""><?php echo app('translator')->get('modules.tasks.assignTo'); ?></label><br>
            <?php $__currentLoopData = $task->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <img src="<?php echo e($item->image_url); ?>" data-toggle="tooltip" title="<?php echo e(ucwords($item->name)); ?>" data-original-title="<?php echo e(ucwords($item->name)); ?>" data-placement="right" class="img-circle" width="25" height="25" alt="">
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="col-xs-6">
            <label for=""><?php echo app('translator')->get('app.dueDate'); ?></label><br>
            <span <?php if($task->due_date->isPast()): ?> class="text-danger" <?php endif; ?>><?php echo e($task->due_date->format($global->date_format)); ?></span>
        </div>
        <div class="col-xs-12 task-description">
            <?php echo ucfirst($task->description); ?>

        </div>


        <div class="col-xs-12 m-t-20 m-b-10">
            <ul class="list-group" id="sub-task-list">
                <?php $__currentLoopData = $task->subtasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subtask): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="list-group-item row">
                        <div class="col-xs-9">
                            <span><?php echo e(ucfirst($subtask->title)); ?></span>
                        </div>

                        <div class="col-xs-3 text-right">
                            <?php if($subtask->due_date): ?><span class="text-muted m-l-5"> - <?php echo app('translator')->get('modules.invoices.due'); ?>: <?php echo e($subtask->due_date->format($global->date_format)); ?></span><?php endif; ?>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            </ul>

            <div class="row b-all m-t-10 p-10"  id="new-sub-task" style="display: none">
                <div class="col-xs-11 ">
                    <a href="javascript:;" id="create-sub-task" data-name="title"  data-url="<?php echo e(route('admin.sub-task.store')); ?>" class="text-muted" data-type="text"></a>
                </div>

                <div class="col-xs-1 text-right">
                    <a href="javascript:;" id="cancel-sub-task" class="btn btn-danger btn-xs"><i class="fa fa-times"></i></a>
                </div>
            </div>

        </div>

        <div class="col-xs-12 m-t-15">
            <h5><?php echo app('translator')->get('modules.tasks.comment'); ?></h5>
        </div>

        <div class="col-xs-12" id="comment-container">
            <div id="comment-list">
                <?php $__empty_1 = true; $__currentLoopData = $task->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="row b-b m-b-5 font-12">
                        <div class="col-xs-12">
                            <h5><?php echo e(ucwords($comment->user->name)); ?> <span class="text-muted font-12"><?php echo e(ucfirst($comment->created_at->diffForHumans())); ?></span></h6>
                        </div>
                        <div class="col-xs-10">
                            <?php echo ucfirst($comment->comment); ?>

                        </div>
                        <?php if($comment->user_id == $user->id): ?>
                        <div class="col-xs-2 text-right">
                            <a href="javascript:;" data-comment-id="<?php echo e($comment->id); ?>" onclick="deleteComment('<?php echo e($comment->id); ?>')" class="text-danger"><?php echo app('translator')->get('app.delete'); ?></a>
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
            <div class="col-xs-3">
                <a href="javascript:;" id="submit-comment" class="btn btn-success"><i class="fa fa-send"></i> <?php echo app('translator')->get('app.submit'); ?></a>
            </div>
        </div>

    </div>

</div>

<script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>

<script>
    $('.summernote').summernote({
        height: 100,                 // set editor height
        minHeight: null,             // set minimum height of editor
        maxHeight: null,             // set maximum height of editor
        focus: false,                 // set focus to editable area after initializing summernote,
        toolbar: [
            // [groupName, [list of button]]
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']]
        ]
    });

    //    change sub task status

    $('#submit-comment').click(function () {
        var comment = $('#task-comment').val();
        var token = '<?php echo e(csrf_token()); ?>';
        $.easyAjax({
            url: '<?php echo e(route("client.task-comment.store")); ?>',
            type: "POST",
            data: {'_token': token, comment: comment, taskId: '<?php echo e($task->id); ?>'},
            success: function (response) {
                if (response.status == "success") {
                    $('#comment-list').html(response.view);
                    $('.note-editable').html('');
                    $('#task-comment').val('');
                }
            }
        })
    })

    function deleteComment(id) {
        var commentId = id;
        var token = '<?php echo e(csrf_token()); ?>';

        var url = '<?php echo e(route("client.task-comment.destroy", ':id')); ?>';
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


</script>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/tasks/show.blade.php ENDPATH**/ ?>