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
                <li class="active"><?php echo app('translator')->get('modules.projects.overview'); ?></li>
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
                                <li class="tab-current"><a href="<?php echo e(route('member.projects.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.overview'); ?></span></a>
                                </li>

                                <?php if(in_array('employees',$modules)): ?>
                                <li><a href="<?php echo e(route('member.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.members'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(in_array('tasks',$modules)): ?>
                                <li><a href="<?php echo e(route('member.tasks.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.tasks'); ?></span></a></li>
                                <?php endif; ?>

                                <li><a href="<?php echo e(route('member.files.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.files'); ?></span></a></li>
                                <?php if(in_array('timelogs',$modules)): ?>
                                <li><a href="<?php echo e(route('member.time-log.show-log', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.timeLogs'); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-1" class="show">
                            <div class="white-box">
                                <div class="row">

                                    <div class="col-md-9">
                                    
                                        <div class="row">
                                            <div class="col-md-12" style="max-height: 400px; overflow-y: auto;">
                                                <h5><?php echo app('translator')->get('app.project'); ?> <?php echo app('translator')->get('app.details'); ?></h5>
                                                <?php echo $project->project_summary; ?>

                                            </div>
                                        </div>
            
                                        <div class="row m-t-25">
                                            <?php if($user->can('view_clients')): ?>
                                            <div class="col-md-4">
                                                <div class="panel panel-inverse">
                                                    <div class="panel-heading"><?php echo app('translator')->get('modules.client.clientDetails'); ?> </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <?php if(!is_null($project->client)): ?>
                                                            <dl>
                                                                <?php if(!is_null($project->client->client_details)): ?>
                                                                <dt><?php echo app('translator')->get('modules.client.companyName'); ?></dt>
                                                                <dd class="m-b-10"><?php echo e($project->client->client_details->company_name); ?></dd>
                                                                <?php endif; ?>
            
                                                                <dt><?php echo app('translator')->get('modules.client.clientName'); ?></dt>
                                                                <dd class="m-b-10"><?php echo e(ucwords($project->client->name)); ?></dd>
            
                                                                <dt><?php echo app('translator')->get('modules.client.clientEmail'); ?></dt>
                                                                <dd class="m-b-10"><?php echo e($project->client->email); ?></dd>
                                                            </dl>
                                                            <?php else: ?> <?php echo app('translator')->get('messages.noClientAddedToProject'); ?> <?php endif; ?>  <?php if(isset($fields)): ?>
                                                            <dl>
                                                                <?php $__currentLoopData = $fields; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <dt><?php echo e(ucfirst($field->label)); ?></dt>
                                                                <dd class="m-b-10">
                                                                    <?php if( $field->type == 'text'): ?> <?php echo e($project->custom_fields_data['field_'.$field->id] ?? '-'); ?> <?php elseif($field->type == 'password'): ?>
                                                                    <?php echo e($project->custom_fields_data['field_'.$field->id] ?? '-'); ?>

                                                                    <?php elseif($field->type == 'number'): ?> <?php echo e($project->custom_fields_data['field_'.$field->id]
                                                                    ?? '-'); ?> <?php elseif($field->type == 'textarea'): ?> <?php echo e($project->custom_fields_data['field_'.$field->id]
                                                                    ?? '-'); ?> <?php elseif($field->type == 'radio'): ?> <?php echo e(!is_null($project->custom_fields_data['field_'.$field->id])
                                                                    ? $project->custom_fields_data['field_'.$field->id] : '-'); ?>

                                                                    <?php elseif($field->type == 'select'): ?> <?php echo e((!is_null($project->custom_fields_data['field_'.$field->id])
                                                                    && $project->custom_fields_data['field_'.$field->id] != '') ?
                                                                    $field->values[$project->custom_fields_data['field_'.$field->id]]
                                                                    : '-'); ?> <?php elseif($field->type == 'checkbox'): ?> <?php echo e(!is_null($project->custom_fields_data['field_'.$field->id])
                                                                    ? $field->values[$project->custom_fields_data['field_'.$field->id]]
                                                                    : '-'); ?> <?php elseif($field->type == 'date'): ?>
                                                                        <?php echo e(\Carbon\Carbon::parse($project->custom_fields_data['field_'.$field->id])->format($global->date_format)); ?>

                                                                    <?php endif; ?>
                                                                </dd>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </dl>
                                                            <?php endif; ?> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>
            
                    
                                            <?php if($project->isProjectAdmin || $user->can('edit_projects')): ?>
                                            <div class="col-md-8">
                                                <div class="panel panel-inverse">
                                                    <div class="panel-heading"><?php echo app('translator')->get('modules.projects.activeTimers'); ?></div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body" id="timer-list">
                                                            
                                                            <?php $__empty_1 = true; $__currentLoopData = $activeTimers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <div class="row m-b-10">
                                                                <div class="col-xs-12 m-b-5">
                                                                    <?php echo e(ucwords($time->user->name)); ?>

                                                                </div>
                                                                <div class="col-xs-9 font-12">
                                                                    <?php echo e($time->duration); ?>

                                                                </div>
                                                                <div class="col-xs-3 text-right">
                                                                    <button type="button" data-time-id="<?php echo e($time->id); ?>" class="btn btn-danger btn-xs stop-timer"><?php echo app('translator')->get('app.stop'); ?></button>
                                                                </div>
                                                            </div>
                                                            
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <?php echo app('translator')->get('messages.noActiveTimer'); ?>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php endif; ?>

                                            
            
                                        </div>
            
                                    </div>
            
                                    <div class="col-md-3">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="panel panel-inverse">
                                                    <div class="panel-heading"><?php echo app('translator')->get('modules.projects.members'); ?> 
                                                        <span class="label label-rouded label-custom pull-right"><?php echo e(count($project->members)); ?></span>    
                                                    </div>
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <?php $__empty_1 = true; $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                                <img src="<?php echo e(asset($member->user->image_url)); ?>"
                                                                data-toggle="tooltip" data-original-title="<?php echo e(ucwords($member->user->name)); ?>"
            
                                                                alt="user" class="img-circle" width="25" height="25" height="25" height="25">
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                                                                <?php echo app('translator')->get('messages.noMemberAddedToProject'); ?> 
                                                            <?php endif; ?>
                                                        
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12">
                                                <div class="panel panel-inverse">
                                                    
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body dashboard-stats">
                                                        <div class="row">
                                                            <div class="col-md-12 m-b-5 project-stats">
                                                                    <span class="text-danger"><?php echo e(count($openTasks)); ?></span> <?php echo app('translator')->get('modules.projects.openTasks'); ?>
                                                            </div>
                                                            <div class="col-md-12 m-b-5 project-stats">
                                                                    <span class="text-info"><?php echo e($daysLeft); ?></span><?php echo app('translator')->get('modules.projects.daysLeft'); ?>
                                                            </div>
                                                            <div class="col-md-12 m-b-5 project-stats">
                                                                    <span class="text-success"><?php echo e($hoursLogged); ?></span><?php echo app('translator')->get('modules.projects.hoursLogged'); ?>
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                            <div class="col-md-12"   id="project-timeline">
                                                <div class="panel panel-inverse">
                                                    <div class="panel-heading"><?php echo app('translator')->get('modules.projects.activityTimeline'); ?></div>
                                                    
                                                    <div class="panel-wrapper collapse in">
                                                        <div class="panel-body">
                                                            <div class="steamline">
                                                                <?php $__currentLoopData = $activities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activ): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <div class="sl-item">
                                                                    <div class="sl-left"><i class="fa fa-circle text-primary"></i>
                                                                    </div>
                                                                    <div class="sl-right">
                                                                        <div>
                                                                            <h6><?php echo e($activ->activity); ?></h6> <span class="sl-date"><?php echo e($activ->created_at->diffForHumans()); ?></span></div>
                                                                    </div>
                                                                </div>
                                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
            
                                        </div>
                                    </div>
            
                                </div>
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

    $('#timer-list').on('click', '.stop-timer', function () {
       var id = $(this).data('time-id');
        var url = '<?php echo e(route('admin.time-logs.stopTimer', ':id')); ?>';
        url = url.replace(':id', id);
        var token = '<?php echo e(csrf_token()); ?>'
        $.easyAjax({
            url: url,
            type: "POST",
            data: {timeId: id, _token: token},
            success: function (data) {
                $('#timer-list').html(data.html);
            }
        })

    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/projects/show.blade.php ENDPATH**/ ?>