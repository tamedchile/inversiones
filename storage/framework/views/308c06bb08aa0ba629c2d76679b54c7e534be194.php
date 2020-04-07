<?php $__env->startSection('other-section'); ?>
<ul class="nav tabs-vertical">
    <li class="tab">
        <a href="<?php echo e(route('super-admin.theme-settings')); ?>" class="text-danger"><i class="ti-arrow-left"></i> <?php echo app('translator')->get('app.front'); ?> <?php echo app('translator')->get('app.menu.settings'); ?></a></li>
        <li class="tab <?php if(isset($type) && $type == 'image'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.feature-settings.index')); ?>?type=image"><?php echo app('translator')->get('app.featureWithImage'); ?></a></li>

    <li class="tab <?php if(isset($type) && $type == 'icon'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.feature-settings.index')); ?>?type=icon"><?php echo app('translator')->get('app.featureWithIcon'); ?></a></li>

    <li class="tab <?php if(isset($type) && $type == 'task'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.feature-settings.index')); ?>?type=task"><?php echo app('translator')->get('app.task'); ?> <?php echo app('translator')->get('app.section'); ?></a></li>

    <li class="tab <?php if(isset($type) && $type == 'team'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.feature-settings.index')); ?>?type=team"><?php echo app('translator')->get('app.team'); ?> <?php echo app('translator')->get('app.section'); ?></a></li>

    <li class="tab <?php if(isset($type) && $type == 'bills'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.feature-settings.index')); ?>?type=bills"><?php echo app('translator')->get('app.bills'); ?> <?php echo app('translator')->get('app.section'); ?></a></li>
    <li class="tab <?php if(isset($type) && $type == 'apps'): ?> active <?php endif; ?>">
        <a href="<?php echo e(route('super-admin.feature-settings.index')); ?>?type=apps"><?php echo app('translator')->get('app.apps'); ?> <?php echo app('translator')->get('app.section'); ?></a></li>

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
<?php $__env->stopSection(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/sections/saas/feature_page_setting_menu.blade.php ENDPATH**/ ?>