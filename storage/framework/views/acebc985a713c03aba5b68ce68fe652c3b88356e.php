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
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.profile.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php echo Form::open(['id'=>'updateProfile','class'=>'ajax-form','method'=>'PUT']); ?>

                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-4 ">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('modules.profile.yourName'); ?></label>
                                                    <input type="text" name="name" id="name"
                                                           class="form-control" value="<?php echo e($userDetail->name); ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('modules.profile.yourEmail'); ?></label>
                                                    <input type="email" name="email" id="email"
                                                           class="form-control" value="<?php echo e($userDetail->email); ?>">
                                                </div>
                                            </div>
                                            <!--/span-->
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label><?php echo app('translator')->get('modules.profile.yourPassword'); ?></label>
                                                    <input type="password" name="password" id="password"
                                                           class="form-control">
                                                    <span class="help-block"> <?php echo app('translator')->get('modules.profile.passwordNote'); ?></span>
                                                </div>
                                            </div>
                                        </div>


























                                        <!--/row-->

                                        <div class="row">
                                            <div class="col-md-4">
                                                <label><?php echo app('translator')->get('modules.profile.profilePicture'); ?></label>

                                                <div class="form-group">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                             style="width: 200px; height: 150px;">
                                                            <img src="<?php echo e($userDetail->image_url); ?>" alt=""/>
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
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="control-label"><?php echo app('translator')->get('modules.profile.yourAddress'); ?></label>
                                        <textarea name="address" id="address" rows="5"
                                                  class="form-control"><?php if(!empty($employeeDetail)): ?><?php echo e($employeeDetail->address); ?><?php endif; ?></textarea>
                                                </div>
                                            </div>


                                        </div>
                                        <!--/span-->


                                    </div>
                                    <div class="form-actions">
                                        <button type="submit" id="save-form-2" class="btn btn-success"><i
                                                    class="fa fa-check"></i>
                                            <?php echo app('translator')->get('app.update'); ?>
                                        </button>

                                    </div>
                                    <?php echo Form::close(); ?>

                                </div>
                            </div>

                            <div class="clearfix"></div>
                        </div>
                    </div>

                </div>
            </div>    <!-- .row -->
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script>
    $('#save-form-2').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.profile.update', [$userDetail->id])); ?>',
            container: '#updateProfile',
            type: "POST",
            redirect: true,
            file: (document.getElementById("image").files.length == 0) ? false : true,
            data: $('#updateProfile').serialize(),
            success: function (data) {
                if (data.status == 'success') {
                    window.location.reload();
                }
            }
        })
    });
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/profile/index.blade.php ENDPATH**/ ?>