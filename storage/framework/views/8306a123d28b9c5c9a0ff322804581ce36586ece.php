<?php $__env->startPush('head-script'); ?>
    <style>
        .d-none {
            display: none;
        }
    </style>
<?php $__env->stopPush(); ?>
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
                <li><a href="<?php echo e(route('admin.notices.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
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
                <div class="panel-heading"> <?php echo app('translator')->get('modules.notices.addNotice'); ?></div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'createNotice','class'=>'ajax-form','method'=>'POST']); ?>

                            <div class="form-body">
                                <div class="row">
                                    <div class="col-xs-12 ">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get("modules.notices.noticeHeading"); ?></label>
                                            <input type="text" name="heading" id="heading" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            
                                            <div class="radio-list">
                                                <label class="radio-inline p-0">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="to" id="toEmployee" checked="" value="employee">
                                                        <label for="duration_single"><?php echo app('translator')->get('modules.notices.toEmployee'); ?></label>
                                                    </div>
                                                </label>
                                                <label class="radio-inline">
                                                    <div class="radio radio-info">
                                                        <input type="radio" name="to" id="toClient" value="client">
                                                        <label for="duration_multiple"><?php echo app('translator')->get('modules.notices.toClients'); ?></label>
                                                    </div>
                                                </label>

                                            </div>

                                        </div>
                                    </div>

                                    <div class="col-xs-12 " id="department">
                                        <div class="form-group">
                                            <label><?php echo app('translator')->get("app.department"); ?></label>
                                            <select name="team_id" id="team_id" class="form-control">
                                                <option value=""> -- </option>
                                                <?php $__currentLoopData = $teams; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $team): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <option value="<?php echo e($team->id); ?>"><?php echo e(ucwords($team->team_name)); ?></option>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--/row-->

                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="form-group">
                                            <label class="control-label"><?php echo app('translator')->get("modules.notices.noticeDetails"); ?></label>
                                            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <!--/span-->

                            </div>
                            <div class="form-actions">
                                <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>

                            </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    $(function () {

        $('.radio-list').click(function () {
            if($('input[name=to]:checked').val() === 'employee') {
                $('#department').removeClass('d-none').addClass('d-block');
            } else {
                $('#department').removeClass('d-block').addClass('d-none');
            }
        })

    });
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.notices.store')); ?>',
            container: '#createNotice',
            type: "POST",
            redirect: true,
            data: $('#createNotice').serialize()
        })
    });
</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/notices/create.blade.php ENDPATH**/ ?>