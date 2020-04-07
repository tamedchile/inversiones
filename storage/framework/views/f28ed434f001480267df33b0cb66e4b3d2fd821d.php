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
                <li><a href="<?php echo e(route('admin.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.details'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
    <script>
        /**
         * Sum elements of an array up to the index provided.
         */

        function showBurnDown(elementId, burndownData, scopeChange = [], dates) {

            var speedCanvas = document.getElementById(elementId);

            Chart.defaults.global.defaultFontFamily = "Arial";
            Chart.defaults.global.defaultFontSize = 14;

            var speedData = {
                labels: JSON.parse(dates),
                datasets: [
                    {
                        label: "<?php echo app('translator')->get('modules.burndown.actual'); ?>",
                        borderColor: "#6C8893",
                        backgroundColor: "#6C8893",
                        lineTension: 0,
                        borderDash: [5, 5],
                        fill: false,
                        data: scopeChange,
                        steppedLine: true
                    },
                    {
                        label: "<?php echo app('translator')->get('modules.burndown.ideal'); ?>",
                        data: burndownData,
                        fill: false,
                        borderColor: "#ccc",
                        backgroundColor: "#ccc",
                        lineTension: 0,
                    },
                ]
            };

            var chartOptions = {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        boxWidth: 80,
                        fontColor: 'black'
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            min: 0,
                            max: Math.round(burndownData[0] * 2)
                        }
                    }]
                },
                responsive: true
            };

            var lineChart = new Chart(speedCanvas, {
                type: 'line',
                data: speedData,
                options: chartOptions
            });

        }
    </script>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="col-md-12">
            <section>
                <div class="sttabs tabs-style-line">
                    <?php echo $__env->make('admin.projects.show_project_menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="white-box">
                        <form action="" id="filter-form" class="m-b-20">
                            <div class="row">
                                <div class="col-md-4">
                                    <h5 ><?php echo app('translator')->get('app.selectDateRange'); ?></h5>
                                    <div class="input-daterange input-group" id="date-range">
                                        <input type="text" class="form-control" id="start-date" placeholder="<?php echo app('translator')->get('app.startDate'); ?>"
                                               value=""/>
                                        <span class="input-group-addon bg-info b-0 text-white"><?php echo app('translator')->get('app.to'); ?></span>
                                        <input type="text" class="form-control" id="end-date" placeholder="<?php echo app('translator')->get('app.endDate'); ?>"
                                               value=""/>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-t-10">
                                        <label class="control-label col-xs-12">&nbsp;</label>
                                        <button type="button" id="apply-filters" class="btn btn-success col-md-6"><i class="fa fa-check"></i> <?php echo app('translator')->get('app.apply'); ?></button>
                                        <button type="button" id="reset-filters" class="btn btn-inverse col-md-5 col-md-offset-1"><i class="fa fa-refresh"></i> <?php echo app('translator')->get('app.reset'); ?></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="task-list-panel">
                                    <div><canvas id="burndown43"></canvas></div>
                                </div>
                            </div>
                        </section>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <!-- .row -->
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <?php if($global->locale == 'en'): ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.<?php echo e($global->locale); ?>-AU.min.js"></script>
    <?php else: ?>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.<?php echo e($global->locale); ?>.min.js"></script>
    <?php endif; ?>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js')); ?>"></script>
    <script>
        jQuery('#date-range').datepicker({
            toggleActive: true,
            language: '<?php echo e($global->locale); ?>',
            autoclose: true,
            startDate: '<?php echo e($startDate); ?>',
            endDate: '<?php echo e($endDate); ?>',
            format: '<?php echo e($global->date_picker_format); ?>',
        });
        function loadChart(){
            var startDate = $('#start-date').val();
            if (startDate == '') { startDate = null; }

            var endDate = $('#end-date').val();
            if (endDate == '') { endDate = null; }

            var token = "<?php echo e(csrf_token()); ?>";
            $.easyAjax({
                url: '<?php echo e(route('admin.projects.burndown-chart', [$project->id])); ?>',
                container: '#section-line-3',
                type: "GET",
                redirect: false,
                data: {'_token': token, startDate: startDate, endDate: endDate},
                success: function (data) {
                    showBurnDown ("burndown43", JSON.parse(data.deadlineTasks), JSON.parse(data.uncompletedTasks), data.datesArray);
                }
            });
        }

        $('#apply-filters').click(function () {
            loadChart();
        });

        $('#reset-filters').click(function () {
            $('#filter-form')[0].reset();
            loadChart();
        });
        loadChart();

        $('ul.showProjectTabs .burndownChart').addClass('tab-current');
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/projects/burndown.blade.php ENDPATH**/ ?>