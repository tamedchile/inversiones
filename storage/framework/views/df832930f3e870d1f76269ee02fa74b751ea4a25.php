<?php $__env->startSection('page-title'); ?>
    <div class="row bg-title">
        <!-- .page title -->
        <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title"><i class="<?php echo e($pageIcon); ?>"></i> <?php echo e(__($pageTitle)); ?></h4>
        </div>
        <!-- /.page title -->
        <!-- .breadcrumb -->
        <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12 text-right">
            <?php if($user->can('add_lead')): ?>
                <a href="<?php echo e(route('member.leads.create')); ?>" class="btn btn-outline btn-success btn-sm"><?php echo app('translator')->get('modules.lead.addNewLead'); ?> <i class="fa fa-plus" aria-hidden="true"></i></a>
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
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.13/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="//cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css">
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>



    <div class="row">

        <div class="col-md-12">
            <div class="white-box">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                <table class="table table-bordered table-hover toggle-circle default footable-loaded footable" id="users-table">
                    <thead>
                    <tr>
                        <th><?php echo app('translator')->get('app.id'); ?></th>
                        <th><?php echo app('translator')->get('app.clientName'); ?></th>
                        <th><?php echo app('translator')->get('app.status'); ?></th>
                        <th><?php echo app('translator')->get('app.action'); ?></th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php if(count($cliente)>0): ?>
                            <?php $__currentLoopData = $cliente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dato): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <th><?php echo e($dato['id']); ?></th>
                                <th><?php echo e($dato['nombre']); ?></th>
                                <th><?php echo e($dato['numero']); ?></th>
                                <?php if($dato['llamado'] === 0): ?>
                                <th> <center> <button onclick="usuarioContesto(<?php echo e($dato['id']); ?>)"  id="save-form" class="btn btn-success"><i class="fa fa-check"></i> Contestó</button> </center> </th>
                                <?php elseif($dato['confirmacion'] === 1): ?>
                                <th> <center> <button onclick="verDatos(<?php echo e($dato['id']); ?>)"  id="save-form" class="btn btn-success">Ver datos</button> </center> </th>
                                <?php else: ?>
                                <th></th>
                                <?php endif; ?>
                                
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>

                            <tr>
                                No tienes clientes asociados
                            </tr>

                        <?php endif; ?>
                    </tbody>
                </table>
                    </div>
            </div>
        </div>
    </div>
    <!-- .row -->
    
    <div class="modal fade bs-modal-md in" id="followUpModal" role="dialog" aria-labelledby="myModalLabel"
         aria-hidden="true">
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
        <!-- /.modal-dialog -->
    </div>
    

<?php $__env->stopSection(); ?>

<?php $__env->startPush('footer-script'); ?>
    <script src="<?php echo e(asset('plugins/bower_components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <script src="//cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.1.1/js/dataTables.responsive.min.js"></script>
    <script src="//cdn.datatables.net/responsive/2.1.1/js/responsive.bootstrap.min.js"></script>
    <script>

       function changeStatus(leadID, statusID){
           var url = "<?php echo e(route('member.leads.change-status')); ?>";
           var token = "<?php echo e(csrf_token()); ?>";

           $.easyAjax({
               type: 'POST',
               url: url,
               data: {'_token': token,'leadID': leadID,'statusID': statusID},
               success: function (response) {
                   if (response.status == "success") {
                       $.unblockUI();
//                                    swal("Deleted!", response.message, "success");
//                        table._fnDraw();
                   }
               }
           });
        }

        $('.edit-column').click(function () {
            var id = $(this).data('column-id');
            var url = '<?php echo e(route("admin.taskboard.edit", ':id')); ?>';
            url = url.replace(':id', id);

            $.easyAjax({
                url: url,
                type: "GET",
                success: function (response) {
                    $('#edit-column-form').html(response.view);
                    $(".colorpicker").asColorPicker();
                    $('#edit-column-form').show();
                }
            })
        })

        function followUp (leadID) {

            var url = '<?php echo e(route('member.leads.follow-up', ':id')); ?>';
            url = url.replace(':id', leadID);

            $('#modelHeading').html('Add Follow Up');
            $.ajaxModal('#followUpModal', url);
        }

        $('.toggle-filter').click(function () {
            $('#ticket-filters').toggle('slide');
        })


        function usuarioContesto(id){

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: 'contesto',
            type: 'GET',
            data: {
                "id": id
            },
            success: function(data){
                
                if(data == 1){


                    toastr.options = {
                        "debug": false,
                        "newestOnTop": false,
                        "positionClass": "toast-top-center",
                        "closeButton": true,
                        "toastClass": "animated fadeInDown",
                    };
                    toastr.success('Correo enviado correctramente');

                    setTimeout(location.reload(),7000); 

                }else{

                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error al enviar correo, por favor intenalo de nuevo.');

                }
               
            },
            error: function(xhr){

                console.log(xhr.responseText);

                toastr.options = {
                    "debug": false,
                    "newestOnTop": false,
                    "positionClass": "toast-top-center",
                    "closeButton": true,
                    "toastClass": "animated fadeInDown",
                };
                toastr.error('Error desconocido.');

            },
        });   

        }


        function verDatos(id){


            alert(id);

        }
    </script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.member-app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\laragon\www\inversiones\resources\views/member/lead/index.blade.php ENDPATH**/ ?>