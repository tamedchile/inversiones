    <?php ($envatoUpdateCompanySetting = \Froiden\Envato\Functions\EnvatoUpdate::companySetting()); ?>

    <?php if(!is_null($envatoUpdateCompanySetting->supported_until)): ?>
        <div class="col-md-12" id="support-div">
            <?php if(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->isPast()): ?>
                <div class="col-md-12 alert alert-danger ">
                    <div class="col-md-6">
                        Your support has been expired on <b><span
                                    id="support-date"><?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->format('d M, Y')); ?></span></b>
                    </div>
                    <div class="col-md-6 text-right">
                        <a href="<?php echo e(config('froiden_envato.envato_product_url')); ?>" target="_blank"
                           class="btn btn-inverse btn-sm">Renew support now <i class="fa fa-shopping-cart"></i></a>
                        <a href="javascript:;" onclick="getPurchaseData();" class="btn btn-inverse btn-sm">Refresh
                            <i class="fa fa-refresh"></i></a>
                    </div>
                </div>

            <?php else: ?>
                <div class="col-md-12 alert alert-info">
                    <div class="col-md-6">
                        Your support will expire on <b><span
                                    id="support-date"><?php echo e(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->format('d M, Y')); ?></span></b>
                    </div>

                    <?php if(\Carbon\Carbon::parse($envatoUpdateCompanySetting->supported_until)->diffInDays() < 30): ?>
                        <div class="col-md-6 text-right">
                            <a href="<?php echo e(config('froiden_envato.envato_product_url')); ?>" target="_blank"
                               class="btn btn-inverse btn-sm">Extend Now <i class="fa fa-shopping-cart"></i></a>
                            <a href="javascript:;" onclick="getPurchaseData();" class="btn btn-inverse btn-small btn-sm">Refresh
                                <i class="fa fa-refresh"></i></a>
                        </div>
                    <?php endif; ?>

                </div>

            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?php ($updateVersionInfo = \Froiden\Envato\Functions\EnvatoUpdate::updateVersionInfo()); ?>
    <?php if(isset($updateVersionInfo['lastVersion'])): ?>

        <div class="alert alert-danger col-md-12">
            <p> <?php echo app('translator')->get('messages.updateAlert'); ?></p>
            <p><?php echo app('translator')->get('messages.updateBackupNotice'); ?></p>
        </div>

        <div id="update-area" class="m-t-20 m-b-20 col-md-12 white-box hide">
            Loading...
        </div>

        <div class="alert alert-info col-md-12">
            <div class="col-md-9"><i class="ti-gift"></i> <?php echo app('translator')->get('modules.update.newUpdate'); ?> <label
                        class="label label-success"><?php echo e($updateVersionInfo['lastVersion']); ?></label><br><br>
                <h5 class="text-white font-bold"><label class="label label-danger">ALERT</label>You will get logged
                    out after update. Login again to use the application.</h5>
                <span class="font-12 text-warning"><?php echo app('translator')->get('modules.update.updateAlternate'); ?></span>
            </div>
            <div class="col-md-3 text-center">
                <a id="update-app" href="javascript:;"
                   class="btn btn-success btn-small"><?php echo app('translator')->get('modules.update.updateNow'); ?> <i
                            class="fa fa-download"></i></a>
                <br><br> OR <br><br>
                <a href="<?php echo e(route('super-admin.update-settings.manual')); ?>"
                   class="btn btn-inverse btn-small"><?php echo app('translator')->get('modules.update.updateManual'); ?> <i
                            class="fa fa-refresh"></i></a>
            </div>

            <div class="col-md-12">
                <p><?php echo $updateVersionInfo['updateInfo']; ?></p>
            </div>
        </div>

    <?php else: ?>
        <div class="col-md-12">
            <div class="alert alert-success ">
                You have latest version of this app.
            </div>

        </div>
    <?php endif; ?>

<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/vendor/froiden-envato/update/update_blade.blade.php ENDPATH**/ ?>