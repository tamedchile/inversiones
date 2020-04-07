<li class="top-notifications">
    <div class="message-center">
        <a href="javascript:;" class="show-all-notifications">
            <div class="user-img">
                <span class="btn btn-circle btn-success"><i class="ti-layout-list-thumb"></i></span>
            </div>
            <div class="mail-contnet">
                <span class="mail-desc m-0"><?php echo e(ucfirst($notification->data['heading'])); ?> - <?php echo app('translator')->get('email.taskComplete.subject'); ?>!</span> <span class="time"><?php echo e(\Carbon\Carbon::parse($notification->data['completed_on'])->diffForHumans()); ?></span>
            </div>
        </a>
    </div>
</li><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/client/task_completed.blade.php ENDPATH**/ ?>