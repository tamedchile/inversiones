<div class="media">
    <div class="media-body">
        <h5 class="media-heading"><span class="btn btn-circle btn-success"><i class="icon-envelope"></i></span> New message received.</h5>
    </div>
    <h6><i><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?></i></h6>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/client/detail_new_chat.blade.php ENDPATH**/ ?>