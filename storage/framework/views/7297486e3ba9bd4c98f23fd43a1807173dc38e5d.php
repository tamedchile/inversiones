<div class="media">
    <div class="media-body">
        <h5 class="media-heading"><span class="btn btn-circle btn-success"><i class="ti-layout-list-thumb"></i></span> <?php echo e(ucfirst($notification->data['heading'])); ?> - <?php echo app('translator')->get('email.taskUpdate.subject'); ?></h5>
        <?php if(isset($notification->data['description'])): ?> <?php echo ucwords($notification->data['description']); ?> <?php endif; ?> </div>
    <h6><i><?php echo e(\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $notification->created_at)->diffForHumans()); ?> </i></h6>
</div><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/client/detail_task_updated.blade.php ENDPATH**/ ?>