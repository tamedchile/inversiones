<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.project-template.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
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
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">

            <section>
                <div class="sttabs tabs-style-line">
                    <div class="white-box">
                        <nav>
                            <ul>
                                <li class="tab-current"><a href="<?php echo e(route('admin.project-template.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.overview'); ?></span></a>
                                </li>
                                <?php if(in_array('employees',$modules)): ?>
                                <li><a href="<?php echo e(route('admin.project-template-member.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.members'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(in_array('tasks',$modules)): ?>
                                <li><a href="<?php echo e(route('admin.project-template-task.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.tasks'); ?></span></a></li>
                                <?php endif; ?>

                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-1" class="show">
                            <div class="row">

                                <div class="col-md-6">
                                    <div class="white-box">
                                        <h3 class="b-b p-b-10"><?php echo app('translator')->get('app.projectTemplate'); ?> #<?php echo e($project->id); ?> - <span
                                                    class="font-bold"><?php echo e(ucwords($project->project_name)); ?></span> <a
                                                    href="<?php echo e(route('admin.project-template.edit', $project->id)); ?>" class="pull-right btn btn-info btn-outline btn-rounded" style="font-size: small"><i class="icon-note"></i> <?php echo app('translator')->get('app.edit'); ?></a></h3>
                                        <div><?php echo $project->project_summary; ?></div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="row">
                                        
                                        <div class="col-md-6">
                                            <div class="panel panel-default">
                                                <div class="panel-heading"><?php echo app('translator')->get('modules.projectTemplate.members'); ?></div>
                                                <div class="panel-wrapper collapse in">
                                                    <div class="panel-body">
                                                        <div class="message-center">
                                                            <?php $__empty_1 = true; $__currentLoopData = $project->members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                            <a href="#">
                                                                <div class="user-img">
                                                                    <?php echo '<img src="'.$member->user->image_url.'"
                                                            alt="user" class="img-circle" width="40" height="40">'; ?>

                                                                </div>
                                                                <div class="mail-contnet">
                                                                    <h5><?php echo e(ucwords($member->user->name)); ?></h5>
                                                                    <span class="mail-desc"><?php echo e($member->user->email); ?></span>
                                                                </div>
                                                            </a>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                                <?php echo app('translator')->get('messages.noMemberAddedToProject'); ?>
                                                            <?php endif; ?>
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

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/project-template/show.blade.php ENDPATH**/ ?>