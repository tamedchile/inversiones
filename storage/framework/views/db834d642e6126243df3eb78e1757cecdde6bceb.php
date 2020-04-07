<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('modules.projects.projectCategory'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->get('modules.projectCategory.categoryName'); ?></th>
                    <th><?php echo app('translator')->get('app.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="cat-<?php echo e($category->id); ?>">
                        <td><?php echo e($key+1); ?></td>
                        <td><?php echo e(ucwords($category->category_name)); ?></td>
                        <td><a href="javascript:;" data-cat-id="<?php echo e($category->id); ?>" class="btn btn-sm btn-danger btn-rounded delete-category"><?php echo app('translator')->get("app.remove"); ?></a></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td colspan="3"><?php echo app('translator')->get('messages.noProjectCategory'); ?></td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>

        <hr>
        <?php echo Form::open(['id'=>'createProjectCategory','class'=>'ajax-form','method'=>'POST']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.projectCategory.categoryName'); ?></label>
                        <input type="text" name="category_name" id="category_name" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-category" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<script>

    $('.delete-category').click(function () {
        var id = $(this).data('cat-id');
        var url = "<?php echo e(route('admin.projectCategory.destroy',':id')); ?>";
        url = url.replace(':id', id);

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                    $('#cat-'+id).fadeOut();
                    var options = [];
                    var rData = [];
                    rData = response.data;
                    $.each(rData, function( index, value ) {
                        var selectData = '';
                        selectData = '<option value="'+value.id+'">'+value.category_name+'</option>';
                        options.push(selectData);
                    });

                    $('#category_id').html(options);
                    $('#category_id').selectpicker('refresh');
                }
            }
        });
    });

    $('#save-category').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.projectCategory.store-cat')); ?>',
            container: '#createProjectCategory',
            type: "POST",
            data: $('#createProjectCategory').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    if(response.status == 'success'){
                        console.log(response.data);
                        var options = [];
                        var rData = [];
                        rData = response.data;
                        $.each(rData, function( index, value ) {
                            var selectData = '';
                            selectData = '<option value="'+value.id+'">'+value.category_name+'</option>';
                            options.push(selectData);
                        });

                        $('#category_id').html(options);
                        $('#category_id').selectpicker('refresh');
                        $('#projectCategoryModal').modal('hide');
                    }
                }
            }
        })
    });
</script><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/projects/create-category.blade.php ENDPATH**/ ?>