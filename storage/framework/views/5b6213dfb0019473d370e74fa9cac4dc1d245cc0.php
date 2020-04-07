<?php $__env->startPush('head-script'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e($pageTitle); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('admin.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('admin.contracts.index')); ?>"><?php echo e($pageTitle); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.addNew'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>

    <div class="row">
        <div class="panel panel-inverse">
            <div class="panel panel-inverse">
                <div class="panel-heading"> <?php echo app('translator')->get('app.add'); ?> <?php echo app('translator')->get('app.menu.contract'); ?></div>

            <p class="text-muted m-b-30 font-13"></p>

            <div class="panel-wrapper collapse in" aria-expanded="true">
                <div class="panel-body">
            <?php echo Form::open(['id'=>'createContract','class'=>'ajax-form','method'=>'POST']); ?>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="company_name"><?php echo app('translator')->get('app.client'); ?></label>
                            <div>
                                <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('app.client'); ?>" name="client" id="clientID">
                                    <?php $__currentLoopData = $clients; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                                value="<?php echo e($client->id); ?>"><?php echo e(ucwords($client->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject"><?php echo app('translator')->get('app.subject'); ?></label>
                            <input type="text" class="form-control" id="subject" name="subject">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="subject"><?php echo app('translator')->get('app.amount'); ?> (<?php echo e($global->currency->currency_symbol); ?>)</label>
                            <input type="number" class="form-control" id="amount" name="amount">
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label"><?php echo app('translator')->get('modules.contracts.contractType'); ?>
                                <a href="javascript:;"
                                    id="createContractType"
                                    class="btn btn-sm btn-outline btn-success">
                                    <i class="fa fa-plus"></i> <?php echo app('translator')->get('modules.contracts.addContractType'); ?>
                                </a>
                            </label>
                            <div>
                                <select class="select2 form-control" data-placeholder="<?php echo app('translator')->get('app.client'); ?>" id="contractType" name="contract_type">
                                    <?php $__currentLoopData = $contractType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option
                                                value="<?php echo e($type->id); ?>"><?php echo e(ucwords($type->name)); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('modules.timeLogs.startDate'); ?></label>
                            <input id="start_date" name="start_date" type="text"
                                    class="form-control"
                                    value="<?php echo e(\Carbon\Carbon::today()->format($global->date_format)); ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('modules.timeLogs.endDate'); ?></label>
                            <input id="end_date" name="end_date" type="text"
                                    class="form-control"
                                    value="<?php echo e(\Carbon\Carbon::today()->format($global->date_format)); ?>">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label><?php echo app('translator')->get('modules.contracts.notes'); ?></label>
                            <textarea class="form-control" id="description" name="description" rows="4"></textarea>
                        </div>
                    </div>
                </div>
                    <button type="submit" id="save-form" class="btn btn-success waves-effect waves-light m-r-10">
                        <?php echo app('translator')->get('app.save'); ?>
                    </button>
                    <button type="reset" class="btn btn-inverse waves-effect waves-light"><?php echo app('translator')->get('app.reset'); ?></button>
                </div>
            <?php echo Form::close(); ?>

            </div>
        </div>
        </div>
    </div>
    <!-- .row -->
    
    <div class="modal fade bs-modal-md in" id="taskCategoryModal" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md" id="modal-data-application">
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
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/custom-select/custom-select.min.js')); ?>"></script>
    <script src="<?php echo e(asset('plugins/bower_components/bootstrap-select/bootstrap-select.min.js')); ?>"></script>
    <script>
        $(".select2").select2({
            formatNoMatches: function () {
                return "<?php echo e(__('messages.noRecordFound')); ?>";
            }
        });
        jQuery('#start_date, #end_date').datepicker({
            autoclose: true,
            todayHighlight: true,
            weekStart:'<?php echo e($global->week_start); ?>',
            format: '<?php echo e($global->date_picker_format); ?>',
        });
        $('#save-form').click(function () {
            $.easyAjax({
                url: '<?php echo e(route('admin.contracts.store')); ?>',
                container: '#createContract',
                type: "POST",
                redirect: true,
                data: $('#createContract').serialize()
            })
        });
        $('#createContractType').click(function(){
            var url = '<?php echo e(route('admin.contract-type.create-contract-type')); ?>';
            $('#modelHeading').html("<?php echo app('translator')->get('modules.contracts.manageContractType'); ?>");
            $.ajaxModal('#taskCategoryModal', url);
        })
    </script>
<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/admin/contracts/create.blade.php ENDPATH**/ ?>