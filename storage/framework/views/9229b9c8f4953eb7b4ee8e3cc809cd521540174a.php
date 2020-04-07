<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12 text-right">
            <a href="<?php echo e(route('admin.attendances.create')); ?>"
            class="btn btn-success btn-outline btn-sm"><?php echo app('translator')->get('modules.attendance.markAttendance'); ?> <i class="fa fa-plus"  aria-hidden="true"></i></a>
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo e(__($pageTitle)); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.css')); ?>">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="row">
   

        <div class="sttabs tabs-style-line col-md-12">
            <div class="white-box">
                <nav>
                    <ul>
                        <li class="tab-current"><a href="<?php echo e(route('admin.attendances.summary')); ?>"><span><?php echo app('translator')->get('app.summary'); ?></span></a>
                        </li>
                        <li><a href="<?php echo e(route('admin.attendances.index')); ?>"><span><?php echo app('translator')->get('modules.attendance.attendanceByMember'); ?></span></a>
                        </li>
                        <li><a href="<?php echo e(route('admin.attendances.attendanceByDate')); ?>"><span><?php echo app('translator')->get('modules.attendance.attendanceByDate'); ?></span></a>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <!-- .row -->

    <div class="row">
        <div class="col-md-12">
            <div class="white-box p-b-0">
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('modules.timeLogs.employeeName'); ?></label>
                            <select class="select2 form-control" data-placeholder="Choose Employee" id="user_id" name="user_id">
                                <option value="0">--</option>
                                <?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($employee->id); ?>"><?php echo e(ucwords($employee->name)); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('app.month'); ?></label>
                            <select class="select2 form-control" data-placeholder="" id="month">
                                <option <?php if($month == '01'): ?> selected <?php endif; ?> value="01"><?php echo app('translator')->get('app.january'); ?></option>
                                <option <?php if($month == '02'): ?> selected <?php endif; ?> value="02"><?php echo app('translator')->get('app.february'); ?></option>
                                <option <?php if($month == '03'): ?> selected <?php endif; ?> value="03"><?php echo app('translator')->get('app.march'); ?></option>
                                <option <?php if($month == '04'): ?> selected <?php endif; ?> value="04"><?php echo app('translator')->get('app.april'); ?></option>
                                <option <?php if($month == '05'): ?> selected <?php endif; ?> value="05"><?php echo app('translator')->get('app.may'); ?></option>
                                <option <?php if($month == '06'): ?> selected <?php endif; ?> value="06"><?php echo app('translator')->get('app.june'); ?></option>
                                <option <?php if($month == '07'): ?> selected <?php endif; ?> value="07"><?php echo app('translator')->get('app.july'); ?></option>
                                <option <?php if($month == '08'): ?> selected <?php endif; ?> value="08"><?php echo app('translator')->get('app.august'); ?></option>
                                <option <?php if($month == '09'): ?> selected <?php endif; ?> value="09"><?php echo app('translator')->get('app.september'); ?></option>
                                <option <?php if($month == '10'): ?> selected <?php endif; ?> value="10"><?php echo app('translator')->get('app.october'); ?></option>
                                <option <?php if($month == '11'): ?> selected <?php endif; ?> value="11"><?php echo app('translator')->get('app.november'); ?></option>
                                <option <?php if($month == '12'): ?> selected <?php endif; ?> value="12"><?php echo app('translator')->get('app.december'); ?></option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('app.select'); ?> <?php echo app('translator')->get('app.year'); ?></label>
                            <select class="select2 form-control" data-placeholder="" id="year">
                                <?php for($i = $year; $i >= ($year-4); $i--): ?>
                                    <option <?php if($i == $year): ?> selected <?php endif; ?> value="<?php echo e($i); ?>"><?php echo e($i); ?></option>
                                <?php endfor; ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <div class="form-group m-t-20">
                            <button type="button" id="apply-filter" class="btn btn-info btn-block"><?php echo app('translator')->get('app.apply'); ?></button>
                        </div>
                    </div>

                </div>

            </div>
        </div>


    </div>

    <div class="row">
        <div class="col-md-12" id="attendance-data"></div>
    </div>

    
    <div class="modal fade bs-modal-lg in" id="attendanceModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/timepicker/bootstrap-timepicker.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/bower_components/switchery/dist/switchery.min.js')); ?>"></script>

<script>
    
    $('#apply-filter').click(function () {
       showTable();
    });

    $(".select2").select2({
        formatNoMatches: function () {
            return "<?php echo e(__('messages.noRecordFound')); ?>";
        }
    });

    function showTable() {

        var year = $('#year').val();
        var month = $('#month').val();

        $('body').block({
            message: '<p style="margin:0;padding:8px;font-size:24px;">Just a moment...</p>'
            , css: {
                color: '#fff'
                , border: '1px solid #fb9678'
                , backgroundColor: '#fb9678'
            }
        });

        var userId = $('#user_id').val();
      
        //refresh counts
        var url = '<?php echo route('admin.attendances.summaryData'); ?>';

        var token = "<?php echo e(csrf_token()); ?>";

        $.easyAjax({
            type: 'POST',
            data: {
                '_token': token,
                year: year,
                month: month,
                userId: userId
            },
            url: url,
            success: function (response) {
               $('#attendance-data').html(response.data);
            }
        });

    }

    showTable();

    $('#attendance-data').on('click', '.view-attendance',function () {
        var attendanceID = $(this).data('attendance-id');
        var url = '<?php echo route('admin.attendances.info', ':attendanceID'); ?>';
        url = url.replace(':attendanceID', attendanceID);

        $('#modelHeading').html('<?php echo e(__("app.menu.attendance")); ?>');
        $.ajaxModal('#projectTimerModal', url);
    });

    $('#attendance-data').on('click', '.edit-attendance',function (event) {
        var attendanceDate = $(this).data('attendance-date');
        var userData       = $(this).closest('tr').children('td:first');
        var userID         = userData[0]['firstChild']['nextSibling']['dataset']['employeeId'];
        var year           = $('#year').val();
        var month          = $('#month').val();

        var url = '<?php echo route('admin.attendances.mark', [':userid',':day',':month',':year',]); ?>';
        url = url.replace(':userid', userID);
        url = url.replace(':day', attendanceDate);
        url = url.replace(':month', month);
        url = url.replace(':year', year);

        $('#modelHeading').html('<?php echo e(__("app.menu.attendance")); ?>');
        $.ajaxModal('#projectTimerModal', url);
    });

    function editAttendance (id) {
        $('#projectTimerModal').modal('hide');

        var url = '<?php echo route('admin.attendances.edit', [':id']); ?>';
        url = url.replace(':id', id);
        console.log('sri ram');
        $('#modelHeading').html('<?php echo e(__("app.menu.attendance")); ?>');
        $.ajaxModal('#attendanceModal', url);
    }
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/attendance/summary.blade.php ENDPATH**/ ?>