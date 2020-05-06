<?php $__env->startSection('page-title'); ?>
<meta name="csrf-token" content="to2Ygbi4DxexeSoG6yASwdd6MSBnrGVLmzjESSbn">
<div class="row bg-title top-left-part2" >
    <!-- .page title -->
    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
        <h4 class="page-title"><span class="circle w__40 light-blue"><?php echo e($user->pnombre[0]); ?></span><?php echo e($user->pnombre); ?> <?php echo e($user->papellido); ?></h4>
    </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
            <ol class="breadcrumb">
                <li><a href="<?php echo e(route('client.dashboard.index')); ?>"><?php echo app('translator')->get('app.menu.home'); ?></a></li>
                <li><a href="<?php echo e(route('client.projects.index')); ?>"><?php echo e(__($pageTitle)); ?></a></li>
                <li class="active"><?php echo app('translator')->get('modules.projects.files'); ?></li>
            </ol>
        </div>
        <!-- /.breadcrumb -->
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('head-script'); ?>

<link rel="stylesheet" href="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/docu.css')); ?>">
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

    <div class="row abajo-titulo">
        <div class="col-md-12">
            <div id="page-content">
              <div class="comp-documents" >
                    <div id="content" class="completed-docs">
                        <div class="page-title m-b-40" style="color: #fff; text-transform: none">
                            <img src="<?php echo e(asset('img/icon-completed-doc.png')); ?>" style="vertical-align: sub" alt="">&nbsp; Mis documentos
                            <img src="<?php echo e(asset('img/docs-completed-banner.png')); ?>" class="banner-img img-responsive pull-right" alt="">
                            <h1 class="big-title text-white" style="font-size: 32px">Ahora que estás en este paso, debes subir los documentos que se indican abajo para poder comenzar</h1>
                            <p class="text-white">Estos documentos estarán protejidos y solo podran ser vistos por ti como usuario y nosotros.</p>
                            <input name="id_cliente" type="hidden" id="id_cliente" value="<?php echo e($cliente->user_id); ?>">
                        </div>
                        <div class="clearfix"></div>
                        <div class="list m-t-80" style="position: relative;">
                            <div class="grid hover-effect">
                                <div class="col col-3" style="order: -1">
                                    <div class="inner js-link-open-document  " data-popover-id="">
                                        <img src="<?php echo e(asset('img/meeting-minute.png')); ?>">
                                        <div class="title">
                                            Subir liquidaciones de sueldo
                                        </div>
                                        <p style="flex: 0; margin: 0;">
                                            <a href="javascript:void(0)" class="btn btn-round m-b-15  btn-outline-red btn-view-doc" onclick="">Ver Documentos</a>
                                        </p>
                                        <p style="flex: 0; margin: 0;">
                                            <button type="submit" class="btn btn-round m-b-15  btn-outline-green btn-view-doc" onclick="desplegarLiquidacion1()">Subir archivo</button>
                                        </p>
                                        <center><img id="loading_pdf" style="display: none;" src="<?php echo e(asset('img/loading.gif')); ?>" class="img-responsive"></center>
                                        <br>
                                        <br>
                                        <div class="row m-b-12 " hidden="" id="liquidacion1">
                                            <div class="col-md-12">
                                                <form enctype="multipart/form-data">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="input-group m-b">
                                                                <input name="file" type="file" id="docLiquidacion1" multiple />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-2">
                                                        </div>
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <p style="flex: 0; margin: 0;">
                                                                    <button type="button" class="btn btn-info btn-block btn-lg" id="subirLiquidacion"><i class="fa fa-upload"></i> <span class="bold">Cargar</span></button>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
        </div>
    </div>
    <!-- .row -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
<script src="<?php echo e(asset('plugins/bower_components/dropzone-master/dist/dropzone.js')); ?>"></script>

<!--script>
    $('#show-dropzone').click(function () {
        $('#file-dropzone').toggleClass('hide show');
    });
    $('#show-dropzone2').click(function () {
        $('#file-dropzone2').toggleClass('hide show');
    });

    $("body").tooltip({
        selector: '[data-toggle="tooltip"]'
    });

    // "myAwesomeDropzone" is the camelized version of the HTML element's ID
    Dropzone.options.fileUploadDropzone = {
        paramName: "file", // The name that will be used to transfer the file
//        maxFilesize: 2, // MB,
        dictDefaultMessage: "<?php echo app('translator')->get('modules.projects.dropFile'); ?>",
        accept: function (file, done) {
            done();
        },
        init: function () {
            this.on("success", function (file, response) {
                var viewName = $('#view').val();
                if(viewName == 'list') {
                    Dropzone.forElement('#file-upload-dropzone2').removeAllFiles(true);
                    toastr.options = {
                                "debug": false,
                                "newestOnTop": false,
                                "positionClass": "toast-top-center",
                                "closeButton": true,
                                "fadeIn": 300,
                                "fadeOut": 400,
                                "timeOut": 500,
                                "toastClass": "animated fadeInDown",
                            };
                            toastr.info('Liquidación de sueldo subida correctamente.');
                    //$('#files-list-panel ul.list-group').html(response.html);
                } else {
                    alert('hola');
                }
            })
        }
    };

    $('.thumbnail').on('click', function(event) {
        event.preventDefault();
        $('#thumbnail').empty();
        var projectID = "<?php echo e($project->id); ?>";
        $.easyAjax({
            type: 'GET',
            url: "<?php echo e(route('client.files.thumbnail')); ?>",
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

                var url = "<?php echo e(route('client.files.destroy',':id')); ?>";
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

</script-->

<script type="text/javascript">

    function desplegarLiquidacion1(){

        $("#liquidacion1").fadeIn("slow");

    }


    
    $('#subirLiquidacion').on('click', function(e) {
        e.preventDefault();


       var documento = $('#docLiquidacion1').val();
       var cliente_id = $('#id_cliente').val();
       var extension = documento.substring(documento.lastIndexOf("."));
       var archivo_pdf = $('input[id="docLiquidacion1"]')[0].files[0];


       var formData = new FormData();
       formData.append('archivo_pdf', archivo_pdf);
       formData.append('cliente_id', cliente_id);

       

       $('#loading_pdf').css("display", "block");
       $.ajaxSetup({
           headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
           }
       });
       $.ajax({
           url: "subirLiquidaciones",
           type: 'GET',
           processData: false,
           contentType: false,
           data: formData,
           success: function(data){
               console.log(data);
               //console.log(data.respuesta);
               //if(data.respuesta === 0){
               //    $('#loading_pdf').css("display", "none");
               //    $('#liquidacion1').modal('hide');
               //    toastr.options = {
               //        "debug": false,
               //        "newestOnTop": false,
               //        "positionClass": "toast-top-center",
               //        "closeButton": true,
               //        "toastClass": "animated fadeInDown",
               //    };
               //    toastr.success('Liquidación cargada');
               //} else {
               //    $('#loading_pdf').css("display", "none");
               //    toastr.options = {
               //        "debug": false,
               //        "newestOnTop": false,
               //        "positionClass": "toast-top-center",
               //        "closeButton": true,
               //        "toastClass": "animated fadeInDown",
               //    };
               //    toastr.error('Error en cargar liquidación');
               //}
           },
           error: function(xhr){
               console.log(xhr.responseText);
               $('#loading_pdf').css("display", "none");
           },
       });
      
    });

</script>
<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.client-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/client/project-files/show.blade.php ENDPATH**/ ?>