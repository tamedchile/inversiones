 
<?php $__env->startSection('page-title'); ?>
<div class="row bg-title">
    <!-- .page title -->
    <div class="col-lg-8 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo app('translator')->get('app.project'); ?> #<?php echo e($project->id); ?> - <?php echo e(ucwords($project->project_name)); ?></h4>
    </div>
    <!-- /.page title -->
    <!-- .breadcrumb -->
    <div class="col-lg-4 col-sm-8 col-md-8 col-xs-12 text-right">
        <?php
            if ($project->status == 'in progress') {
                $statusText = __('app.inProgress');
                $statusTextColor = 'text-info';
                $btnTextColor = 'btn-info';
            } else if ($project->status == 'on hold') {
                $statusText = __('app.onHold');
                $statusTextColor = 'text-warning';
                $btnTextColor = 'btn-warning';
            } else if ($project->status == 'not started') {
                $statusText = __('app.notStarted');
                $statusTextColor = 'text-warning';
                $btnTextColor = 'btn-warning';
            } else if ($project->status == 'canceled') {
                $statusText = __('app.canceled');
                $statusTextColor = 'text-danger';
                $btnTextColor = 'btn-danger';
            } else if ($project->status == 'finished') {
                $statusText = __('app.finished');
                $statusTextColor = 'text-success';
                $btnTextColor = 'btn-success';
            }
        ?>

        <div class="btn-group dropdown">
            <button aria-expanded="true" data-toggle="dropdown"
                    class="btn b-all dropdown-toggle waves-effect waves-light visible-lg visible-md"
                    type="button"><?php echo e($statusText); ?> <span style="width: 15px; height: 15px;"
                    class="btn <?php echo e($btnTextColor); ?> btn-small btn-circle">&nbsp;</span></button>
            <ul role="menu" class="dropdown-menu pull-right">
                <li>
                    <a href="javascript:;" class="submit-ticket" data-status="in progress"><?php echo app('translator')->get('app.inProgress'); ?>
                        <span style="width: 15px; height: 15px;"
                              class="btn btn-info btn-small btn-circle">&nbsp;</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="submit-ticket" data-status="on hold"><?php echo app('translator')->get('app.onHold'); ?>
                        <span style="width: 15px; height: 15px;"
                              class="btn btn-warning btn-small btn-circle">&nbsp;</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="submit-ticket" data-status="not started"><?php echo app('translator')->get('app.notStarted'); ?>
                        <span style="width: 15px; height: 15px;"
                              class="btn btn-warning btn-small btn-circle">&nbsp;</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="submit-ticket" data-status="canceled"><?php echo app('translator')->get('app.canceled'); ?>
                        <span style="width: 15px; height: 15px;"
                              class="btn btn-danger btn-small btn-circle">&nbsp;</span>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="submit-ticket" data-status="finished"><?php echo app('translator')->get('app.finished'); ?>
                        <span style="width: 15px; height: 15px;"
                              class="btn btn-success btn-small btn-circle">&nbsp;</span>
                    </a>
                </li>
            </ul>
        </div>

        <a href="<?php echo e(route('admin.projects.edit', $project->id)); ?>" class="btn btn-sm btn-primary btn-outline" style="font-size: small"><i class="icon-note"></i> <?php echo app('translator')->get('app.edit'); ?></a>

        <ol class="breadcrumb">
            <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
            <li><a href="<?php echo e(route('admin.projects.index')); ?>"><?php echo e($pageTitle); ?></a></li>
            <li class="active"><?php echo app('translator')->get('app.details'); ?></li>
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

<style>
    #section-line-1 .col-in{
        padding:0 10px;
    }

    #section-line-1 .col-in h3{
        font-size: 15px;
    }
</style>
<?php $__env->stopPush(); ?> 
<?php $__env->startSection('content'); ?>

