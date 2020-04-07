<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/x-editable/dist/bootstrap3-editable/css/bootstrap-editable.css')); ?>">
    <link href="//cdn.dhtmlx.com/gantt/edge/skins/dhtmlxgantt_broadway.css" rel="stylesheet">

    <style>

        .gantt_task_drag {
            width: 6px;
            background: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAYAAAACCAYAAAB7Xa1eAAAABmJLR0QA/wD/AP+gvaeTAAAACXBIWXMAAAsTAAALEwEAmpwYAAAAB3RJTUUH3QYDDjkw3UJvAwAAABRJREFUCNdj/P//PwM2wASl/6PTAKrrBf4+lD8LAAAAAElFTkSuQmCC);
            z-index: 1;
            top: 0;
        }

        .gantt_task_drag.task_left{
            left: 0;
        }

        .gantt_task_drag.task_right{
            right: 0;
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <h2><?php echo app('translator')->get('modules.projects.viewGanttChart'); ?></h2>
            <div id="gantt_here" style='width:100%; height:100vh;'></div>
        </div>
    </div>    <!-- .row -->

    
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
    <script src="<?php echo e(asset('plugins/bower_components/moment/moment.js')); ?>"></script>
    <script src="//cdn.dhtmlx.com/gantt/edge/dhtmlxgantt.js"></script>
    <script src="//cdn.dhtmlx.com/gantt/edge/locale/locale_<?php echo e($global->locale); ?>.js"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script type="text/javascript">

        gantt.config.xml_date = "%Y-%m-%d %H:%i:%s";

        gantt.templates.task_class = function (st, end, item) {
            return item.$level == 0 ? "gantt_project" : ""
        };

        gantt.config.scale_unit = "month";
        gantt.config.date_scale = "%F, %Y";

        gantt.config.scale_height = 50;

        gantt.config.subscales = [
            {unit: "day", step: 1, date: "%j, %D"}
        ];

        gantt.config.server_utc = false;

        // default columns definition
        gantt.config.columns=[
            {name:"text",       label:"Task name",  tree:true, width:'*' },
            {name:"start_date", label:"Start time", align: "center" },
            {name:"duration",   label:"Duration",   align: "center" },
            {name:"priority",        label:"Action",   width: 90, align: "center", template: function (item) {
                if(item.$level == 0){
                    return '<a href="javascript:addTask('+item.project_id+', '+item.id+');"><i class="fa fa-plus"></i></a>';
                } else {
                    return '';
                }

            }}
        ];

        //defines the text inside the tak bars
        gantt.templates.task_text = function (start, end, task) {
            if ( task.$level > 0 ){
                return task.text + ", <b> <?php echo app('translator')->get('modules.tasks.assignTo'); ?>:</b> " + task.users;
            }
            return task.text;

        };

        gantt.attachEvent("onTaskCreated", function(task){
            //any custom logic here
            return false;
        });

        gantt.attachEvent("onBeforeTaskDrag", function(id, mode, e){
            var task = gantt.getTask(id);

            if(task.$level == 0)
            {
                return false;
            } else {
                return true;
            }
        });


        gantt.attachEvent("onAfterTaskDrag", function(id, mode, e){
            var task = gantt.getTask(id);
            var taskId = task.taskid;
            var token = '<?php echo e(csrf_token()); ?>';
            var url = '<?php echo e(route('admin.projects.gantt-task-update', ':id')); ?>';
            url = url.replace(':id', taskId);
            var startDate = moment.utc(task.start_date.toDateString()).format('DD/MM/Y');
            var endDate = moment.utc(task.end_date.toDateString()).subtract(1, "days").format('DD/MM/Y');

            $.easyAjax({
                url: url,
                type: "POST",
                container: '#gantt_here',
                data: { '_token': token, 'start_date': startDate, 'end_date': endDate }
            })
        });

        gantt.attachEvent("onBeforeLightbox", function(id) {
            var task = gantt.getTask(id);

            if ( task.$level > 0 ){
                $(".right-sidebar").slideDown(50).addClass("shw-rside");

                var taskId = task.taskid;
                var url = "<?php echo e(route('admin.all-tasks.show',':id')); ?>";
                url = url.replace(':id', taskId);

                $.easyAjax({
                    type: 'GET',
                    url: url,
                    success: function (response) {
                        if (response.status == "success") {
                            $('#right-sidebar-content').html(response.view);
                        }
                    }
                });
            }
            return false;
        });

        gantt.init("gantt_here");

        <?php if($ganttProjectId == ''): ?>
            gantt.load('<?php echo e(route("admin.projects.ganttData")); ?>');
        <?php else: ?>
            gantt.config.open_tree_initially = true;
            gantt.load('<?php echo e(route("admin.projects.ganttData", $ganttProjectId)); ?>');
        <?php endif; ?>

        function addTask(id, parentId) {
            var url = '<?php echo e(route('admin.projects.ajaxCreate', ':id')); ?>';
            url = url.replace(':id', id) + '?parent_gantt_id='+parentId;

            $('#modelHeading').html('Add Task');
            $.ajaxModal('#eventDetailModal', url);
        }

        //    update task
        function storeTask() {
            $.easyAjax({
                url: '<?php echo e(route('admin.all-tasks.store')); ?>',
                container: '#storeTask',
                type: "POST",
                data: $('#storeTask').serialize(),
                success: function (response) {
                    if (response.status == "success") {
                        $('#eventDetailModal').modal('hide');
                        var responseTasks = response.tasks;
                        var responseLinks = response.links;

                        responseTasks.forEach(function(responseTask) {
                            gantt.addTask(responseTask);
                        });

                        responseLinks.forEach(function(responseLink) {
                            gantt.addLink(responseLink);
                        });
                    }
                }
            })
        };

        function loadData() {
            var url = '<?php echo e(route("admin.projects.ganttData")); ?>';

            <?php if($ganttProjectId != ''): ?>
                var url = '<?php echo e(route("admin.projects.ganttData", $ganttProjectId)); ?>';
            <?php endif; ?>

            gantt.clearAll();
            gantt.load(url);
            $(".right-sidebar").slideDown(50).removeClass("shw-rside");
        }

        function limitMoveRight(task, limit) {
            var dur = task.end_date - task.start_date;
            task.start_date = new Date(limit.end_date);
            task.end_date = new Date(+task.start_date + dur);
        }

        function limitResizeRight(task, limit) {
            task.start_date = new Date(limit.end_date)
        }


        gantt.attachEvent("onTaskDrag", function (id, mode, task, original, e) {

            if(task.dependent_task_id !== null && task.dependent_task_id !== undefined)
            {
                var parent = gantt.getTask(task.dependent_task_id),
                    modes = gantt.config.drag_mode;

                var limitLeft = null,
                    limitRight = null;

                if (!(mode == modes.move || mode == modes.resize)) return;

                if (mode == modes.move) {
                    limitRight = limitMoveRight;
                } else if (mode == modes.resize) {
                    limitRight = limitResizeRight;
                }

                if (parent && +parent.end_date > +task.start_date) {
                    limitRight(task, parent);
                }
            }
        });

    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/projects/gantt.blade.php ENDPATH**/ ?>