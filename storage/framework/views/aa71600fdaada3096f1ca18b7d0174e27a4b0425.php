<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title"><?php echo app('translator')->get('modules.notices.notice'); ?>: <?php echo e($notice->heading); ?></h4>
</div>
<div class="modal-body">
    <div class="row">
        <div class="col-md-12 ">
            <?php echo e($notice->description); ?>

        </div>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-white waves-effect" data-dismiss="modal"><?php echo app('translator')->get('app.close'); ?></button>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/notices/show.blade.php ENDPATH**/ ?>