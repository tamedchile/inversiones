<li class="top-notifications">
    <div class="message-center">
        <a href="javascript:;" class="show-all-notifications">
            <div class="user-img">
                <span class="btn btn-circle btn-warning"><i class="icon-note"></i></span>
            </div>
            <div class="mail-contnet">
                <span class="mail-desc m-0">New ticket request received.</span> <span class="time"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?></span>
            </div>
        </a>
    </div>
</li>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/member/new_ticket.blade.php ENDPATH**/ ?>