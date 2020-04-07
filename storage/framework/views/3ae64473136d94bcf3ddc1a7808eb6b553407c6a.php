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
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('head-script'); ?>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/iconpicker/css/fontawesome-iconpicker.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel">

                <div class="vtabs customvtab p-t-10">
                    <?php echo $__env->make('sections.front_setting_new_theme_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="white-box">
                                        <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>


                                        <h3 class="box-title m-b-0"><?php echo app('translator')->get('app.menu.menu'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></h3>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.home'); ?></label>
                                                    <input type="text" class="form-control" id="home" name="home" value="<?php echo e($frontMenu->home); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.price'); ?></label>
                                                    <input type="text" class="form-control" id="price" name="price" value="<?php echo e($frontMenu->price); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.contact'); ?></label>
                                                    <input type="text" class="form-control" id="contact" name="contact" value="<?php echo e($frontMenu->contact); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.feature'); ?></label>
                                                    <input type="text" class="form-control" id="feature" name="feature" value="<?php echo e($frontMenu->feature); ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.get_start'); ?></label>
                                                    <input type="text" class="form-control" id="get_start" name="get_start" value="<?php echo e($frontMenu->get_start); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.login'); ?></label>
                                                    <input type="text" class="form-control" id="login" name="login" value="<?php echo e($frontMenu->login); ?>">
                                                </div>
                                            </div>

                                            <div class="col-sm-12 col-md-3 col-xs-12">
                                                <div class="form-group">
                                                    <label for="title"><?php echo app('translator')->get('app.contact_submit'); ?></label>
                                                    <input type="text" class="form-control" id="contact_submit" name="contact_submit" value="<?php echo e($frontMenu->contact_submit); ?>">
                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" id="save-form"
                                                class="btn btn-success waves-effect waves-light m-r-10">
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>

                                        <?php echo Form::close(); ?>

                                        <hr>
                                    </div>
                                </div>
                            </div>    <!-- .row -->

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
  <script>
      $('#save-form').click(function () {
          $.easyAjax({
              url: '<?php echo e(route('super-admin.front-menu-settings.update', $frontMenu->id)); ?>',
              container: '#editSettings',
              type: "POST",
              data: $('#editSettings').serialize()
          })
      });


  </script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/front-menu-settings/index.blade.php ENDPATH**/ ?>