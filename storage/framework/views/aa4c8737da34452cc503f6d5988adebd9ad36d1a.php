<?php $__empty_1 = true; $__currentLoopData = $userLists; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $userList): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>

    <li id="dp_<?php echo e($userList->id); ?>">
        <a href="javascript:void(0)" id="dpa_<?php echo e($userList->id); ?>"
           class="<?php if(isset($userID) && $userID == $userList->id): ?> active <?php endif; ?>"
           onclick="getChatData('<?php echo e($userList->id); ?>', '<?php echo e($userList->name); ?>')">

            <?php if(is_null($userList->image)): ?>
                <img src="<?php echo e(asset('img/default-profile-3.png')); ?>" alt="user-img"
                     class="img-circle">
            <?php else: ?>
                <img src="<?php echo e(asset_url('avatar/' . $userList->image)); ?>" alt="user-img"
                     class="img-circle">
            <?php endif; ?>
                                            <span <?php if($userList->message_seen == 'no' && $userList->user_one != $user->id): ?> class="font-bold" <?php endif; ?>><?php echo e($userList->name); ?>

                                                <small class="text-simple"><?php if($userList->last_message): ?><?php echo e(\Carbon\Carbon::parse($userList->last_message)->diffForHumans()); ?> <?php endif; ?>
                                                    <?php if(\App\User::isAdmin($userList->id)): ?>
                                                        <label class="btn btn-danger btn-xs btn-outline">Admin</label>
                                                    <?php elseif(\App\User::isClient($userList->id)): ?>
                                                        <label class="btn btn-success btn-xs btn-outline">Client</label>
                                                    <?php else: ?>
                                                        <label class="btn btn-warning btn-xs btn-outline">Employee</label>
                                                    <?php endif; ?>
                                                </small>
                                            </span>
        </a>
    </li>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
    <li>
        <a href="javascript:void(0)">
            <span>
                <?php echo app('translator')->get('messages.noConversation'); ?>
            </span>
        </a>
    </li>
<?php endif; ?>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/user-chat/ajax-user-list.blade.php ENDPATH**/ ?>