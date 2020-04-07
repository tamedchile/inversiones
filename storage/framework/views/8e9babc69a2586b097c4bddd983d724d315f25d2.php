<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><?php if(isset($faqCategory->id)): ?> <?php echo app('translator')->get('app.edit'); ?> <?php else: ?> <?php echo app('translator')->get('app.addNew'); ?> <?php endif; ?> <?php echo app('translator')->get('app.faqCategory'); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">

        <?php echo Form::open(['id'=>'addEditFaqCategory','class'=>'ajax-form']); ?>

        <?php if(isset($faqCategory->id)): ?> <input type="hidden" name="_method" value="PUT"> <?php endif; ?>
        <div class="form-body">
            <div class="row">
                <div class="col-xs-12 ">
                    <div class="form-group">
                        <label><?php echo app('translator')->get('app.name'); ?></label>
                        <input type="text" name="name" class="form-control" value="<?php echo e($faqCategory->name ?? ''); ?>">
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions">
            <button type="button" id="save-faq-category" onclick="saveCategory(<?php echo e($faqCategory->id ?? ''); ?>);return false;" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/faq-category/add-edit.blade.php ENDPATH**/ ?>