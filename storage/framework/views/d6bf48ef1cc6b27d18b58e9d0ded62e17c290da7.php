<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e($pageTitle); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo e($pageTitle); ?></div>

                <div class="vtabs customvtab m-t-10">
                    <?php echo $__env->make('sections.gdpr_settings_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h3 class="box-title m-b-0">General GDPR Settings</h3>
                                    <div class="row b-t m-t-20 p-10">
                                        <div class="col-md-12">
                                            <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'POST']); ?>

                                            <label for="">Enable GDPR</label>
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio"
                                                           class="checkbox"
                                                           <?php if($gdprSetting->enable_gdpr): ?> checked <?php endif; ?>
                                                           value="1" name="enable_gdpr">Yes
                                                </label>
                                                <label class="radio-inline m-l-10">
                                                    <input type="radio"
                                                           <?php if($gdprSetting->enable_gdpr==0): ?> checked <?php endif; ?>
                                                           value="0" name="enable_gdpr">No
                                                </label>


                                            </div>
                                            <hr>
                                            <label for="">Show GDPR link in customers area navigation</label>
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio"
                                                           class="checkbox"
                                                           <?php if($gdprSetting->show_customer_area==1): ?> checked <?php endif; ?>
                                                           value="1" name="show_customer_area">Yes
                                                </label>
                                                <label class="radio-inline m-l-10">
                                                    <input type="radio"
                                                           <?php if($gdprSetting->show_customer_area==0): ?> checked <?php endif; ?>
                                                           value="0" name="show_customer_area">No
                                                </label>


                                            </div> <hr>
                                            <label for="">Show GDPR link in customers area footer</label>
                                            <div class="form-group">
                                                <label class="radio-inline">
                                                    <input type="radio"
                                                           class="checkbox"
                                                           <?php if($gdprSetting->show_customer_footer==1): ?> checked <?php endif; ?>
                                                           value="1" name="show_customer_footer">Yes
                                                </label>
                                                <label class="radio-inline m-l-10">
                                                    <input type="radio"
                                                           <?php if($gdprSetting->show_customer_footer==0): ?> checked <?php endif; ?>
                                                           value="0" name="show_customer_footer">No
                                                </label>


                                            </div>
                                            <hr>
                                            <label for="">GDPR page top information block</label>
                                            <div class="form-group">
                                                <textarea name="top_information_block" id="" cols="30" rows="10" class="summernote">
                                                    <?php echo e($gdprSetting->top_information_block); ?>

                                                </textarea>

                                            </div>

                                            <button type="button" onclick="submitForm();" class="btn btn-primary">Submit</button>
                                            <?php echo Form::close(); ?>

                                        </div>
                                    </div>

                                </div>
                            </div>
                            <!-- /.row -->

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
    <script src="<?php echo e(asset('plugins/bower_components/summernote/dist/summernote.min.js')); ?>"></script>

    <script>
        $('.summernote').summernote({
            height: 200,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: false,
            toolbar: [
                // [groupName, [list of button]]
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough']],
                ['fontsize', ['fontsize']],
                ['para', ['ul', 'ol', 'paragraph']],
                ["view", ["fullscreen"]]
            ]
        });
        function submitForm(){

            $.easyAjax({
                url: '<?php echo e(route('admin.gdpr.store')); ?>',
                container: '#editSettings',
                type: "POST",
                data: $('#editSettings').serialize(),
            })
        }


    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/gdpr/index.blade.php ENDPATH**/ ?>