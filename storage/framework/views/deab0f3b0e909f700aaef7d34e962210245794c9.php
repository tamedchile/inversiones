<li class="top-notifications">
    <div class="message-center">
        <a href="javascript:;" class="show-all-notifications">
            <div class="user-img">
                <span class="btn btn-circle btn-success"><i class="icon-envelope"></i></span>
            </div>
            <div class="mail-contnet">
                <span class="mail-desc m-0">You have received a new message.</span> <span class="time"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?></span>
            </div>
        </a>
    </div>
</li>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/client/new_chat.blade.php ENDPATH**/ ?>