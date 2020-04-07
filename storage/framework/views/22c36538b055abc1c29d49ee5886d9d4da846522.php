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
                <li><a href="<?php echo e(route('member.dashboard')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li class="active"><?php echo app('translator')->get('app.menu.projects'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.css')); ?>">
    <style>
        .file-bg {
            height: 150px;
            overflow: hidden;
            position: relative;
        }
        .file-bg .overlay-file-box {
            opacity: .9;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 100%;
            text-align: center;
        }
    </style>
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
                                <?php if(in_array('employees',$modules)): ?>
                                <li><a href="<?php echo e(route('member.project-members.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.members'); ?></span></a></li>
                                <?php endif; ?>

                                <?php if(in_array('tasks',$modules)): ?>
                                <li><a href="<?php echo e(route('member.tasks.show', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.tasks'); ?></span></a></li>
                                <?php endif; ?>

                                <li class="tab-current"><a href="<?php echo e(route('member.files.show', $project->id)); ?>"><span><?php echo app('translator')->get('modules.projects.files'); ?></span></a> </li>

                                <?php if(in_array('timelogs',$modules)): ?>
                                <li><a href="<?php echo e(route('member.time-log.show-log', $project->id)); ?>"><span><?php echo app('translator')->get('app.menu.timeLogs'); ?></span></a></li>
                                <?php endif; ?>
                            </ul>
                        </nav>
                    </div>
                    <div class="content-wrap">
                        <section id="section-line-3" class="show">
                            <div class="row">
                                <div class="col-md-12" id="files-list-panel">
                                    <div class="white-box">
                                        <h2><?php echo app('translator')->get('modules.projects.files'); ?></h2>

                                        <div class="row m-b-10">
                                            <div class="col-md-12">
                                                <a href="javascript:;" id="show-dropzone"
                                                   class="btn btn-success btn-outline"><i class="ti-upload"></i> <?php echo app('translator')->get('modules.projects.uploadFile'); ?></a>
                                            </div>
                                        </div>

                                        <div class="row m-b-20 hide" id="file-dropzone">
                                            <div class="col-md-12">
                                                <form action="<?php echo e(route('member.files.store')); ?>" class="dropzone"
                                                      id="file-upload-dropzone">
                                                    <?php echo e(csrf_field()); ?>


                                                    <?php echo Form::hidden('project_id', $project->id); ?>


                                                    <input name="view" type="hidden" id="view" value="list">

                                                    <div class="fallback">
                                                        <input name="file" type="file" multiple/>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>

                                        <ul class="nav nav-tabs" role="tablist" id="list-tabs">
                                            <li role="presentation" class="active nav-item" data-pk="list"><a href="#list" class="nav-link" aria-controls="home" role="tab" data-toggle="tab" aria-expanded="true"><span class="visible-xs"><i class="ti-home"></i></span><span class="hidden-xs"> List</span></a></li>
                                            <li role="presentation" class="nav-item" data-pk="thumbnail"><a href="#thumbnail" class="nav-link thumbnail" aria-controls="profile" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span> <span class="hidden-xs">Thumbnail</span></a></li>
                                        </ul>
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane active" id="list">
                                                <ul class="list-group" id="files-list">
                                                    <?php $__empty_1 = true; $__currentLoopData = $project->files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-md-9">
                                                                    <?php echo e($file->filename); ?>

                                                                </div>
                                                                <div class="col-md-3">

                                                                        <a target="_blank" href="<?php echo e($file->file_url); ?>"
                                                                           data-toggle="tooltip" data-original-title="View"
                                                                           class="btn btn-info btn-circle"><i
                                                                                    class="fa fa-search"></i></a>



                                                                    <?php if(is_null($file->external_link)): ?>
                                                                    <a href="<?php echo e(route('member.files.download', $file->id)); ?>"
                                                                       data-toggle="tooltip" data-original-title="Download"
                                                                       class="btn btn-default btn-circle"><i
                                                                                class="fa fa-download"></i></a>

                                                                    <?php endif; ?>
                                                                    <?php if($file->user_id == $user->id || $project->isProjectAdmin || $user->can('edit_projects')): ?>
                                                                        &nbsp;&nbsp;
                                                                        <a href="javascript:;" data-toggle="tooltip" data-original-title="Delete" data-file-id="<?php echo e($file->id); ?>" class="btn btn-danger btn-circle sa-params" data-pk="list"><i class="fa fa-times"></i></a>
                                                                    <?php endif; ?>
                                                                    <span class="m-l-10"><?php echo e($file->created_at->diffForHumans()); ?></span>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                                        <li class="list-group-item">
                                                            <div class="row">
                                                                <div class="col-md-10">
                                                                    <?php echo app('translator')->get('messages.noFileUploaded'); ?>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    <?php endif; ?>

                                                </ul>
                                            </div>
                                            <div role="tabpanel" class="tab-pane" id="thumbnail">

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
<script src="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.js')); ?>"></script>
<script>
    $('#show-dropzone').click(function () {
        $('#file-dropzone').toggleClass('hide show');
    });

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.fileUploadDropzone = {
        paramName: "file", // The name that will be used to transfer the file
//        maxFilesize: 2, // MB,
        dictDefaultMessage: 'Drop files here OR click to upload',
        accept: function (file, done) {
            done();
        },
        init: function () {
            this.on("success", function (file, response) {
                var viewName = $('#view').val();
                if(viewName == 'list') {
                    $('#files-list-panel ul.list-group').html(response.html);
                } else {
                    $('#thumbnail').empty();
                    $(response.html).hide().appendTo("#thumbnail").fadeIn(500);
                }
            })
        }
    };

    $('body').on('click', '.sa-params', function () {
        var id = $(this).data('file-id');
        var deleteView = $(this).data('pk');
        swal({
            title: "Are you sure?",
            text: "You will not be able to recover the deleted file!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            cancelButtonText: "No, cancel please!",
            closeOnConfirm: true,
            closeOnCancel: true
        }, function (isConfirm) {
            if (isConfirm) {

                var url = "<?php echo e(route('member.files.destroy',':id')); ?>";
                url = url.replace(':id', id);

                var token = "<?php echo e(csrf_token()); ?>";

                $.easyAjax({
                    type: 'POST',
                            url: url,
                            data: {'_token': token, '_method': 'DELETE', 'view': deleteView},
                    success: function (response) {
                        console.log(response);
                        if (response.status == "success") {
                            $.unblockUI();
                            if(deleteView == 'list') {
                                $('#files-list-panel ul.list-group').html(response.html);
                            } else {
                                $('#thumbnail').empty();
                                $(response.html).hide().appendTo("#thumbnail").fadeIn(500);
                            }
                        }
                    }
                });
            }
        });
    });

    $('.thumbnail').on('click', function(event) {
        event.preventDefault();
        $('#thumbnail').empty();
        var projectID = "<?php echo e($project->id); ?>";
        $.easyAjax({
            type: 'GET',
            url: "<?php echo e(route('member.files.thumbnail')); ?>",
            data: {
                id: projectID
            },
            success: function (response) {
                $(response.view).hide().appendTo("#thumbnail").fadeIn(500);
            }
        });
    });


    $('#list-tabs').on("shown.bs.tab",function(event){
        var tabSwitch = $('#list').hasClass('active');
        if(tabSwitch == true) {
            $('#view').val('list');
        } else {
            $('#view').val('thumbnail');
        }
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/inversiones.tamed.global/public_html/dashboard/resources/views/member/project-files/show.blade.php ENDPATH**/ ?>