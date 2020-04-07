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

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-inverse">
                <div class="panel-heading"><?php echo app('translator')->get('modules.accountSettings.updateTitle'); ?></div>

                <div class="vtabs customvtab m-t-10">

                    <?php echo $__env->make('sections.admin_setting_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <div class="tab-content">
                        <div id="vhome3" class="tab-pane active">
                            <div class="row">
                                <div class="col-sm-12 col-xs-12">
                                    <?php echo Form::open(['id'=>'editSettings','class'=>'ajax-form','method'=>'PUT']); ?>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company_name"><?php echo app('translator')->get('modules.accountSettings.companyName'); ?></label>
                                                <input type="text" class="form-control" id="company_name" name="company_name"
                                                       value="<?php echo e($global->company_name); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company_email"><?php echo app('translator')->get('modules.accountSettings.companyEmail'); ?></label>
                                                <input type="email" class="form-control" id="company_email" name="company_email"
                                                       value="<?php echo e($global->company_email); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="company_phone"><?php echo app('translator')->get('modules.accountSettings.companyPhone'); ?></label>
                                                <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                                       value="<?php echo e($global->company_phone); ?>">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.accountSettings.companyLogo'); ?></label>

                                                <div class="col-md-12">
                                                    <div class="fileinput fileinput-new" data-provides="fileinput">
                                                        <div class="fileinput-new thumbnail"
                                                             style="width: 150px; height: 100px;">
                                                            <img src="<?php echo e($global->logo_url); ?>"
                                                                 alt=""/>
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail"
                                                             style="max-width: 150px; max-height: 100px;"></div>
                                                        <div>
                                <span class="btn btn-info  btn-file">
                                    <span class="fileinput-new"> <?php echo app('translator')->get('app.selectImage'); ?> </span>
                                    <span class="fileinput-exists"> <?php echo app('translator')->get('app.change'); ?> </span>
                                    <input type="file" name="logo" id="logo"> </span>
                                                            <a href="javascript:;" class="btn btn-danger fileinput-exists"
                                                               data-dismiss="fileinput"> <?php echo app('translator')->get('app.remove'); ?> </a>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.accountSettings.companyWebsite'); ?></label>
                                                <input type="text" class="form-control" id="website" name="website"
                                                       value="<?php echo e($global->website); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.companyAddress'); ?></label>
                                                <textarea class="form-control" id="address" rows="5"
                                                          name="address"><?php echo e($global->address); ?></textarea>
                                            </div>
                                        </div>
                                    </div>




                                    <div class="row m-t-40">
                                        <hr>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.defaultCurrency'); ?></label>
                                                <select name="currency_id" id="currency_id" class="form-control">
                                                    <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option
                                                                <?php if($currency->id == $global->currency_id): ?> selected <?php endif; ?>
                                                        value="<?php echo e($currency->id); ?>"><?php echo e($currency->currency_symbol.' ('.$currency->currency_code.')'); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.defaultTimezone'); ?></label>
                                                <select name="timezone" id="timezone" class="form-control select2">
                                                    <?php $__currentLoopData = $timezones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tz): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option <?php if($global->timezone == $tz): ?> selected <?php endif; ?>><?php echo e($tz); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.dateFormat'); ?></label>
                                                <select name="date_format" id="date_format" class="form-control select2">
                                                    <option value="d-m-Y" <?php if($global->date_format == 'd-m-Y'): ?> selected <?php endif; ?> >d-m-Y (<?php echo e($dateObject->format('d-m-Y')); ?>) </option>
                                                    <option value="m-d-Y" <?php if($global->date_format == 'm-d-Y'): ?> selected <?php endif; ?> >m-d-Y (<?php echo e($dateObject->format('m-d-Y')); ?>) </option>
                                                    <option value="Y-m-d" <?php if($global->date_format == 'Y-m-d'): ?> selected <?php endif; ?> >Y-m-d (<?php echo e($dateObject->format('Y-m-d')); ?>) </option>
                                                    <option value="d.m.Y" <?php if($global->date_format == 'd.m.Y'): ?> selected <?php endif; ?> >d.m.Y (<?php echo e($dateObject->format('d.m.Y')); ?>) </option>
                                                    <option value="m.d.Y" <?php if($global->date_format == 'm.d.Y'): ?> selected <?php endif; ?> >m.d.Y (<?php echo e($dateObject->format('m.d.Y')); ?>) </option>
                                                    <option value="Y.m.d" <?php if($global->date_format == 'Y.m.d'): ?> selected <?php endif; ?> >Y.m.d (<?php echo e($dateObject->format('Y.m.d')); ?>) </option>
                                                    <option value="d/m/Y" <?php if($global->date_format == 'd/m/Y'): ?> selected <?php endif; ?> >d/m/Y (<?php echo e($dateObject->format('d/m/Y')); ?>) </option>
                                                    <option value="m/d/Y" <?php if($global->date_format == 'm/d/Y'): ?> selected <?php endif; ?> >m/d/Y (<?php echo e($dateObject->format('m/d/Y')); ?>) </option>
                                                    <option value="Y/m/d" <?php if($global->date_format == 'Y/m/d'): ?> selected <?php endif; ?> >Y/m/d (<?php echo e($dateObject->format('Y/m/d')); ?>) </option>
                                                    <option value="d-M-Y" <?php if($global->date_format == 'd-M-Y'): ?> selected <?php endif; ?> >d-M-Y (<?php echo e($dateObject->format('d-M-Y')); ?>) </option>
                                                    <option value="d/M/Y" <?php if($global->date_format == 'd/M/Y'): ?> selected <?php endif; ?> >d/M/Y (<?php echo e($dateObject->format('d/M/Y')); ?>) </option>
                                                    <option value="d.M.Y" <?php if($global->date_format == 'd.M.Y'): ?> selected <?php endif; ?> >d.M.Y (<?php echo e($dateObject->format('d.M.Y')); ?>) </option>
                                                    <option value="d-M-Y" <?php if($global->date_format == 'd-M-Y'): ?> selected <?php endif; ?> >d-M-Y (<?php echo e($dateObject->format('d-M-Y')); ?>) </option>
                                                    <option value="d M Y" <?php if($global->date_format == 'd M Y'): ?> selected <?php endif; ?> >d M Y (<?php echo e($dateObject->format('d M Y')); ?>) </option>
                                                    <option value="d F, Y" <?php if($global->date_format == 'd F, Y'): ?> selected <?php endif; ?> >d F, Y (<?php echo e($dateObject->format('d F, Y')); ?>) </option>
                                                    <option value="D/M/Y" <?php if($global->date_format == 'D/M/Y'): ?> selected <?php endif; ?> >D/M/Y (<?php echo e($dateObject->format('D/M/Y')); ?>) </option>
                                                    <option value="D.M.Y" <?php if($global->date_format == 'D.M.Y'): ?> selected <?php endif; ?> >D.M.Y (<?php echo e($dateObject->format('D.M.Y')); ?>) </option>
                                                    <option value="D-M-Y" <?php if($global->date_format == 'D-M-Y'): ?> selected <?php endif; ?> >D-M-Y (<?php echo e($dateObject->format('D-M-Y')); ?>) </option>
                                                    <option value="D M Y" <?php if($global->date_format == 'D M Y'): ?> selected <?php endif; ?> >D M Y (<?php echo e($dateObject->format('D M Y')); ?>) </option>
                                                    <option value="d D M Y" <?php if($global->date_format == 'd D M Y'): ?> selected <?php endif; ?> >d D M Y (<?php echo e($dateObject->format('d D M Y')); ?>) </option>
                                                    <option value="D d M Y" <?php if($global->date_format == 'D d M Y'): ?> selected <?php endif; ?> >D d M Y (<?php echo e($dateObject->format('D d M Y')); ?>) </option>
                                                    <option value="dS M Y" <?php if($global->date_format == 'dS M Y'): ?> selected <?php endif; ?> >dS M Y (<?php echo e($dateObject->format('dS M Y')); ?>) </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.timeFormat'); ?></label>
                                                <select name="time_format" id="time_format" class="form-control select2">
                                                    <option value="h:i A" <?php if($global->time_format == 'H:i A'): ?> selected <?php endif; ?> >12 Hour  (6:20 PM) </option>
                                                    <option value="h:i a" <?php if($global->time_format == 'H:i a'): ?> selected <?php endif; ?> >12 Hour  (6:20 pm) </option>
                                                    <option value="H:i" <?php if($global->time_format == 'H:i'): ?> selected <?php endif; ?> >24 Hour  (18:20) </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.weekStartFrom'); ?></label>
                                                <select name="week_start" id="week_start" class="form-control select2">
                                                    <option value="0" <?php if($global->week_start == '0'): ?> selected <?php endif; ?> >Sunday</option>
                                                    <option value="1" <?php if($global->week_start == '1'): ?> selected <?php endif; ?>>Monday </option>
                                                    <option value="2" <?php if($global->week_start == '2'): ?> selected <?php endif; ?>>Tuesday</option>
                                                    <option value="3" <?php if($global->week_start == '3'): ?> selected <?php endif; ?>>Wednesday</option>
                                                    <option value="4" <?php if($global->week_start == '4'): ?> selected <?php endif; ?>>Thursday</option>
                                                    <option value="5" <?php if($global->week_start == '5'): ?> selected <?php endif; ?>>Friday</option>
                                                    <option value="6" <?php if($global->week_start == '6'): ?> selected <?php endif; ?>>Saturday</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="address"><?php echo app('translator')->get('modules.accountSettings.changeLanguage'); ?></label>
                                                <select name="locale" id="locale" class="form-control select2">
                                                    <option <?php if($global->locale == "en"): ?> selected <?php endif; ?> value="en">English
                                                    </option>
                                                    <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($language->language_code); ?>" <?php if($global->locale == $language->language_code): ?> selected <?php endif; ?> ><?php echo e($language->language_name); ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="latitude"><?php echo app('translator')->get('app.latitude'); ?></label>
                                                <input type="text" class="form-control" id="latitude" name="latitude"
                                                       value="<?php echo e($global->latitude); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label for="longitude"><?php echo app('translator')->get('app.longitude'); ?></label>
                                                <input type="text" class="form-control" id="longitude" name="longitude"
                                                       value="<?php echo e($global->longitude); ?>">
                                            </div>
                                        </div>
                                    </div>




                                    <button type="submit" id="save-form"
                                            class="btn btn-success waves-effect waves-light m-r-10">
                                        <?php echo app('translator')->get('app.update'); ?>
                                    </button>

                                    <?php echo Form::close(); ?>

                                </div>
                            </div>

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
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>


<script>
    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.settings.update', [$global->id])); ?>',
            container: '#editSettings',
            type: "POST",
            redirect: true,
            file: true
        })
    });

</script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/settings/edit.blade.php ENDPATH**/ ?>