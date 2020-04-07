<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('modules.offlinePayment.title'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th>#</th>
                    <th><?php echo app('translator')->get('app.menu.method'); ?></th>
                    <th><?php echo app('translator')->get('app.description'); ?></th>
                    <th><?php echo app('translator')->get('app.status'); ?></th>
                    <th width="20%"><?php echo app('translator')->get('app.action'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php $__empty_1 = true; $__currentLoopData = $offlineMethods; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$method): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr id="method-<?php echo e($method->id); ?>">
                        <td><?php echo e(($key+1)); ?></td>
                        <td><?php echo e(ucwords($method->name)); ?></td>
                        <td><?php echo ucwords($method->description); ?> </td>
                        <td>
                            <?php if($method->status == 'yes'): ?>
                                <label class="label label-success">
                                    <?php echo app('translator')->get('modules.offlinePayment.active'); ?>
                                </label>
                            <?php else: ?>
                                <label class="label label-danger">
                                    <?php echo app('translator')->get('modules.offlinePayment.inActive'); ?>
                                </label>
                            <?php endif; ?>
                        </td>
                        <td>
                            <a href="javascript:;" data-type-id="<?php echo e($method->id); ?>"
                               class="btn btn-sm btn-danger btn-rounded btn-outline delete-type m-t-5"><i
                                        class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <tr>
                        <td>
                            <?php echo app('translator')->get('messages.noMethodsAdded'); ?>
                        </td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        ​
        <hr>
        <?php echo Form::open(['id'=>'createMethods','class'=>'ajax-form','method'=>'POST']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.offlinePayment.method'); ?></label>
                        <input type="text" name="name" id="name" class="form-control">
                    </div>
                    ​
                </div>
                <div class="col-xs-12">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.offlinePayment.description'); ?></label>
                        <textarea id="description" name="description" class="form-control" rows="4"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-type" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
​
<script>
    $('#save-type').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.offline-payment-setting.store')); ?>',
            container: '#createMethods',
            type: "POST",
            data: $('#createMethods').serialize(),
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
                    $('#offlineMethod').modal('hide');
                    var options = [];
                    var rData = [];
                    rData = response.data;
                    $.each(rData, function( index, value ) {
                        var selectData = '';
                        selectData = '<option value="'+value.id+'">'+value.name+'</option>';
                        options.push(selectData);
                    });
                    $('#multiselect').html(options);
                    $('#multiselect').selectpicker('refresh');
                }
            }
        })
    });

    $('body').on('click', '.delete-type', function () {
        var id = $(this).data('type-id');
        swal({
            title: "Are you sure?",
            text: "This will remove the method from the list.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {
                var url = "<?php echo e(route('super-admin.offline-payment-setting.destroy',':id')); ?>";
                url = url.replace(':id', id);
                var token = "<?php echo e(csrf_token()); ?>";
                $.easyAjax({
                    type: 'POST',
                    url: url,
                    data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
                            $('#method-'+id).fadeOut();
                            var options = [];
                            var rData = [];
                            rData = response.data;
                            $.each(rData, function( index, value ) {
                                var selectData = '';
                                selectData = '<option value="'+value.id+'">'+value.name+'</option>';
                                options.push(selectData);
                            });
                            $('#multiselect').html(options);
                            $('#multiselect').selectpicker('refresh');
                        }
                    }
                });
            }
        });
    });
</script><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/companies/create-modal.blade.php ENDPATH**/ ?>