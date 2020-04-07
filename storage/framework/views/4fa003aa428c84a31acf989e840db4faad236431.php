<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h4 class="modal-title"><i class="icon-note"></i> <?php echo app('translator')->get("modules.messages.startConversation"); ?></h4>
</div>
<div class="modal-body">
    <div class="portlet-body">

        <?php echo Form::open(['id'=>'createChat','class'=>'ajax-form','method'=>'POST']); ?>

        <div class="form-body">
            <?php if($messageSetting->allow_client_admin == 'yes'): ?>
            <div class="form-group">
                <div class="radio-list">
                    <label class="radio-inline p-0">
                        <div class="radio radio-info">
                            <input type="radio" name="user_type" id="user_employee" value="employee" checked>
                            <label for="user_employee"><?php echo app('translator')->get('app.menu.employees'); ?></label>
                        </div>
                    </label>
                    <label class="radio-inline">
                        <div class="radio radio-info">
                            <input type="radio" name="user_type" id="user_client" value="client">
                            <label for="user_client"><?php echo app('translator')->get('app.menu.clients'); ?></label>
                        </div>
                    </label>
                </div>
            </div>
            <?php endif; ?>

            <div class="row">
                <div class="col-xs-12 " id="member-list">
                    <div class="form-group">
                        <label><?php echo app('translator')->get("modules.messages.chooseMember"); ?></label>
                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get("modules.messages.chooseMember"); ?>" name="user_id" id="user_id">
                            <?php $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                        value="<?php echo e($member->id); ?>"><?php echo e(ucwords($member->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <?php if($messageSetting->allow_client_admin == 'yes'): ?>
                <div class="col-xs-12 " id="client-list" style="display: none">
                    <div class="form-group">
                        <label><?php echo app('translator')->get("modules.client.clientName"); ?></label>
                        <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get("modules.client.clientName"); ?>" name="client_id" id="client_id">
                            <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option
                                        value="<?php echo e($client->id); ?>"><?php echo e(ucwords($client->name)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
                <?php endif; ?>
            </div>

            <div class="row">
                <div class="col-xs-12">
                    <div class="form-group">
                        <label for=""><?php echo app('translator')->get("modules.messages.message"); ?></label>
                        <textarea name="message" class="form-control" id="message" rows="3"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-actions m-t-20">
            <button type="button" id="post-message" class="btn btn-success"><i class="fa fa-send-o"></i> <?php echo app('translator')->get("modules.messages.send"); ?></button>
        </div>
        <?php echo Form::close(); ?>

    </div>
</div>


<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>

<script>

    $('.select2').select2();

    $("input[name=user_type]").click(function () {
        if($(this).val() == 'client'){
            $('#member-list').hide();
            $('#client-list').show();
        }
        else{
            $('#client-list').hide();
            $('#member-list').show();
        }
    })

    $('#post-message').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('admin.user-chat.message-submit')); ?>',
            container: '#createChat',
            type: "POST",
            data: $('#createChat').serialize(),
            success: function (response) {
                if (response.status == 'success') {
                    var blank = "";
                    $('#submitTexts').val('');

                    //getting values by input fields
                    var dpID = $('#dpID').val();
                    var dpName = $('#dpName').val();


                    //set chat data
                    getChatData(dpID, dpName);

                    //set user list
                    $('.userList').html(response.userList);

                    //set active user
                    if (dpID) {
                        $('#dp_' + dpID + 'a').addClass('active');
                    }

                    $('#newChatModal').modal('hide');
                }
            }
        })
    });
</script><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/user-chat/create.blade.php ENDPATH**/ ?>