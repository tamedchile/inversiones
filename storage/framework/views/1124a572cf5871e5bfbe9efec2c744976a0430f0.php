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
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('super-admin.super-admin.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <style>
        .m-b-10{
            margin-bottom: 10px;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.new'); ?> <?php echo app('translator')->get('app.superAdmin'); ?> </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'createClient','class'=>'ajax-form','method'=>'POST']); ?>

                            <div class="form-body">
                            <div class="row">
                                <div class="col-md-4 ">
                                    <div class="form-group">
                                        <label class="required"><?php echo app('translator')->get('app.name'); ?></label>
                                        <input type="text" name="name" id="name"
                                               class="form-control" value="">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="required"><?php echo app('translator')->get('app.email'); ?></label>
                                        <input type="email" name="email" id="email"
                                               class="form-control" value="">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="required"><?php echo app('translator')->get('app.password'); ?></label>
                                        <input type="password" name="password" id="password"
                                               class="form-control">
                                        <span class="help-block"> </span>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">

                                <div class="col-md-12">
                                    <label><?php echo app('translator')->get('modules.profile.profilePicture'); ?></label>

                                    <div class="form-group">
                                        <div class="fileinput fileinput-new" data-provides="fileinput">
                                            <div class="fileinput-new thumbnail"
                                                 style="width: 200px; height: 150px;">
                                                <img src="https://via.placeholder.com/200x150.png?text=<?php echo e(str_replace(' ', '+', __('modules.profile.uploadPicture'))); ?>"
                                                     alt=""/>
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail"
                                                 style="max-width: 200px; max-height: 150px;"></div>
                                            <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->get('app.selectImage'); ?> </span>
                                    <span class="fileinput-exists"> <?php echo app('translator')->get('app.change'); ?> </span>
                                    <input type="file" name="image" id="image"> </span>
                                                <a href="javascript:;"
                                                   class="btn btn-danger fileinput-exists"
                                                   data-dismiss="fileinput"> <?php echo app('translator')->get('app.remove'); ?> </a>
                                            </div>
                                        </div>
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
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>

<script>
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.super-admin.store')); ?>',
            container: '#createClient',
            type: "POST",
            redirect: true,
            data: $('#createClient').serialize()
        })
    });
</script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/super-admin/create.blade.php ENDPATH**/ ?>