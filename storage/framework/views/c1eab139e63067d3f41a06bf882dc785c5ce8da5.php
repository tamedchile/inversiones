<?php ($updateVersionInfo = \Froiden\Envato\Functions\EnvatoUpdate::updateVersionInfo()); ?>
<?php ($envatoUpdateCompanySetting = \Froiden\Envato\Functions\EnvatoUpdate::companySetting()); ?>
<div class="table-responsive">

    <table class="table table-bordered">
        <thead>
        <th><?php echo app('translator')->get('modules.update.systemDetails'); ?></th>
        </thead>
        <tbody>
        <tr>
            <td>App Version </td>
            <td><?php echo e($updateVersionInfo['appVersion']); ?></td>
        </tr>
        <tr>
            <td>Laravel Version</td>
            <td><?php echo e($updateVersionInfo['laravelVersion']); ?></td>
        </tr>
        <td>PHP Version

        <td>
            <?php if(version_compare(PHP_VERSION, '7.2.5') >= 0): ?>
                <?php echo e(phpversion()); ?> <i class="fa fa fa-check-circle text-success"></i>
            <?php else: ?>
                <?php echo e(phpversion()); ?> <i  data-toggle="tooltip" data-original-title="<?php echo app('translator')->get('messages.phpUpdateRequired'); ?>" class="fa fa fa-warning text-danger"></i>
            <?php endif; ?>
        </td>
        </td>
        <?php if(!is_null($envatoUpdateCompanySetting->purchase_code)): ?>
            <tr>
                <td>Envato Purchase code </td>
                <td><?php echo e($envatoUpdateCompanySetting->purchase_code); ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/vendor/froiden-envato/update/version_info.blade.php ENDPATH**/ ?>