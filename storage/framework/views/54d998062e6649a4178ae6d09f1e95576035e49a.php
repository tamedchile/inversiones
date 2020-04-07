<div class="row">

    <div class="col-xs-12"   id="project-timeline">
        <div class="panel">
            <div class="panel-heading p-b-0 p-l-15"><?php echo app('translator')->get('modules.projects.activityTimeline'); ?>
                
            </div>
            <hr>

            <div class="panel-wrapper collapse in">
                <div class="panel-body p-t-15">
                    <div class="steamline">
                        <?php $__currentLoopData = $task->history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="sl-item">
                            <div class="sl-left"><img class="img-circle" src="<?php echo e($activ->user->image_url); ?>" width="25" height="25" alt="">
                            </div>
                            <div class="sl-right">
                                <div>
                                    <h6><?php echo e(__("modules.tasks.".$activ->details)); ?> <?php echo e(ucwords($activ->user->name)); ?> <label style="background: <?php echo e($activ->board_column->label_color); ?>" class="label"><?php echo e($activ->board_column->column_name); ?></label></h6>

                                    <?php if(!is_null($activ->sub_task_id)): ?>
                                        <h6><small class="text-info"><?php echo e($activ->sub_task->title); ?></small></h6>
                                    <?php endif; ?>

                                    <span class="sl-date"><?php echo e($activ->created_at->timezone($global->timezone)->format($global->date_format)." ".$activ->created_at->timezone($global->timezone)->format($global->time_format)); ?></span>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/tasks/history.blade.php ENDPATH**/ ?>