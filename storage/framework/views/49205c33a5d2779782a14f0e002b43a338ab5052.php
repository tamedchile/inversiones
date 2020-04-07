<div class="media">
    <div class="media-body">
        <h5 class="media-heading"><span class="btn btn-circle btn-warning"><i class="icon-note"></i></span> New ticket - <?php echo e(ucfirst($notification->data['subject'])); ?></h5>
    </div>
    <h6><i><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?></i></h6>
</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/member/detail_new_ticket.blade.php ENDPATH**/ ?>