<?php $__env->startSection('page-title'); ?>
<div class="row bg-title top-left-part2" >
    <!-- .page title -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="circle w__40 light-blue"><?php echo e($user->pnombre[0]); ?></span><?php echo e($user->pnombre); ?> <?php echo e($user->papellido); ?></h4>
    </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
            <span id="ticket-status" class="m-r-5">
                <label class="label
                    <?php if($ticket->status == 'open'): ?>
                        label-danger
                <?php elseif($ticket->status == 'pending'): ?>
                        label-warning
                <?php elseif($ticket->status == 'resolved'): ?>
                        label-info
                <?php elseif($ticket->status == 'closed'): ?>
                        label-success
                <?php endif; ?>
                        "><?php echo e($ticket->status); ?></label>
            </span>
            <span class="text-info text-uppercase font-bold"><?php echo app('translator')->get('modules.tickets.ticket'); ?> # <?php echo e($ticket->id); ?></span>

            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('client.dashboard.index')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('client.tickets.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.update'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/html5-editor/bootstrap-wysihtml5.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <?php echo Form::open(['id'=>'updateTicket','class'=>'ajax-form','method'=>'PUT']); ?>

    <div class="form-body" style="margin-top: 101px">
        <div class="row">
            <div class="col-md-12">
                <div class="white-box">

                    <div class="panel-wrapper collapse in">

                            <div class="row">

                                <div class="col-md-12">
                                    <h4 class="text-capitalize text-info"><?php echo e($ticket->subject); ?></h4>

                                    <div class="font-12"><?php echo e($ticket->created_at->timezone($global->timezone)->format($global->date_format .' '.$global->time_format)); ?> </div>
                                </div>

                                <?php echo Form::hidden('status', $ticket->status, ['id' => 'status']); ?>


                            </div>
                            <!--/row-->


                        <div id="ticket-messages">

                            <?php $__empty_1 = true; $__currentLoopData = $ticket->reply; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="panel-body <?php if($reply->user->id == $user->id): ?> bg-owner-reply <?php else: ?> bg-other-reply <?php endif; ?>">

                                <div class="row m-b-5">

                                    <div class="col-xs-2 col-md-1">
                                        <?php echo '<img src="'.$reply->user->image_url.'" alt="user" class="img-circle" width="40" height="40">'; ?>

                                    </div>
                                    <div class="col-xs-8 col-md-10">
                                        <h4 class="m-t-0 font-bold"><a

                                                    class="text-inverse"><?php echo e(ucwords($reply->user->name)); ?> <span
                                                        class="text-muted font-12"><?php echo e($reply->created_at->timezone($global->timezone)->format($global->date_format.' '.$global->time_format)); ?></span></a>
                                        </h4>

                                        <div class="font-light">
                                            <?php echo ucfirst(nl2br($reply->message)); ?>

                                        </div>
                                    </div>


                                </div>
                                <!--/row-->

                                <?php if(sizeof($reply->files) > 0): ?>
                                    <div class="row" id="list">
                                        <ul class="list-group" id="files-list">
                                            <?php $__empty_2 = true; $__currentLoopData = $reply->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_2 = false; ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-9">
                                                            <?php echo e($file->filename); ?>

                                                        </div>
                                                        <div class="col-md-3">

                                                                <a target="_blank" href="<?php echo e($file->file_url); ?>"
                                                                    data-toggle="tooltip" data-original-title="View"
                                                                    class="btn btn-info btn-sm btn-outline"><i
                                                                            class="fa fa-search"></i></a>




                                                            <span class="clearfix m-l-10"><?php echo e($file->created_at->diffForHumans()); ?></span>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_2): ?>
                                                <li class="list-group-item">
                                                    <div class="row">
                                                        <div class="col-md-10">
                                                            <?php echo app('translator')->get('messages.noFileUploaded'); ?>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php endif; ?>

                                        </ul>
                                    </div>
                                    <!--/row-->
                                <?php endif; ?>

                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <div class="panel-body b-b">

                                <div class="row">

                                    <div class="col-md-12">
                                        <?php echo app('translator')->get('messages.noMessage'); ?>
                                    </div>

                                </div>
                                <!--/row-->

                            </div>
                        <?php endif; ?>
                        </div>

                        <?php if($ticket->status != 'closed'): ?>

                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label"><?php echo app('translator')->get('modules.tickets.reply'); ?> <span
                                                    class="text-danger">*</span></label></label>
                                        <textarea class="textarea_editor form-control" rows="10" name="message"
                                                  id="message"></textarea>
                                    </div>
                                </div>
                                <!--/span-->


                            </div>
                            <!--/row-->

                        </div>
                        <?php endif; ?>


                    </div>

                    <div class="text-right">
                        <?php if($ticket->status != 'closed'): ?>
                        <div class="btn-group dropup">
                            <button class="btn btn-danger m-r-10" id="close-ticket" type="button"><i class="fa fa-ban"></i> <?php echo app('translator')->get('modules.tickets.closeTicket'); ?> </button>
                            <button class="btn btn-success" id="submit-ticket" type="button"><?php echo app('translator')->get('app.submit'); ?> </button>
                        </div>
                        <?php else: ?>
                            <div class="btn-group dropup">
                                <button class="btn btn-success m-r-10" id="reopen-ticket" type="button"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('modules.tickets.reopenTicket'); ?> </button>
                            </div>
                        <?php endif; ?>

                    </div>
                </div>


            </div>
        </div>
        <!-- .row -->
    </div>
    <?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>


<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/html5-editor/wysihtml5-0.3.0.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/html5-editor/bootstrap-wysihtml5.js')); ?>"></script>
<script>
    $('.textarea_editor').wysihtml5();

    $('#submit-ticket').click(function () {

        $.easyAjax({
            url: '<?php echo e(route('client.tickets.update', $ticket->id)); ?>',
            container: '#updateTicket',
            type: "PUT",
            data: $('#updateTicket').serialize(),
            success: function (response) {
                if(response.status == 'success'){
                    $('#scroll-here').remove();
                    $('#ticket-messages').append(response.lastMessage);
                    $('#message').data("wysihtml5").editor.clear();

                    scrollChat();
                }
            }
        })
    });

    $('#close-ticket').click(function () {

        $.easyAjax({
            url: '<?php echo e(route('client.tickets.closeTicket', $ticket->id)); ?>',
            type: "POST",
            data: {'_token': "<?php echo e(csrf_token()); ?>"}
        })
    });

    $('#reopen-ticket').click(function () {

        $.easyAjax({
            url: '<?php echo e(route('client.tickets.reopenTicket', $ticket->id)); ?>',
            type: "POST",
            data: {'_token': "<?php echo e(csrf_token()); ?>"}
        })
    });

    function scrollChat() {
        $('#ticket-messages').animate({
            scrollTop: $('#ticket-messages')[0].scrollHeight
        }, 'slow');
    }

    scrollChat();
</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/client/tickets/edit.blade.php ENDPATH**/ ?>