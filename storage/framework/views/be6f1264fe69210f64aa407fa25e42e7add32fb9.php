<div class="row">
    <?php $__currentLoopData = $project->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2 m-b-10">
            <div class="card">
                    <div class="file-bg">
                        <div class="overlay-file-box">
                            <div class="user-content">
                                <?php if($file->icon == 'images'): ?>
                                    <img class="card-img-top img-responsive" src="<?php echo e($file->file_url); ?>" alt="Card image cap">
                                <?php else: ?>
                                    <i class="fa <?php echo e($file->icon); ?>" style="font-size: -webkit-xxx-large; padding-top: 65px;"></i>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                <div class="card-block">
                    <h6 class="card-title"><?php echo e($file->filename); ?></h6>

                        <a target="_blank" href="<?php echo e($file->file_url); ?>"
                           data-toggle="tooltip" data-original-title="View"
                           class="btn btn-info btn-circle"><i
                                    class="fa fa-search"></i></a>

                    <?php if(is_null($file->external_link)): ?>
                    <a href="<?php echo e(route('client.files.download', $file->id)); ?>"
                       data-toggle="tooltip" data-original-title="Download"
                       class="btn btn-default btn-circle"><i
                                class="fa fa-download"></i></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/project-files/thumbnail-list.blade.php ENDPATH**/ ?>