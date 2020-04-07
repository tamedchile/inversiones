<div class="media">
    <div class="media-body">
        <h5 class="media-heading"><span class="btn btn-circle btn-success"><i class="ti-layout-list-thumb"></i></span> <?php echo e(ucfirst($notification->data['heading'])); ?> - <?php echo app('translator')->get('email.taskComplete.subject'); ?></h5>
        <?php if(isset($notification->data['description'])): ?>  <?php echo ucfirst($notification->data['description']); ?> <?php endif; ?> </div>
    <h6><i><?php if($notification->data['completed_on']): ?><?php echo e(\Carbon\Carbon::parse($notification->data['completed_on'])->diffForHumans()); ?> <?php endif; ?></i></h6>
</div><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/notifications/member/detail_task_completed.blade.php ENDPATH**/ ?>