<?php $__empty_1 = true; $__currentLoopData = $taskFiles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-9">
                <?php echo e($file->filename); ?>

            </div>
            <div class="col-md-3">

                    <a target="_blank" href="<?php echo e($file->file_url); ?>"
                       data-toggle="tooltip" data-original-title="View"
                       class="btn btn-info btn-circle"><i
                                class="fa fa-search"></i></a>


                <?php if(is_null($file->external_link)): ?>
                <a href="<?php echo e(route('member.task-files.download', $file->id)); ?>"
                   data-toggle="tooltip" data-original-title="Download"
                   class="btn btn-default btn-circle"><i
                            class="fa fa-download"></i></a>
                <?php endif; ?>

                <a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-file-id="<?php echo e($file->id); ?>"
                   data-pk="list" class="btn btn-danger btn-circle sa-delete"><i class="fa fa-times"></i></a>
                <span class="m-l-10"><?php echo e($file->created_at->diffForHumans()); ?></span>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-10">
                <?php echo app('translator')->get('messages.noFileUploaded'); ?>
            </div>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/all-tasks/ajax-list.blade.php ENDPATH**/ ?>