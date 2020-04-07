<?php $__env->startSection('page-title'); ?>
<div class="row bg-title top-left-part2" >
    <!-- .page title -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="circle w__40 light-blue"><?php echo e($user->pnombre[0]); ?></span><?php echo e($user->pnombre); ?> <?php echo e($user->papellido); ?></h4>
    </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('client.dashboard.index')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('client.tickets.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/html5-editor/bootstrap-wysihtml5.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open(['id'=>'storeTicket','class'=>'ajax-form','method'=>'POST']); ?>

    <div class="form-body" style="margin-top: 101px">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-inverse">
                    <div class="panel-heading"><?php echo app('translator')->get('modules.tickets.requestTicket'); ?></div>

                    <div class="panel-wrapper collapse in">
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.tickets.ticketSubject'); ?> <span class="text-danger">*</span></label>
                                        <input type="text" id="subject" name="subject" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.tickets.ticketDescription'); ?> <span class="text-danger">*</span></label></label>
                                        <textarea class="textarea_editor form-control" rows="10" name="description"
                                                  id="description"></textarea>
                                    </div>
                                </div>
                                <!--/span-->

                            </div>
                            <!--/row-->

                        </div>
                    </div>

                    <div class="panel-footer text-right">
                        <div class="btn-group dropup">
                            <button class="btn btn-success" id="submit-ticket" type="button"><?php echo app('translator')->get('app.submit'); ?></button>
                        </div>
                    </div>
                </div>


            </div>

        </div>
        <!-- .row -->
    </div>
    <?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>


<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/html5-editor/wysihtml5-0.3.0.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/html5-editor/bootstrap-wysihtml5.js')); ?>"></script>
<script>
    $('.textarea_editor').wysihtml5();

    $('#submit-ticket').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('client.tickets.store')); ?>',
            container: '#storeTicket',
            type: "POST",
            data: $('#storeTicket').serialize()
        })
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/tickets/create.blade.php ENDPATH**/ ?>