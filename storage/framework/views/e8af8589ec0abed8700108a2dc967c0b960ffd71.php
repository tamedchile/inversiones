<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?> #<?php echo e($project->id); ?> - <span class="font-bold"><?php echo e(ucwords($project->project_name)); ?></span></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('member.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('modules.projects.projectMembers'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/icheck/skins/all.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/multiselect/css/multi-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">

                        <nav>
                            <ul>
                                <li><a href="<?php echo e(route('member.projects.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.overview'); ?></span></a></li>

                                <li class="tab-current"><a href="<?php echo e(route('member.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.members'); ?></span></a></li>

                                <?php if(in_array('tasks',$modules)): ?>
                                <li ><a href="<?php echo e(route('member.tasks.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.tasks'); ?></span></a></li>
                                <?php endif; ?>
                                <li><a href="<?php echo e(route('member.files.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.files'); ?></span></a></li>
                                <?php if(in_array('timelogs',$modules)): ?>
                                <li><a href="<?php echo e(route('member.time-log.show-log', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.timeLogs'); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="panel panel-default">
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th><?php echo app('translator')->get('app.name'); ?></th>
                                                        <th><?php echo app('translator')->get('app.action'); ?></th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $__empty_1 = true; $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo '<img src="'.$member->user->image_url.'"
                                                            alt="user" class="img-circle" width="40" height="40">'; ?>

                                                                <?php echo e(ucwords($member->user->name)); ?>

                                                            </td>
                                                            <td>
                                                                <?php if($project->isProjectAdmin || $user->can('add_projects')): ?>
                                                                  <a href="javascript:;" data-member-id="<?php echo e($member->id); ?>" class="btn btn-sm btn-danger btn-rounded delete-members"><i class="fa fa-times"></i> <?php echo app('translator')->get('app.remove'); ?></a>
                                                                <?php endif; ?>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo app('translator')->get('messages.noMemberAddedToProject'); ?>
                                                            </td>
                                                        </tr>
                                                    <?php endif; ?>
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if($project->isProjectAdmin || $user->can('add_projects')): ?>
                                    <div class="col-md-6">
                                    <div class="white-box">
                                        <h3><?php echo app('translator')->get('modules.projects.addMemberTitle'); ?></h3>

                                        <?php echo Form::open(['id'=>'createMembers','class'=>'ajax-form','method'=>'POST']); ?>


                                        <div class="form-body">

                                            <?php echo Form::hidden('project_id', $project->id); ?>


                                            <div class="form-group" id="user_id">
                                                <select class="select2 m-b-10 select2-multiple " multiple="multiple"
                                                        data-placeholder="Choose Members" name="user_id[]">
                                                    <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                        <option value="<?php echo e($emp->id); ?>"><?php echo e(ucwords($emp->name). ' ['.$emp->email.']'); ?> <?php if($emp->id == $user->id): ?>
                                                                (YOU) <?php endif; ?></option>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                </select>
                                            </div>

                                            <div class="form-actions">
                                                <button type="submit" id="save-members" class="btn btn-success"><i
                                                            class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?>
                                                </button>
                                            </div>
                                        </div>

                                        <?php echo Form::close(); ?>


                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </section>

                    </div><!-- /content -->
                </div><!-- /tabs -->
            </section>
        </div>


    </div>
    <!-- .row -->

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('js/cbpFWTabs.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/multiselect/js/jquery.multi-select.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script type="text/javascript">
    //    (function () {
    //
    //        [].slice.call(document.querySelectorAll('.sttabs')).forEach(function (el) {
    //            new CBPFWTabs(el);
    //        });
    //
    //    })();

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    //    save project members
    $('#save-members').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.project-members.store')); ?>',
            container: '#createMembers',
            type: "POST",
            data: $('#createMembers').serialize(),
            success: function (response) {
                if (response.status == "success") {
                    $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                    window.location.reload();
                }
            }
        })
    });


    $('body').on('click', '.delete-members', function(){
        var id = $(this).data('member-id');
        swal({
            title: "Are you sure?",
            text: "This will remove the member from the project.",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function(isConfirm){
            if (isConfirm) {

                var url = "<?php echo e(route('member.project-members.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE'},
                    success: function (response) {
                        if (response.status == "success") {
                            $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
                            window.location.reload();
                        }
                    }
                });
            }
        });
    });


</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/project-member/show.blade.php ENDPATH**/ ?>