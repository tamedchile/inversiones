<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
            <a href="javascript:;" id="toggle-filter" class="btn btn-outline btn-inverse btn-sm toggle-filter"><i class="fa fa-sliders"></i></a>

            <?php if($user->can('add_tasks')): ?>
                <a href="javascript:;" id="add-column" class="btn btn-success btn-sm btn-outline"><i class="fa fa-plus"></i> <?php echo app('translator')->get('modules.tasks.addBoardColumn'); ?></a>
            <?php endif; ?>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/lobipanel/dist/css/lobipanel.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/css/asColorPicker.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">

<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="white-box">

            <div class="row" style="display: none; " id="ticket-filters">
            
                <form action="" id="filter-form">
                    <div class="col-md-4 m-t-30">
                        <div class="input-daterange input-group m-t-5" id="date-range">
                            <input type="text" class="form-control" id="start-date" placeholder="<?php echo app('translator')->get('app.startDate'); ?>"
                                   value="<?php echo e($startDate); ?>"/>
                            <span class="input-group-addon bg-info b-0 text-white"><?php echo app('translator')->get('app.to'); ?></span>
                            <input type="text" class="form-control" id="end-date" placeholder="<?php echo app('translator')->get('app.endDate'); ?>"
                                   value="<?php echo e($endDate); ?>"/>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5><?php echo app('translator')->get('app.selectProject'); ?></h5>
                        <div class="form-group">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('app.selectProject'); ?>" id="project_id">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($project->id); ?>"><?php echo e(ucwords($project->project_name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('app.client'); ?></h5>

                        <div class="form-group">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('app.client'); ?>" id="clientID">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($client->id); ?>"><?php echo e(ucwords($client->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('modules.tasks.assignTo'); ?></h5>

                        <div class="form-group">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('modules.tasks.assignTo'); ?>" id="assignedTo">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <h5><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('modules.tasks.assignBy'); ?></h5>

                        <div class="form-group">
                            <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('modules.tasks.assignBy'); ?>" id="assignedBY">
                                <option value="all"><?php echo app('translator')->get('app.all'); ?></option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option
                                            value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group m-t-10">
                            <label class="control-label col-xs-12">&nbsp;</label>
                            <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.apply'); ?></button>
                            <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('app.reset'); ?></button>
                        </div>
                    </div>
                </form>
            </div>

            <?php echo Form::open(['id'=>'addColumn','class'=>'ajax-form','method'=>'POST']); ?>



            <div class="row" id="add-column-form" style="display: none;">
                <div class="col-md-12">
                    <hr>
                    <div class="form-group">
                        <label class="control-label"><?php echo app('translator')->get("modules.tasks.columnName"); ?></label>
                        <input type="text" name="column_name" class="form-control">
                    </div>
                </div>
                <!--/span-->

                <div class="col-md-4">
                    <div class="form-group">
                        <label><?php echo app('translator')->get("modules.tasks.labelColor"); ?></label><br>
                        <input type="text" class="colorpicker form-control"  name="label_color" value="#ff0000" />
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="form-group">
                        <button class="btn btn-success" id="save-form" type="submit"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.save'); ?></button>
                    </div>
                </div>
                <!--/span-->

            </div>
            <?php echo Form::close(); ?>



            <?php echo Form::open(['id'=>'updateColumn','class'=>'ajax-form','method'=>'POST']); ?>

            <div class="row" id="edit-column-form" style="display: none;">



            </div>
            <!--/row-->
            <?php echo Form::close(); ?>

        </div>

    </div>

    <div class="container-scroll white-box">
        <a href="javascript:;" id="toggle_fullscreen" class="btn btn-inverse btn-outline btn-sm pull-right"><i class="icon-size-fullscreen"></i></a>

        <div class="row container-row">

        </div>
    <!-- .row -->
    </div>

    
    <div class="modal fade bs-modal-md in" id="eventDetailModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
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
        <!-- /.modal-dialog -->
    </div>
    

    
    <div class="modal fade bs-modal-md in"  id="subTaskModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-md" id="modal-data-application">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                        <span class="caption-subject font-red-sunglo bold uppercase" id="subTaskModelHeading">Sub Task e</span>
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
<script src="<?php echo e(asset('plugins/bower_components/lobipanel/dist/js/lobipanel.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>

<script>
    $('#add-column').click(function () {
        $('#add-column-form').toggle();
    })
    loadData();
    jQuery('#date-range').datepicker({
        toggleActive: true,
        format: '<?php echo e($global->date_picker_format); ?>',
        language: '<?php echo e($global->locale); ?>',
        autoclose: true,
        weekStart:'<?php echo e($global->week_start); ?>',
    });
    // Colorpicker

    $(".colorpicker").asColorPicker();


    $('#save-form').click(function () {
        $.easyAjax({
            url: '<?php echo e(route('member.taskboard.store')); ?>',
            container: '#addColumn',
            data: $('#addColumn').serialize(),
            type: "POST"
        })
    });

    $('#edit-column-form').on('click', '#update-form', function () {
        var id = $(this).data('column-id');
        var url = '<?php echo e(route('member.taskboard.update', ':id')); ?>';
        url = url.replace(':id', id);

        $.easyAjax({
            url: url,
            container: '#updateColumn',
            data: $('#updateColumn').serialize(),
            type: "PUT"
        })
    });

    $('#apply-filters').click(function () {
        loadData();
    });
    $('#reset-filters').click(function () {
        $('#start-date').val('<?php echo e($startDate); ?>');
        $('#end-date').val('<?php echo e($endDate); ?>');
        $('.select2').val('all');

        loadData();
    })

    $('.toggle-filter').click(function () {
        $('#ticket-filters').slideToggle();
    })

    function loadData () {
        var startDate = $('#start-date').val();

        if (startDate == '') {
            startDate = null;
        }

        var endDate = $('#end-date').val();

        if (endDate == '') {
            endDate = null;
        }
        var projectID = $('#project_id').val();
        var clientID = $('#clientID').val();
        var assignedBY = $('#assignedBY').val();
        var assignedTo = $('#assignedTo').val();

        var url = '<?php echo e(route('member.taskboard.index')); ?>?startDate=' + startDate + '&endDate=' + endDate+'&clientID='+clientID +'&assignedBY='+ assignedBY+'&assignedTo='+ assignedTo+'&projectID='+ projectID;

        $.easyAjax({
            url: url,
            container: '.container-row',
            type: "GET",
            success: function (response) {
                $('.container-row').html(response.view);
                $("body").tooltip({
                    selector: '[data-toggle="tooltip"]'
                });
            }

        })
    }
</script>

<script>
    $('#toggle_fullscreen').on('click', function(){
    // if already full screen; exit
    // else go fullscreen
    if (
        document.fullscreenElement ||
        document.webkitFullscreenElement ||
        document.mozFullScreenElement ||
        document.msFullscreenElement
    ) {
        if (document.exitFullscreen) {
        document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
        document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
        document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) {
        document.msExitFullscreen();
        }
    } else {
        element = $('.container-scroll').get(0);
        if (element.requestFullscreen) {
        element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
        element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
        element.webkitRequestFullscreen(Element.ALLOW_KEYBOARD_INPUT);
        } else if (element.msRequestFullscreen) {
        element.msRequestFullscreen();
        }
    }
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/taskboard/index.blade.php ENDPATH**/ ?>