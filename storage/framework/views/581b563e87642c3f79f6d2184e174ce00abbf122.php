<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.teams.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.department'); ?></div>
                <p class="text-muted  font-13"></p>

                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-sm-12 col-xs-12">
                                <?php echo Form::open(['id'=>'createCurrency','class'=>'ajax-form','method'=>'POST']); ?>

                                <div class="form-group">
                                    <label for="company_name" class="required"><?php echo app('translator')->get('app.department'); ?></label>
                                    <input type="text" class="form-control" id="team_name" name="team_name">
                                </div>


                                <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                                    <?php echo app('translator')->get('app.save'); ?>
                                </button>
                                <a href="<?php echo e(route('admin.teams.index')); ?>" class="btn btn-default waves-effect waves-light"><?php echo app('translator')->get('app.back'); ?></a>
                                <?php echo Form::close(); ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script>
        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.teams.store')); ?>',
                container: '#createCurrency',
                type: "POST",
                redirect: true,
                data: $('#createCurrency').serialize()
            })
        });
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/teams/create.blade.php ENDPATH**/ ?>