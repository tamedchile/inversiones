<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('super-admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('super-admin.companies.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.edit'); ?></li>
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
                <div class="panel-heading"><?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('app.company'); ?> [ <?php echo e($company->company_name); ?> ]
                    <?php ($class = ($company->status == 'active') ? 'label-custom' : 'label-danger'); ?>
                    <span class="label <?php echo e($class); ?>"><?php echo e(ucfirst($company->status)); ?></span>
                </div>
                <div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
                        <?php echo Form::open(['id'=>'updateCompany','class'=>'ajax-form','method'=>'PUT', 'enctype' => 'multipart/form-data']); ?>

                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_name" class="required"><?php echo app('translator')->get('modules.accountSettings.companyName'); ?></label>
                                        <input type="text" class="form-control" id="company_name" name="company_name"
                                               value="<?php echo e($company->company_name ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_email" class="required"><?php echo app('translator')->get('modules.accountSettings.companyEmail'); ?></label>
                                        <input type="email" class="form-control" id="company_email" name="company_email"
                                               value="<?php echo e($company->company_email ?? ''); ?>">
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="company_phone" class="required"><?php echo app('translator')->get('modules.accountSettings.companyPhone'); ?></label>
                                        <input type="tel" class="form-control" id="company_phone" name="company_phone"
                                               value="<?php echo e($company->company_phone ?? ''); ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.accountSettings.companyWebsite'); ?></label>
                                        <input type="text" class="form-control" id="website" name="website"
                                               value="<?php echo e($company->website ?? ''); ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="exampleInputPassword1"><?php echo app('translator')->get('modules.accountSettings.companyLogo'); ?></label>

                                        <div class="col-md-12">
                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-new thumbnail"
                                                     style="width: 250px; height: 80px;">
                                                    <img src="<?php echo e($company->logo_url); ?>" alt=""/>
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail"
                                                     style="max-width: 250px; max-height: 80px;"></div>
                                                <div>
                                <span class="btn btn-info btn-file">
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

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="address" class="required"><?php echo app('translator')->get('modules.accountSettings.companyAddress'); ?></label>
                                        <textarea class="form-control" id="address" rows="5"
                                                  name="address"><?php echo e($company->address); ?></textarea>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->get('modules.accountSettings.defaultCurrency'); ?></label>
                                        <select name="currency_id" id="currency_id" class="form-control">
                                            <?php $__currentLoopData = $currencies; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $currency): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option
                                                        <?php if($currency->id == $company->currency_id): ?> selected <?php endif; ?>
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
                                                <option <?php if($company->timezone == $tz): ?> selected <?php endif; ?>><?php echo e($tz); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="address"><?php echo app('translator')->get('modules.accountSettings.changeLanguage'); ?></label>
                                        <select name="locale" id="locale" class="form-control select2">
                                            <option <?php if($company->locale == "en"): ?> selected <?php endif; ?> value="en">English
                                            </option>
                                            <?php $__currentLoopData = $languageSettings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $language): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <option value="<?php echo e($language->language_code); ?>" <?php if($company->locale == $language->language_code): ?> selected <?php endif; ?> ><?php echo e($language->language_name ?? ''); ?></option>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label><?php echo app('translator')->get('app.status'); ?></label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">-</option>
                                            <option value="active" <?php if($company->status == 'active'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.active'); ?></option>
                                            <option value="inactive" <?php if($company->status == 'inactive'): ?> selected <?php endif; ?>><?php echo app('translator')->get('app.inactive'); ?></option>
                                            <option value="license_expired" <?php if($company->status == 'license_expired'): ?> selected <?php endif; ?>><?php echo app('translator')->get('modules.dashboard.licenseExpired'); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <?php if(($companyUser)): ?>
                                <h3 class="box-title"><?php echo app('translator')->get('modules.company.accountSetup'); ?></h3>
                                <hr>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"><?php echo app('translator')->get('modules.employees.employeeEmail'); ?></label>
                                                <input type="email" class="form-control" id="email" name="email"
                                                       value="<?php echo e($companyUser->email); ?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email"><?php echo app('translator')->get('modules.employees.employeePassword'); ?></label>
                                                <input type="password" class="form-control" id="password" name="password" value="">
                                                <span class="help-block"> <?php echo app('translator')->get('modules.employees.updateAdminPasswordNote'); ?></span>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                             <?php endif; ?>
                        <div class="form-actions">
                            <button type="submit" id="save-form" class="btn btn-success"> <i class="fa fa-check"></i> <?php echo app('translator')->get('app.update'); ?></button>
                            <a href="<?php echo e(route('super-admin.companies.index')); ?>" class="btn btn-default"><?php echo app('translator')->get('app.back'); ?></a>
                        </div>
                        <?php echo Form::close(); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>

    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script>
        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('super-admin.companies.update', [$company->id])); ?>',
                container: '#updateCompany',
                type: "POST",
                redirect: true,
                file: true
            })
        });

        $(".select2").select2({
            formatNoMatches: function () {
                return "<?php echo e(__('messages.noRecordFound')); ?>";
            }
        });

    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.super-admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/super-admin/companies/edit.blade.php ENDPATH**/ ?>