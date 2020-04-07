<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"> <?php echo app('translator')->get('modules.tasks.uplodedFiles'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="row" id="list">
            <ul class="list-group" id="files-list">
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
                            <a href="<?php echo e(route('admin.task-files.download', $file->id)); ?>"
                               data-toggle="tooltip" data-original-title="Download"
                               class="btn btn-default btn-circle"><i
                                        class="fa fa-download"></i></a>
                            <?php endif; ?>

                            <a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-file-id="<?php echo e($file->id); ?>"
                               data-pk="list" class="btn btn-danger btn-circle sa-delete"><i class="fa fa-times"></i></a>
                            <span class="clearfix m-l-10"><?php echo e($file->created_at->diffForHumans()); ?></span>
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
            </ul>
        </div>
    </div>
</div>

<script>
    $('body').on('click', '.sa-delete', function () {
        var id = $(this).data('file-id');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
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

                var url = "<?php echo e(route('admin.task-files.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $('#totalUploadedFiles').html(response.totalFiles);
                            $('#list ul.list-group').html(response.html);
                        }
                    }
                });
            }
        });
    });



    </script>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/tasks/ajax-file-list.blade.php ENDPATH**/ ?>