<div class="row">
    <div class="col-md-12">

        <section>
            <div class="sttabs tabs-style-line">

                <?php echo $__env->make('admin.projects.show_project_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                <div class="white-box">
                    <div class="row">

                        <div class="col-md-9">
                            <div class="row project-top-stats">
                                <div class="col-md-3 m-b-20 m-t-10 text-center">
                                    <span class="text-primary">
                                        <?php if(!is_null($project->project_budget)): ?>
                                        <?php echo e(!is_null($project->currency_id) ? $project->currency->currency_symbol.$project->project_budget : $project->project_budget); ?>

                                        <?php else: ?>
                                        --
                                        <?php endif; ?>
                                    </span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.projects.projectBudget'); ?></span>
                                </div>
                            
                                <div class="col-md-3 m-b-20 m-t-10 text-center b-l">

                                    <span class="text-success">
                                        <?php echo e(!is_null($project->currency_id) ? $project->currency->currency_symbol.$earnings : $earnings); ?>

                                    </span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('app.earnings'); ?></span>
                                </div>

                                <div class="col-md-3 m-b-20 m-t-10 text-center b-l">
                                    <span class="text-info">
                                        <?php if(!is_null($project->project_budget)): ?>
                                            <?php echo e($project->hours_allocated); ?>

                                         <?php else: ?>
                                             --
                                         <?php endif; ?>
                                    </span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.projects.hours_allocated'); ?></span>
                                </div>
                                <div class="col-md-3 m-b-20 m-t-10 text-center b-l">

                                    <span class="text-warning">
                                        <?php echo e(!is_null($project->currency_id) ? $project->currency->currency_symbol.$expenses : $expenses); ?>

                                    </span> <span class="font-12 text-muted m-l-5"> <?php echo app('translator')->get('modules.projects.expenses_total'); ?></span>
                                    
                                </div>
                            </div>
                            
                            <div class="row">
                                <div class="col-md-12" style="max-height: 400px; overflow-y: auto;">
                                    <h5><?php echo app('translator')->get('app.project'); ?> <?php echo app('translator')->get('app.details'); ?></h5>
                                    <?php echo $project->project_summary; ?>

                                </div>
                            </div>

                            <div class="row m-t-25">
                                <div class="col-md-4">
                                    <div class="panel panel-inverse">
                                        <div class="panel-heading"><?php echo app('translator')->get('modules.client.clientDetails'); ?> </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <?php if(!is_null($project->client)): ?>
                                                <dl>
                                                    <?php if(!is_null($project->client->client)): ?>
                                                    <dt><?php echo app('translator')->get('modules.client.companyName'); ?></dt>
                                                    <dd class="m-b-10"><?php echo e($project->client->client[0]->company_name); ?></dd>
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

                                <div class="col-md-4">
                                    <div class="panel panel-inverse">
                                        <div class="panel-heading"><?php echo app('translator')->get('modules.projects.milestones'); ?>
                                            <a href="<?php echo e(route('admin.milestones.show', $project->id)); ?>" class="pull-right"><i class="fa fa-plus text-success "></i></a>
                                        </div>
                                        <div class="panel-wrapper collapse in">
                                            <div class="panel-body">
                                                <div id="project-milestones">
                                                    <?php $__empty_1 = true; $__currentLoopData = $milestones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                    <div class="row">
                                                        <div class="col-xs-12 m-b-5">
                                                            <a href="javascript:;" class="milestone-detail" data-milestone-id="<?php echo e($item->id); ?>">
                                                                <h6><?php echo e(ucfirst($item->milestone_title )); ?></h6>
                                                            </a>
                                                        </div>
                                                        <div class="col-xs-6">
                                                            <?php if($item->status == 'complete'): ?>
                                                                <label class="label label-success"><?php echo app('translator')->get('app.complete'); ?></label> 
                                                            <?php else: ?>
                                                                <label class="label label-danger"><?php echo app('translator')->get('app.incomplete'); ?></label> 
                                                            <?php endif; ?>
                                                        </div>
                                                        <div class="col-xs-6 text-right">
                                                            <?php if($item->cost > 0): ?>
                                                                <?php echo e($item->currency->currency_symbol.$item->cost); ?> 
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                                                        <?php echo app('translator')->get('messages.noRecordFound'); ?> 
                                                    <?php endif; ?>

                                                   
                                                </div>
                    
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
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
                <!-- /content -->
            </div>
            <!-- /tabs -->
        </section>
    </div>


</div>
<!-- .row -->


<div class="modal fade bs-modal-md in" id="projectCategoryModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" id="modal-data-application">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <span class="caption-subject font-red-sunglo bold uppercase" id="modelHeading"></span>
            </div>
            <div class="modal-body">
                Loading...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn default" data-dismiss="modal">Close</button>
                <button type="button" class="btn blue">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->.
</div>

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

    $('.milestone-detail').click(function(){
        var id = $(this).data('milestone-id');
        var url = '<?php echo e(route('admin.milestones.detail', ":id")); ?>';
        url = url.replace(':id', id);
        $('#modelHeading').html('<?php echo app('translator')->get('app.update'); ?> <?php echo app('translator')->get('modules.projects.milestones'); ?>');
        $.ajaxModal('#projectCategoryModal',url);
    })

    $('.submit-ticket').click(function () {

        const status = $(this).data('status');
        const url = '<?php echo e(route('admin.projects.updateStatus', $project->id)); ?>';
        const token = '<?php echo e(csrf_token()); ?>'

        $.easyAjax({
            url: url,
            type: "POST",
            data: {status: status, _token: token},
            success: function (data) {
                window.location.reload();
            }
        })
    });
    $('ul.showProjectTabs .projects').addClass('tab-current');
</script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/projects/show.blade.php ENDPATH**/ ?>