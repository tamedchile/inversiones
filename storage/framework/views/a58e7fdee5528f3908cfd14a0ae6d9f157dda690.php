<li class="top-notifications">
    <div class="message-center">
        <a href="javascript:;" class="show-all-notifications">
            <div class="user-img">
                <span class="btn btn-circle btn-success"><i class="icon-layers"></i></span>
            </div>
            <div class="mail-contnet">
                <span class="mail-desc m-0">New project assigned</span> <span class="time"><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?></span>
            </div>
        </a>
    </div>
</li>
<?php /**PATH D:\laragon\www\inversiones\resources\views/notifications/member/new_project_member.blade.php ENDPATH**/ ?>