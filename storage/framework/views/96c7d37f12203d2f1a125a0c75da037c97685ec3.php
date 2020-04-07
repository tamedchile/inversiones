<?php $__empty_1 = true; $__currentLoopData = $chatDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $chatDetail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <li class="<?php if($chatDetail->from == $user->id): ?> odd <?php else: ?>  <?php endif; ?>">
        <div class="chat-image"> <img alt="user" src="<?php echo e($chatDetail->fromUser->image_url); ?>"> </div>
        <div class="chat-body">
            <div class="chat-text">
                <h4><?php if($chatDetail->from == $user->id): ?> you <?php else: ?> <?php echo e($chatDetail->fromUser->name); ?> <?php endif; ?></h4>
                <p><?php echo e($chatDetail->message); ?></p>
                <b><?php echo e($chatDetail->created_at->timezone($global->timezone)->format('d M, h:i A')); ?></b>
            </div>
        </div>
    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li><div class="message"><?php echo app('translator')->get('messages.noMessage'); ?></div></li>
<?php endif; ?>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/user-chat/ajax-chat-list.blade.php ENDPATH**/ ?>