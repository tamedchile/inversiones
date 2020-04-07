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
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/clockpicker/dist/jquery-clockpicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.frontCms.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.front_setting_new_theme_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="white-box">
                                        <h3 class="box-title m-b-0"> <?php echo app('translator')->get("modules.frontSettings.title"); ?></h3>

                                        <div class="row">
                                            <div class="col-sm-12 col-xs-12">
                                                <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                                                <h4><?php echo app('translator')->get('modules.frontCms.frontDetail'); ?></h4>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="company_name" class="d-block"><?php echo app('translator')->get('modules.frontCms.primaryColor'); ?></label>
                                                            <input type="text" name="primary_color" class="gradient-colorpicker form-control" autocomplete="off" value="<?php echo e($frontDetail->primary_color); ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="company_name"><?php echo app('translator')->get('modules.frontCms.headerTitle'); ?></label>
                                                            <input type="text" class="form-control" id="header_title" name="header_title"
                                                                   value="<?php echo e($frontDetail->header_title); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="address"><?php echo app('translator')->get('modules.frontCms.headerDescription'); ?></label>
                                                            <textarea class="form-control" id="header_description" rows="5"
                                                                      name="header_description"><?php echo e($frontDetail->header_description); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-6 col-xs-12">
                                                        <div class="form-group">
                                                            <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.frontCms.mainImage'); ?></label>
                                                            <div class="col-md-12">
                                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                                    <div class="fileinput-new thumbnail"
                                                                         style="width: 200px; height: 150px;">
                                                                         <img src="<?php echo e($frontDetail->image_url); ?>" alt=""/>
                                                                    </div>
                                                                    <div class="fileinput-preview fileinput-exists thumbnail"
                                                                         style="max-width: 200px; max-height: 150px;"></div>
                                                                    <div>
                                <span class="btn btn-info btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->get('app.selectImage'); ?> </span>
                                    <span class="fileinput-exists"> <?php echo app('translator')->get('app.change'); ?> </span>
                                    <input type="file" name="image" id="image"> </span>
                                                                        <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                                           data-dismiss="fileinput"> <?php echo app('translator')->get('app.remove'); ?> </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12">
                                                        <div class="alert alert-info"><i class="fa fa-info-circle"></i> <?php echo app('translator')->get('messages.headerImageSizeMessage'); ?></div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="checkbox checkbox-info  col-md-10">
                                                                <input id="get_started_show" name="get_started_show" value="yes"
                                                                       <?php if($frontDetail->get_started_show == "yes"): ?> checked
                                                                       <?php endif; ?>
                                                                       type="checkbox">
                                                                <label for="get_started_show"><?php echo app('translator')->get('modules.frontCms.getStartedButtonShow'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <div class="checkbox checkbox-info  col-md-10">
                                                                <input id="sign_in_show" name="sign_in_show" value="yes"
                                                                       <?php if($frontDetail->sign_in_show == "yes"): ?> checked
                                                                       <?php endif; ?>
                                                                       type="checkbox">
                                                                <label for="sign_in_show"><?php echo app('translator')->get('modules.frontCms.singInButtonShow'); ?></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>





                                                <h4 id="social-links"><?php echo app('translator')->get('modules.frontCms.socialLinks'); ?></h4>
                                                <hr>
                                                <span class="text-danger"><?php echo app('translator')->get('modules.frontCms.socialLinksNote'); ?></span><br><br>
                                                <div class="row">
                                                    <?php $__currentLoopData = json_decode($frontDetail->social_links); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                                                        <div class="col-sm-12 col-md-3 col-xs-12">
                                                            <div class="form-group">
                                                                <label for="<?php echo e($link->name); ?>">
                                                                    <?php echo app('translator')->get('modules.frontCms.'.$link->name); ?>
                                                                </label>
                                                                <input
                                                                        class="form-control"
                                                                        id="<?php echo e($link->name); ?>"
                                                                        name="social_links[<?php echo e($link->name); ?>]"
                                                                        type="url"
                                                                        value="<?php echo e($link->link); ?>"
                                                                        placeholder="<?php echo app('translator')->get('modules.frontCms.enter'.ucfirst($link->name).'Link'); ?>">
                                                            </div>
                                                        </div>

                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </div>

                                                <button type="submit" id="save-form"
                                                        class="btn btn-success waves-effect waves-light m-r-10">
                                                    <?php echo app('translator')->get('app.update'); ?>
                                                </button>

                                                <?php echo Form::close(); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <!-- .row -->
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>

            </div>
        </div>


    </div>
    <!-- .row -->



<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')); ?>"></script>
<script>
    // Colorpicker
    $(".colorpicker").asColorPicker();
    $(".complex-colorpicker").asColorPicker({
        mode: 'complex'
    });
    $(".gradient-colorpicker").asColorPicker(
        // {
        //     mode: 'gradient'
        // }
    );
    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('super-admin.front-settings.update', $frontDetail->id)); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true,
        })
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/front-settings/new-theme/index.blade.php ENDPATH**/ ?>