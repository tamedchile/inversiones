<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php echo app('translator')->get('modules.tasks.subTask'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">
        <?php echo Form::open(['id'=>'createSubTask','class'=>'ajax-form','method'=>'POST']); ?>

        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('app.name'); ?></label>
                        <input type="text" name="name" id="name" class="form-control">
                        <input type="hidden" name="taskID" id="taskID" value="<?php echo e($taskID); ?>">
                    </div>
                </div>
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('app.dueDate'); ?></label>
                        <input type="text" name="due_date" autocomplete="off" id="due_date3" class="form-control datepicker">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" onclick="saveSubTask()" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>
<script>
    jQuery('#due_date3').datepicker({
        autoclose: true,
        todayHighlight: true,
        weekStart:'<?php echo e($global->week_start); ?>',
        format: '<?php echo e($global->date_picker_format); ?>',
    });

</script>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/sub_task/create.blade.php ENDPATH**/ ?>