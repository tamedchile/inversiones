<div class="panel-body b-b">

    <div class="row">

        <div class="col-xs-2 col-md-1">
            <?php echo '<img src="'.$reply->user->image_url.'" alt="user" class="img-circle" width="40" height="40">'; ?>

        </div>
        <div class="col-xs-10 col-md-11">
            <h4 class="m-t-0"><a
                        <?php if($reply->user->hasRole('employee')): ?>
                        href="<?php echo e(route('admin.employees.show', $reply->user_id)); ?>"
                        <?php elseif($reply->user->hasRole('client')): ?>
                        href="<?php echo e(route('admin.clients.show', $reply->user_id)); ?>"
                        <?php endif; ?>
                        class="text-inverse"><?php echo e(ucwords($reply->user->name)); ?> <span
                            class="text-muted font-12"><?php echo e($reply->created_at->format($global->date_format.' '.$global->time_format)); ?></span></a>
            </h4>

            <div class="font-light">
                <?php echo ucfirst(nl2br($reply->message)); ?>

            </div>
        </div>


    </div>
    <!--/row-->

</div>
<?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/tickets/last-message.blade.php ENDPATH**/ ?>