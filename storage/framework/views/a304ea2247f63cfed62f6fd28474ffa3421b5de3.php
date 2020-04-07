<?php $__env->startSection('other-section'); ?>

<ul class="nav tabs-vertical">
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.settings.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.settings.index')); ?>"><?php echo app('translator')->get('app.global'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></a></li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.email-settings.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.email-settings.index')); ?>"><?php echo app('translator')->get('app.email'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></a></li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.push-notification-settings.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.push-notification-settings.index')); ?>"><?php echo app('translator')->get('app.menu.pushNotifications'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></a>
    </li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.language-settings.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.language-settings.index')); ?>"><?php echo app('translator')->get('app.language'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></a>
    </li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.currency.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.currency.index')); ?>"><?php echo app('translator')->get('app.menu.currencySettings'); ?></a></li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.stripe-settings.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.stripe-settings.index')); ?>"><?php echo app('translator')->get('app.menu.paymentGatewayCredential'); ?></a></li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.package-settings.index'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.package-settings.index')); ?>"><?php echo app('translator')->get('app.freeTrial'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></a></li>
    <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.custom-modules.index' || \Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.custom-modules.create'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.custom-modules.index')); ?>"><?php echo app('translator')->get('app.menu.customModule'); ?></a></li>
        <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.storage-settings.index'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('super-admin.storage-settings.index')); ?>"><?php echo app('translator')->get('app.menu.storageSettings'); ?></a></li>
    <?php if($global->system_update == 1): ?>
        <li class="tab <?php if(\Illuminate\Support\Facades\Route::currentRouteName() == 'super-admin.update-settings.index'): ?> active <?php endif; ?>">
            <a href="<?php echo e(route('super-admin.update-settings.index')); ?>"><?php echo app('translator')->get('app.menu.updates'); ?></a>
        </li>
    <?php endif; ?>
</ul>

<script src="<?php echo e(asset('plugins/bower_components/jquery/dist/jquery.min.js')); ?>"></script>
<script>
    var screenWidth = $(window).width();
    if(screenWidth <= 768){

        $('.tabs-vertical').each(function() {
            var list = $(this), select = $(document.createElement('select')).insertBefore($(this).hide()).addClass('settings_dropdown form-control');

            $('>li a', this).each(function() {
                var target = $(this).attr('target'),
                    option = $(document.createElement('option'))
                        .appendTo(select)
                        .val(this.href)
                        .html($(this).html())
                        .click(function(){
                            if(target==='_blank') {
                                window.open($(this).val());
                            }
                            else {
                                window.location.href = $(this).val();
                            }
                        });

                if(window.location.href == option.val()){
                    option.attr('selected', 'selected');
                }
            });
            list.remove();
        });

        $('.settings_dropdown').change(function () {
            window.location.href = $(this).val();
        })

    }

</script>
<?php $__env->stopSection(); ?>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/sections/super_admin_setting_menu.blade.php ENDPATH**/ ?>