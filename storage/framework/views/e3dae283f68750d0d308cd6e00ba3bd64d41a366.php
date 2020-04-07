<div class="panel panel-default">
    <div class="panel-heading "><i class="icon-note"></i> <?php echo e(count($user->unreadNotifications)); ?> Unread Notifications
        <div class="panel-action">
            <a href="javascript:;" class="close" data-dismiss="modal"><i class="ti-close"></i></a>
        </div>
    </div>
    <div class="panel-wrapper collapse in">
        <div class="panel-body">
            <div class="col-md-12">
                <?php $__currentLoopData = $user->unreadNotifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if(view()->exists('notifications.member.detail_'.snake_case(class_basename($notification->type)))): ?>
                        <?php echo $__env->make('notifications.member.detail_'.snake_case(class_basename($notification->type)), \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

        </div>
    </div>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/member/all_notifications.blade.php ENDPATH**/ ?>