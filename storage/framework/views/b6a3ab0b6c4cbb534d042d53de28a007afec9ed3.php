<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('modules.lead.leadSource'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">

        <?php echo Form::open(['id'=>'editLeadSource','class'=>'ajax-form','method'=>'PUT']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('modules.lead.leadSource'); ?></label>
                        <input type="text" name="type" id="type" value="<?php echo e($source->type); ?>" class="form-control">
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

    $('#editLeadSource').on('submit', function(e) {
        return false;
    })

    $('#save-group').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.lead-source-settings.update', $source->id)); ?>',
            container: '#editLeadSource',
            type: "PUT",
            data: $('#editLeadSource').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    window.location.reload();
                }
            }
        })
    });
</script><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/lead-settings/source/edit.blade.php ENDPATH**/ ?>