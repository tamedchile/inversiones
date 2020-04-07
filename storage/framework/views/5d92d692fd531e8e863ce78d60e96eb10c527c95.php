<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('modules.lead.leadStatus'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">

        <?php echo Form::open(['id'=>'editLeadStatus','class'=>'ajax-form','method'=>'PUT']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.lead.leadStatus'); ?></label>
                        <input type="text" name="type" id="type" value="<?php echo e($status->type); ?>" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-group" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>

<script>

    $('#editLeadStatus').on('submit', function(e) {
        return false;
    })

    $('#save-group').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.lead-status-settings.update', $status->id)); ?>',
            container: '#editLeadStatus',
            type: "PUT",
            data: $('#editLeadStatus').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    });
</script><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/lead-settings/status/edit.blade.php ENDPATH**/ ?>