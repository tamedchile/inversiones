<?php $__empty_1 = true; $__currentLoopData = $project->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-9">
                <?php echo e($file->filename); ?>

            </div>
            <div class="col-md-3">
                <a target="_blank"
                   href="<?php echo e($file->file_url); ?>"

                   data-toggle="tooltip" data-original-title="View"
                   class="btn btn-info btn-circle"><i
                            class="fa fa-search"></i></a>

                 <?php if(is_null($file->external_link)): ?>
                &nbsp;&nbsp
                <a
                        href="<?php echo e(route('client.files.download', $file->id)); ?>"

                        data-toggle="tooltip" data-original-title="Download" class="btn btn-default btn-circle"><i class="fa fa-download"></i></a>
                <?php if($file->user_id == $user->id): ?>
                    &nbsp;&nbsp;
                    <a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-file-id="<?php echo e($file->id); ?>" class="btn btn-danger btn-circle sa-params" data-pk="list"><i class="fa fa-times"></i></a>
                <?php endif; ?>
                <?php endif; ?>

                <span class="m-l-10"><?php echo e($file->created_at->diffForHumans()); ?></span>
            </div>
        </div>
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li class="list-group-item">
        <div class="row">
            <div class="col-md-10">
                <?php echo app('translator')->get('messages.newFileUploadedToTheProject'); ?>
            </div>
        </div>
    </li>
<?php endif; ?>
<?php /**PATH D:\laragon\www\inversiones\resources\views/client/project-files/ajax-list.blade.php ENDPATH**/ ?>